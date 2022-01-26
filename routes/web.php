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
Route::group(['middleware' => 'auth'], function(){
Route::get('/', 'PostController@index');
Route::post('/starbucks', 'PostController@store');
Route::get('/starbucks/create', 'PostController@create');
Route::get('/starbucks/{starbucks}/edit', 'PostController@edit');
Route::put('/starbucks/{starbucks}', 'PostController@update');
Route::get('/starbucks/{starbucks}', 'PostController@show');
Route::delete('/starbucks/{starbucks}', 'PostController@delete');


Route::post('/coding', 'PostController@codingStore');
Route::get('/coding/create', 'PostController@codingCreate');
Route::get('/coding/{coding}/edit', 'PostController@codingEdit');
Route::put('/coding/{coding}', 'PostController@codingUpdate');
Route::get('/coding/{coding}', 'PostController@codingShow');
Route::delete('/coding/{coding}', 'PostController@codingDelete');

Route::post('/to_do', 'PostController@toDoStore');
Route::get('/to_do/create', 'PostController@toDoCreate');
Route::get('/to_do/{to_do}/edit', 'PostController@toDoEdit');
Route::put('/to_do/{to_do}', 'PostController@toDoUpdate');
Route::delete('/to_do/{to_do}', 'PostController@toDoDelete');


Route::resource('/calendar', 'GoogleCalendarController');
});
Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
