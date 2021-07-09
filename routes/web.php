<?php

use App\User;
use Illuminate\Support\Facades\Auth;
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
        // $details = [
        //     'title' => 'Mail from MPFundz.com',
        //     'body' => 'This is for testing email using smtp'
        // ];

        Mail::to('info@mg.mpfundz.com')->send(new \App\Mail\NewVideoMail());

        dd("Email is Sent.");
        // return 'User is Kunle';
    }else {
        return 'You are not allowed to access this route';
    }
});

Route::get('/', 'PagesController@index');

Route::get('get_winners', function() {

    if (Auth::user()->username == 'kunleadeoye') {
        // dd(User::where('total_entry', '!=', 0)->get());
        // $array = Array();
        foreach(User::all() as $user) {

            // array_push($user->total_entry);

            if ($user->total_entry != 0) {
                # code...
                echo 'Name: ' . $user->first_name . ' ' . $user->last_name . ', Username: ' . $user->username .  ', Total Entry: ' . $user->total_enry . '<br>';
            }

        }

        // return $array;

        // $result = User::all()->pluck('total_entry');

        // dd($result);

        // return rsort($result);
    }else {
        return 'You are not allowed to access this route';
    }
});

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

// Contest
Route::get('/contest/join', 'ContestController@join')->name('join_contest');

//Show video
Route::get('/contest/video/{id}', 'ContestController@show_video')->name('contest.show_video')->middleware('paycheck');

//Add entry
Route::post('/contest/entry/add', 'ContestController@add_entry')->name('contest.add_entry')->middleware('paycheck');

//Payment Integration
// The route that the button calls to initialize payment
Route::get('/pay', 'FlutterwaveController@initialize')->name('pay');
// The callback url after a payment
Route::get('/rave/callback', 'FlutterwaveController@callback')->name('callback');

//success url
Route::get('/payment_success', 'FlutterwaveController@payment_success')->name('payment_success');
//success failed
Route::get('/payment_failed', 'FlutterwaveController@payment_failed')->name('payment_failed');
