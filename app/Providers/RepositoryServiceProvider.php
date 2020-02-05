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
        // Base
        $this->app->singleton(
            \App\Repositories\Base\BaseRepositoryInterface::class,
            \App\Repositories\Base\BaseRepository::class
        );

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

        // UserOccupation
        $this->app->singleton(
            \App\Repositories\UserOccupation\UserOccupationRepositoryInterface::class,
            \App\Repositories\UserOccupation\UserOccupationRepository::class
        );

        // UserSkill
        $this->app->singleton(
            \App\Repositories\UserSkill\UserSkillRepositoryInterface::class,
            \App\Repositories\UserSkill\UserSkillRepository::class
        );

        // User
        $this->app->singleton(
            \App\Repositories\User\UserRepositoryInterface::class,
            \App\Repositories\User\UserRepository::class
        );

        // Favorite
        $this->app->singleton(
            \App\Repositories\Favorite\FavoriteRepositoryInterface::class,
            \App\Repositories\Favorite\FavoriteRepository::class
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
