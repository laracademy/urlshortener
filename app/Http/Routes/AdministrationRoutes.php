<?php

// example.com/administration/*
Route::group(['prefix' => 'administration', 'namespace' => 'Administration'], function(){
    // Authentication
    Route::group(['prefix' => 'authentication'], function() {
        Route::get('', 'AuthController@index')->name('administration.authentication');
        Route::post('login', 'AuthController@login')->name('administration.authentication.login');
        Route::get('logout', 'AuthController@logout')->name('administration.authentication.logout');
    });

    // Dashboard
    Route::get('dashboard', 'DashboardController@index')->name('administration.dashboard');

    // Links
    Route::group(['prefix' => 'link'], function() {
        Route::get('create', 'LinkController@create')->name('administration.link.create');
        Route::post('insert', 'LinkController@insert')->name('administration.link.insert');
        Route::get('edit/{link}', 'LinkController@edit')->name('administration.link.edit');
        Route::post('update', 'LinkController@update')->name('administration.link.update');
        Route::get('destroy/{link}', 'LinkController@destroy')->name('administration.link.destroy');
    });

    // Statistics
    Route::group(['prefix' => 'statistics'], function() {
        Route::get('view/{link}', 'StatisticController@view')->name('administration.statistic.view');
    });
});