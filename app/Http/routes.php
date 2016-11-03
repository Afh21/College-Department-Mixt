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

    Route::get('/dashboard/users',          ['uses' => 'DashboardController@getUsers','as'  => 'users']);
    Route::get('/admins/find/{id}',         ['uses' => 'DashboardController@find','as'  => 'find']);
    Route::put('/admins/find/{id}/update',  ['uses' => 'DashboardController@updateAdmin','as'  => 'update']);
    Route::post('/admins/save',             ['uses' => 'DashboardController@saveAdmin','as'  => 'save']);
    Route::get('/extras',                   'DashboardController@extras');
    Route::get('destroy/{id}/user',         'DashboardController@destroy')->name('destroy.user');
    Route::get('profile/{id}',              ['uses' => 'DashboardController@show'])->name('user.show');
    Route::get('student/{id}',              'StudentController@profile')->name('student.show');

    Route::get('/groups/available',         'DashboardController@GroupsAvailable');
    Route::post('/teacher/{id}/assign',     ['uses' => 'DashboardController@AsignGroup', 'as' => 'assignGroup']);
    Route::get('/teacher/{id}/unassign',    ['uses' => 'DashboardController@UnassignGroup', 'as' => 'UnassignGroup']);

    Route::get('/dashboard/periods',    ['uses' => 'DashboardController@getPeriods', 'as'  => 'periods']);
    Route::get('/periods/{id}/destroy', ['uses' => 'PeriodController@destroy','as'  => 'destroyP']);
    Route::get('/periods/{id}/find',    ['uses'  => 'PeriodController@find', 'as' => 'find']);
    Route::put('/periods/{id}',         ['uses' => 'PeriodController@update', 'as' => 'update']);
    Route::post('/periods/save',        ['uses' => 'PeriodController@save','as' => 'save']);
    Route::put('/periods/{id}/state',   ['uses' => 'PeriodController@updateStatePeriod', 'as' => 'state']);

    Route::get('/dashboard/maths', 'DashboardController@getMaths')->name('maths');
    Route::post('/maths/save',          ['uses' => 'MathController@save', 'as' => 'save']);
    Route::get('/maths/{id}/destroy',   ['uses' => 'MathController@destroy', 'as' => 'destroy']);
    Route::get('/maths/{id}/find',      ['uses' => 'MathController@find', 'as' => 'find']);
    Route::put('/maths/{id}',           ['uses' => 'MathController@update', 'as' => 'update']);
    Route::get('/maths/periods',        ['uses' => 'MathController@periods', 'as' => 'mathperiod']);

    Route::get('dashboard/groups',      'DashboardController@getGroups')->name('groups');
    Route::get('/groups/maths',         'GroupController@maths');
    Route::post('/groups/save',         'GroupController@save');
    Route::get('/groups/{id}/destroy',  'GroupController@destroy')->name('groups.destroy');
    Route::get('/groups/{id}/find',     'GroupController@find')->name('group.find');
    Route::put('/groups/{id}',          'GroupController@update');

    Route::get('/group/{group}/math/{math}/period/{period}/find',               'NoteController@groups');
    Route::get('/user/{user}/group/{group}/math/{math}/period/{period}/find',   'NoteController@findNote');
    Route::post('/teacher/{teacher}/user/{user}/group/{group}/math/{math}/period/{period}/save', 'NoteController@saveNote');
    Route::put('/teacher/{teacher}/user/{user}/group/{group}/math/{math}/period/{period}/update',  'NoteController@updateNote');

    Route::get('/group/{group}/period/{period}/student/{student}', 'StudentController@studentNotes');
    Route::get('/student/{student}/group/{group}/period/{period}/notes', 'StudentController@studentNotes');
});