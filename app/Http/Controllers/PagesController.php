<?php

namespace App\Http\Controllers;

use App\Models\Video;
use Illuminate\Http\Request;

class PagesController extends Controller
{
    public function index() {

        $videos = Video::all();

        return view('welcome')->with('videos', $videos);
    }
}
