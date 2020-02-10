<?php

use Illuminate\Routing\Router;

Admin::routes();

Route::group([
    'as'            => 'admin.',
    'prefix'        => config('admin.route.prefix'),
    'namespace'     => config('admin.route.namespace'),
    'middleware'    => config('admin.route.middleware'),
], function (Router $router) {

    $router->get('/', 'HomeController@index')->name('admin.home');
    $router->resource('companies', CompanyController::class);
    $router->resource('skills', SkillController::class);
    $router->resource('occupations', OccupationController::class);
    $router->resource('favorites', FavoriteController::class);
    $router->resource('applications', ApplicationController::class);
    $router->resource('jobs', JobController::class);
    $router->post('/jobs/restore', 'JobController@restore')->name('jobs.restore');

    $router->resource('users', UserController::class);
});
