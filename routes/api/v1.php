<?php

Route::group(['prefix' => 'api', 'as' => 'api.', 'namespace' => 'Api'], function () {
    Route::group(['prefix' => 'v1', 'as' => 'v1.', 'namespace' => 'V1'], function () {
        Route::post('favorites', 'FavoriteController@postFavorite');
        Route::post('dis-favorites', 'FavoriteController@postDisFavorite');

        Route::post('applications', 'ApplicationController@store');
    });
});
