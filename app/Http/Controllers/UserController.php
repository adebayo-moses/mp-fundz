<?php

namespace App\Http\Controllers;

use App\Models\Video;
use App\Models\VideoHistory;
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

        $latest_videos = Video::where('status', '!=' , 'pending')->where('show_video_on', '!=', 'contest')->orderBy('id', 'DESC')->take(5)->get();

        return view('users.profile')->with('latest_videos', $latest_videos);
    }

    public function refferal() {

        return view('users.refferal');
    }

    public function watch_history() {

        $video_history = VideoHistory::where('user_id', Auth::id())->orderBy('id', 'DESC')->get();

        return view('users.watch_history')->with('video_history', $video_history);
    }
}
