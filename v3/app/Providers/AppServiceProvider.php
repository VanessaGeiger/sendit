<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Auth;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        $downloaded = \App\Fileentry::where('downloads','>', '0')->orderBy('id', 'desc')->get();
        //where('user_id', Auth::user()->id)->
        view()->share("notify_downloaded", $downloaded);

    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }
}
