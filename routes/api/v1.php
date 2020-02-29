<?php

Route::group(['prefix' => 'api', 'as' => 'api.', 'namespace' => 'Api'], function () {
    Route::group(['prefix' => 'v1', 'as' => 'v1.', 'namespace' => 'V1'], function () {
        Route::post('favorites', 'FavoriteController@store');
        Route::delete('favorites', 'FavoriteController@delete');

        Route::post('applications', 'ApplicationController@store');

        Route::post('images', 'ImageController@store');
    });
});
