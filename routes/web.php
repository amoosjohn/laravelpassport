<?php
use App\Events\StatusLiked;
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
    return view('welcome');
});
Route::get('/home', function () {
    return view('welcome');
});

Route::get('/about', 'HomeController@index');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');


Route::resource('/task', 'TaskController');

Route::get('/status', function () {

    return view('status');
});

Route::get('/test', function () {
	\Event::fire(new StatusLiked('TEST'));
    return "TEST Event has been sent!";
});

Route::get('/notify', 'PusherController@index');
Route::post('/notify', 'PusherController@sendNotification');

