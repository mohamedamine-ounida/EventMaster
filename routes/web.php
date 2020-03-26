<?php

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

Route::get('/', function () {
    return view('auth.login');
});
/*
Route::get('Events','EventController@index');
Route::get('Events/create','EventController@create');
Route::post('Events','EventController@store');
Route::get('Events/{id}/edit','EventController@edit');
Route::put('Events/{id}','EventController@update');
Route::delete('Events/{id}','EventController@destroy');
*/
Route::resource('Events','EventController');

Route::post('/session/create/{id}', 'SessionController@create');
Route::get('/session/create/{id}', 'SessionController@create');
Route::post('/session/store/{id}', 'SessionController@store');
Route::get('/session/store/{id}', 'SessionController@store');
Route::post('/session/delete/{id}', 'SessionController@destroy');

Route::post('/tickets/{id}','TicketController@add');

Route::resource('Users','UserController');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

