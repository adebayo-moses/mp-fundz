<?php

namespace App\Http\Controllers;

use App\Models\Video;

class PagesController extends Controller
{
    public function index() {

        $videos = Video::where('status', '!=' , 'pending')->where('show_video_on', '!=', 'contest')->orderBy('id', 'DESC')->simplePaginate(40);

        return view('welcome')->with('videos', $videos);
    }

    public function contact() {

        return view('pages.contact');
    }
}
