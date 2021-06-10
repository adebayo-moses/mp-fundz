<?php

namespace App\Http\Controllers;

use App\Models\Country;
use App\Models\Video;
use App\Models\VideoCategory;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class VideoController extends Controller
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
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $video_categories = VideoCategory::all();

        $countries = Country::all();

        return view('videos.create')
                ->with('video_categories', $video_categories)
                ->with('countries', $countries);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required',
            'url' => 'required',
            'exposure' => 'required',
            'views' => 'required',
            'receive_views_from' => 'required',
            'daily_limit' => 'required',
        ]);


        //Validated
        $video = Video::create([
            'path' => $request->input('url'),
            'title' => $request->input('title'),
            'user_id' => Auth::id(),
            'views' => $request->input('views'),
            'published' => true,
            'exposure' => $request->input('exposure'),
            'daily_limit' => $request->input('daily_limit'),
            // 'receive_views_from' => $request->input('receive_views_from')
        ]);

        $video->countries()->attach($request->receive_views_from);

        return redirect()->route('home');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $video = Video::find($id);

        return view('videos.show')->with('video', $video);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    public function addPoint() {
        $user = User::find(Auth::id());

        $coin_balance = $user->coin_balance;

        $updated_coin_balance = $coin_balance + 10.00;

        if(User::where('id', Auth::user()->id)->update([
            'coin_balance' => $updated_coin_balance
        ])) {
            // return redirect('user/trade/giftcards/index')->with('success', 'Your withdrawal request is successfully initiated, kindly wait for response from our disbursement team, it takes less than 10 minutes.');
            return response()->json(
                [
                    'success' => true,
                    'message' => 'Great! you have successfully earned 10 points'
                ]
            );
        };
    }
}
