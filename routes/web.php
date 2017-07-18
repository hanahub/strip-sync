<?php

Route::get('/', function () {
    return view('layout');
});


Route::get('settings', 'SettingsController@index')
    ->name('settings');
Route::put('settings', 'SettingsController@update')
    ->name('settings.update');
