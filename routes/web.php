<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/


Auth::routes();

Route::group([
    'as'            => 'auth.',
    'prefix'        => 'auth/',
    'namespace'     => 'Auth'
], function () {
  Route::get('login/{provider}',    'SocialAccountController@redirectToProvider')->name('get.provider');
  Route::get('{provider}/callback', 'SocialAccountController@handleProviderCallback');
  Route::get('email', 'SocialAccountController@getEmail')->name('get.email');
});


Route::group(['namespace' => 'User'], function () {
  Route::get('/', 'IndexController@index')->name('index');
  Route::get('/test', 'IndexController@show')->name('show');

  // jobs
  Route::resource('jobs', 'JobController', ['only' => ['index', 'show']]);

  // 認証ずみのみ
  Route::group(['middleware' => ['auth']], function () {

    Route::group(['prefix' => 'user', 'as' => 'user.'], function () {

        Route::get('/edit', 'UserController@edit')->name('edit');
        Route::post('/update', 'UserController@update')->name('update');

        // Route::get('/request', 'UserController@getRequest')->name('get.request');
        // Route::post('/request', 'UserController@postRequest')->name('post.request');

        // Route::get('/portfolio', 'UserController@getPortfolio')->name('get.portfolio');
        // Route::post('/portfolio', 'UserController@postPortfolio')->name('post.portfolio');

        Route::get('/favorites', 'UserController@getFavorites')->name('favorites');
        Route::get('/applications', 'UserController@getApplications')->name('applications');

        // Route::get('/password', 'UserController@editPassword')->name('edit.password');
        // Route::post('/password', 'UserController@updatePassword')->name('update.password');

    });
  });
});


Route::group(['as' => 'about.'], function () {
  Route::get('/privacy', 'User\AboutController@privacy')->name('privacy');
  // Route::get('/term', 'User\AboutController@term')->name('term');
});

