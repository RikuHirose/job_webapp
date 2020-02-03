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


Route::group(['middleware' => ['auth']], function ()
{

  // Route::group(['prefix' => 'mypage/', 'as' => 'mypage.'], function () {
  //     Route::get('/', 'User\UserController@show')->name('show');
  //     Route::get('/edit', 'User\UserController@edit')->name('edit');
  //     Route::post('/update', 'User\UserController@update')->name('update');

  //     Route::get('/favorited', 'User\UserController@showFavorited')->name('favorited');

  //     Route::get('/password', 'User\UserController@editPassword')->name('edit.password');
  //     Route::post('/password', 'User\UserController@updatePassword')->name('update.password');

  // });
});

Route::get('/', 'HomeController@index')->name('home');

Route::group([
  'as'        => 'user.',
  'namespace' => 'User'
], function () {
  // jobs
  Route::resource('jobs', 'JobController', ['only' => ['index', 'show']]);
});

// Route::get('/q', 'User\JobController@index')->name('jobs.search');

// Route::group(['as' => 'about.'], function () {
//   Route::get('/privacy', 'User\AboutController@privacy')->name('privacy');
//   Route::get('/term', 'User\AboutController@term')->name('term');
// });

