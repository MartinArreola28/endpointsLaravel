<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

//rutas Roles
Route::get('/roles', 'RolesController@index')->name('roles.index');