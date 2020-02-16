<?php

namespace App\Providers;

use URL;
use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        View::composer('*', 'App\Http\ViewComposers\UserComposer');
        // https://qiita.com/niiyz/items/f0b63e7afeb540a8b4b1
        URL::forceRootUrl(config('app.url'));// ルートURLを設定

        // if (config('app.env') === 'production'){
        //     // asset()やurl()がhttpsで生成される
        //     URL::forceScheme('https');
        // }
    }
}
