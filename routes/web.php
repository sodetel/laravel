<?php

include 'myfunctions.php';

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

DB::listen(function($query) {
    Log::info($query->sql, $query->bindings);
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::get('/', function () {
    return view('welcome');
});

// Plans actions
Route::namespace('Json')->group(function() {

    Route::get('/json/plans', 'PlansController@all');
    // to override the '/plans/{plan}' route
    // Route::get('/plans/subscriptions', 'PlansController@subscriptions');
    Route::get('/json/plans/{plan}', 'PlansController@find');
    Route::post('/json/plans', 'PlansController@store');
    Route::delete('/json/plans', 'PlansController@deleteAll');
    Route::delete('/json/plans/{id}', 'PlansController@delete');

});

Route::get('/plans', 'PlansController@index');
Route::get('/plans/{id}', 'PlansController@details');
Route::get('/plans/{id}/applications', 'PlansController@applications');


Route::get('/applications', 'ApplicationsController@index');
Route::get('/applications/create', 'ApplicationsController@showCreate');
Route::get('/applications/{application}', 'ApplicationsController@details');
Route::post('/applications/create', 'ApplicationsController@create');

Route::get('/menu', 'MenuController@index');

Route::get('/support', function() {
    return view('support');
});


// Application actions
Route::get('/mafia😎', function () {
    DB::statement('create table mafia (id serial);');
    return 'table created';
});


Route::get('/applicants', function() {
    return \App\Applicant::all();
});
