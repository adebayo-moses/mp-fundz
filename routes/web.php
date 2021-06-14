<?php

use Illuminate\Support\Facades\Route;

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

Route::get('/', 'PagesController@index');

Auth::routes(['verify' => true]);

Route::get('/home', 'HomeController@index')->name('home');

//Videos
Route::resources([
    'videos' => 'VideoController',
]);

Route::post('/video/add_point', 'VideoController@addPoint')->name('videos.points');

//Users
Route::get('user/videos', 'UserController@my_videos')->name('user.videos');
Route::get('user/profile', 'UserController@profile')->name('user.profile');
Route::get('user/refferal', 'UserController@refferal')->name('user.refferal');
Route::get('user/history/watch', 'UserController@watch_history')->name('user.watch_history');

Route::post('password/change', 'Auth\ChangePasswordController@change')->name('password.change');
