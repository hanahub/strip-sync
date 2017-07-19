<?php

Route::get('/', 'DashboardController@index')
    ->name('dashboard');

Route::get('settings', 'SettingsController@index')
    ->name('settings');
Route::put('settings', 'SettingsController@update')
    ->name('settings.update');

Route::resource('profiles', 'ProfilesController');
