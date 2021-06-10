<?php

namespace App\Http\Controllers;

use App\Models\Video;
// use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware(['auth', 'verified']);
    }


    public function my_videos() {

        $videos = Video::where('user_id', Auth::id())->get();

        return view('users.videos')->with('videos', $videos);
    }


    public function profile() {

        $latest_videos = Video::take(5)->get();

        return view('users.profile')->with('latest_videos', $latest_videos);
    }
}
