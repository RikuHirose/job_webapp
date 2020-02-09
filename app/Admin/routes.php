<?php

use Illuminate\Routing\Router;

Admin::routes();

Route::group([
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
    $router->resource('users', UserController::class);
});
