<?php

namespace App\Http\Controllers;

use App\Models\Video;

class HomeController extends Controller
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

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {

        $videos = Video::where('status', '!=' , 'pending')->where('show_video_on', '!=', 'contest')->orderBy('id', 'DESC')->simplePaginate(8);

        return view('home')->with('videos', $videos);
    }
}
