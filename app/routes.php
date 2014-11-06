<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the Closure to execute when that URI is requested.
|
*/

Route::get('/', function () {
    return View::make('hello');
});

Route::get('users', function () {
    return View::make('users');
});

Route::get('spellbook', function () {
    return View::make('spells');
});

Route::get('sheet', function () {
    return View::make('charsheet');
});

Route::get('sheet2', function () {
    return View::make('charsheet2');
});

Route::get('test-material', function () {
    return View::make('test-material');
});
