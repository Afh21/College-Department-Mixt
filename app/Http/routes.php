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

Route::group(['middleware' => 'auth'], function (){

    Route::get('/dashboard', ['uses'  => 'DashboardController@index', 'as'    => 'dashboard']);

    Route::get('/admins', ['uses' => 'DashboardController@getAdmins','as'  => 'admins']);
    Route::get('/admins/find/{id}', ['uses' => 'DashboardController@find','as'  => 'find']);
    Route::put('/admins/find/{id}/update', ['uses' => 'DashboardController@updateAdmin','as'  => 'update']);
    Route::post('/admins/save', ['uses' => 'DashboardController@saveAdmin','as'  => 'save']);

    Route::get('/dashboard/periods',    ['uses' => 'DashboardController@getPeriods', 'as'  => 'periods']);
    Route::get('/periods/{id}/destroy', ['uses' => 'PeriodController@destroy','as'  => 'destroy']);
    Route::get('/periods/{id}/find',    ['uses'  => 'PeriodController@find', 'as' => 'find']);
    Route::put('/periods/{id}',         ['uses' => 'PeriodController@update', 'as' => 'update']);
    Route::post('/periods/save',        ['uses' => 'PeriodController@save','as' => 'save']);

    Route::get('/dashboard/maths', 'DashboardController@getMaths')->name('maths');
    Route::post('/maths/save',          ['uses' => 'MathController@save', 'as' => 'save']);
    Route::get('/maths/{id}/destroy',   ['uses' => 'MathController@destroy', 'as' => 'destroy']);
    Route::get('/maths/{id}/find',      ['uses' => 'MathController@find', 'as' => 'find']);
    Route::put('/maths/{id}',           ['uses' => 'MathController@update', 'as' => 'update']);
    Route::get('/maths/periods',        ['uses' => 'MathController@periods', 'as' => 'mathperiod']);

});