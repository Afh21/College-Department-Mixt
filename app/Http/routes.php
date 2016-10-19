<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::auth();

Route::get('/home', 'HomeController@index');

Route::get('/dashboard', [
    'uses'  => 'DashboardController@index',
    'as'    => 'dashboard'
]);

Route::get('/admins', [
   'uses' => 'DashboardController@getAdmins',
    'as'  => 'admins'
]);

Route::get('/admins/find/{id}', [
   'uses' => 'DashboardController@find',
    'as'  => 'find'
]);

Route::put('/admins/find/{id}/update', [
   'uses' => 'DashboardController@updateAdmin',
    'as'  => 'update'
]);

Route::post('/admins/save', [
   'uses' => 'DashboardController@saveAdmin',
    'as'  => 'save'
]);

Route::get('/departments', 'DashboardController@departments');
Route::get('/towns/{id}', 'DashboardController@towns');