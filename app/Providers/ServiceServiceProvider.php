<?php
namespace App\Providers;

use Illuminate\Support\ServiceProvider;

class ServiceServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        // S3
        $this->app->singleton(
            \App\Services\S3\S3ServiceInterface::class,
            \App\Services\S3\S3Service::class
        );

        // SocialAccount
        $this->app->singleton(
            \App\Services\SocialAccount\SocialAccountServiceInterface::class,
            \App\Services\SocialAccount\SocialAccountService::class
        );
    }
}
