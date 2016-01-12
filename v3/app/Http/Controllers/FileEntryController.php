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
		$entry->user_name = Auth::user(	)->name;
 
		$entry->save();

		$data['params']['filename']=$entry->hash;
		$data['mailcontent'] = Request::input('mailcontent');
		$data['username'] =$entry->user_name;



		Mail::queue('emails.download', $data, function ($message) {
			$message->to(Request::input('email'));
			$message->subject(Request::input('subject'));
			/*$message->setBody(Request::input('mailcontent'));
			$message->cc($address, $name = null);
			$message->bcc($address, $name = null);
			$message->replyTo($address, $name = null);
			$message->priority($level);
			*/

		});
 
		return redirect('/');
		
	}

	public function get($hash){
	
		$entry = Fileentry::where('hash', '=', $hash)->firstOrFail();
		$file = Storage::disk('local')->get($entry->filename);
		$entry->downloads++;
		$entry->update();
		return (new Response($file, 200))->header('Content-Type', $entry->mime);
	}
}
 