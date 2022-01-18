<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Roles;

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

//Rutas Roles
Route::get('/roles', 'RolesController@index')->name('roles.index');//endpoint lee todos los roles
Route::get('/getRol/{id}', 'RolesController@show');//endpoint lee un rol
Route::post('/createRol', 'RolesController@create');//endpoint crea un rol
Route::delete('/deleteRol/{id}', 'RolesController@destroy');//endpoint borra un rol
Route::put('/updateRol/{id}', 'RolesController@update');//endpoint borra un rol

//Rutas School
Route::get('/schools', 'SchoolsController@index')->name('Schools.index');//endpoint lee todos los Schools
Route::get('/getSchool/{id}', 'SchoolsController@show');//endpoint lee un School
Route::post('/createSchool', 'SchoolsController@create');//endpoint crea un School
Route::delete('/deleteSchool/{id}', 'SchoolsController@destroy');//endpoint borra un School
Route::put('/updateSchool/{id}', 'SchoolsController@update');//endpoint borra un School

//Rutas Curses
Route::get('/curses', 'CursesController@index')->name('Curses.index');//endpoint lee todos los Curses
Route::get('/getCurse/{id}', 'CursesController@show');//endpoint lee un Curse
Route::post('/createCurse', 'CursesController@create');//endpoint crea un Curse
Route::delete('/deleteCurse/{id}', 'CursesController@destroy');//endpoint borra un Curse
Route::put('/updateCurse/{id}', 'CursesController@update');//endpoint borra un Curse

//Rutas Users
Route::get('/users', 'UsersController@index')->name('Users.index');//endpoint lee todos los Users
Route::get('/getUser/{id}', 'UsersController@show');//endpoint lee un User
Route::post('/createUser', 'UsersController@create');//endpoint crea un User
Route::delete('/deleteUser/{id}', 'UsersController@destroy');//endpoint borra un User
Route::put('/updateUser/{id}', 'UsersController@update');//endpoint borra un User

//Rutas Phones
Route::get('/phones', 'PhonesController@index')->name('Phones.index');//endpoint lee todos los Phones
Route::get('/getPhone/{id}', 'PhonesController@show');//endpoint lee un Phone
Route::post('/createPhone', 'PhonesController@create');//endpoint crea un Phone
Route::delete('/deletePhone/{id}', 'PhonesController@destroy');//endpoint borra un Phone
Route::put('/updatePhone/{id}', 'PhonesController@update');//endpoint borra un Phone

//Endpoint para registrar user en curse por id
Route::post('/joinUserOncurse/{user}', 'CursesController@join');
Route::get('/getActiveUserOnCurse/{id}', 'CursesController@showActiveUsers');//endpoint muestra los user activos en un curse

//Endpoint para registrar user en school
Route::post('/joinOnSchool', 'SchoolsController@join');//endpoint relaciona user con school


