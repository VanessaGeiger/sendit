<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        $downloaded = \App\Fileentry::where('user_id', Auth::user()->id)->where('downloads','>', '0')->orderBy('id', 'desc')->get();
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
