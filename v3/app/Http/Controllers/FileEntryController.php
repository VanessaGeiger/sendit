<?php namespace App\Http\Controllers;

use App\User; 
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Fileentry;
use Request;
use Mail;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\File;
use Illuminate\Http\Response;
use Carbon\Carbon;
use Chumper\Zipper\Zipper;

 
class FileEntryController extends Controller {
 
	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		$entries = Fileentry::all();
 
		return view('fileentries.index', compact('entries'));
	}
 
	public function add() {

 		$file = Request::file('filefield');
		$extension = $file->getClientOriginalExtension();
		Storage::disk('local')->put($file->getFilename().'.'.$extension,  File::get($file));
		$entry = new Fileentry();
		$entry->user_id = Auth::user()->id;
		$entry->mime = $file->getClientMimeType();
		$entry->original_filename = $file->getClientOriginalName();
		$entry->filename = $file->getFilename().'.'.$extension;
		$entry->size = $file->getClientSize();
		$entry->hash = sha1($entry->original_filename.time());
		$entry->downloads = 0;
		$entry->expiration = Carbon::parse(Request::input('datepicker'))->addDay()->subSecond();
		$entry->recipient = Request::input('recipient');
		$entry->subject = Request::input ('subject');
 		
 		$zipper = new \Chumper\Zipper\Zipper;

 		$zipper->make('test.zip')->add("bower_components");
 		//Zipper::make('public/test.zip')->add($file);

		$entry->save();

		$data['params']['filename']=$entry->hash;
		$data['mailcontent'] = Request::input('mailcontent');
		$data['username'] =Auth::user()->name;



		Mail::queue('emails.download', $data, function ($message) {
			$message->to(Request::input('recipient'));
			$message->subject(Request::input('subject'));
			/*$message->setBody(Request::input('mailcontent'));
			$message->cc($address, $name = null);
			$message->bcc($address, $name = null);
			$message->replyTo($address, $name = null);
			$message->priority($level);
			*/

		});
 
		return view('uploadsuccess', $data);
		
	}

	public function get($hash){
	
		$entry = Fileentry::where('hash', '=', $hash)->firstOrFail();
		$file = Storage::disk('local')->get($entry->filename);
		$entry->downloads++;
		$entry->downloaded_at = Carbon::now();
		$entry->update();
		$pathToFile=storage_path()."/app/".$entry->filename;
		return response()->download($pathToFile);

			}

	public function destroy($hash)
	{
		// delete
		$entry = Fileentry::where('hash', '=', $hash)->firstOrFail();
		$entry->downloads--;

		$entry->delete();

		$files = \App\Fileentry::where('user_id', Auth::user()->id)->orderBy('id', 'desc')->take(10)->get();
		$total_size = $this->human_filesize(\App\Fileentry::where('user_id', Auth::user()->id)->sum('size'));
		$active = \App\Fileentry::where('user_id', Auth::user()->id)->where('downloads', '<', 1)->orderBy('id', 'desc')->count();
		$danger = \App\Fileentry::where('user_id', Auth::user()->id)->where('downloads', '<', 1)->where('expiration','<',Carbon::now()->addWeek())->orderBy('id', 'desc')->count();
		$downloaded = \App\Fileentry::where('user_id', Auth::user()->id)->where('downloads','>','0')->orderBy('id', 'desc')->count();

		return view('home',compact('files','total_size','active','danger','downloaded','user'));
	}

	public function human_filesize($bytes, $dec = 2) {
		$size = array('B', 'kB', 'MB', 'GB', 'TB', 'PB', 'EB', 'ZB', 'YB');
		$factor = floor((strlen($bytes) - 1) / 3);
		if($factor<2) {
			$dec=0;
		}
		return sprintf("%.{$dec}f", $bytes / pow(1024, $factor)) ." ". @$size[$factor];
	}


	public function edit($hash){

		$entry = Fileentry::where('hash', '=', $hash)->firstOrFail();

		return view('update', [

				 'entry' => $entry
        ]);

	}

	public function update($hash){

		$entry = Fileentry::where('hash', '=', $hash)->firstOrFail();
		$entry->expiration = Carbon::parse(Request::input('datepicker'))->addDay()->subSecond();
		$entry->save();

		$files = \App\Fileentry::where('user_id', Auth::user()->id)->orderBy('id', 'desc')->take(10)->get();
		$total_size = $this->human_filesize(\App\Fileentry::where('user_id', Auth::user()->id)->sum('size'));
		$active = \App\Fileentry::where('user_id', Auth::user()->id)->where('downloads', '<', 1)->orderBy('id', 'desc')->count();
		$danger = \App\Fileentry::where('user_id', Auth::user()->id)->where('downloads', '<', 1)->where('expiration','<',Carbon::now()->addWeek())->orderBy('id', 'desc')->count();
		$downloaded = \App\Fileentry::where('user_id', Auth::user()->id)->where('downloads','>','0')->orderBy('id', 'desc')->count();

		return view('home',compact('files','total_size','active','danger','downloaded','user'));

	}
}

 