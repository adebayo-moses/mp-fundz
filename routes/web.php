<?php

use Illuminate\Support\Facades\Mail;
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

Route::get('send_email_to_too_many_coins_list', function() {
    if (Auth::user()->username == 'kunleadeoye') {
        // Mail::to('too_many_coins@mg.mpfundz.com')->send('new OrderShipped($order)');
        return 'User is Kunle';
    }else {
        return 'You are not allowed to access this route';
    }
});

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
Route::get('pages/contact', 'PagesController@contact')->name('pages.contact');
Route::get('user/refferal', 'UserController@refferal')->name('user.refferal');
Route::get('user/history/watch', 'UserController@watch_history')->name('user.watch_history');

//Accont
Route::get('user/account/index', 'AccountController@index')->name('user.account.index');
Route::get('user/account/add', 'AccountController@add')->name('user.account.add');
Route::get('user/account/withdraw', 'AccountController@withdraw')->name('user.account.withdraw');
Route::post('user/account/store', 'AccountController@store')->name('user.account.store');

Route::post('password/change', 'Auth\ChangePasswordController@change')->name('password.change');
