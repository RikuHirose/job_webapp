<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

class RepositoryServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        // Job
        $this->app->singleton(
            \App\Repositories\Job\JobRepositoryInterface::class,
            \App\Repositories\Job\JobRepository::class
        );

        // Skill
        $this->app->singleton(
            \App\Repositories\Skill\SkillRepositoryInterface::class,
            \App\Repositories\Skill\SkillRepository::class
        );

        // Occupation
        $this->app->singleton(
            \App\Repositories\Occupation\OccupationRepositoryInterface::class,
            \App\Repositories\Occupation\OccupationRepository::class
        );
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }
}
