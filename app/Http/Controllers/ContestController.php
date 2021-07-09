<?php

namespace App\Http\Controllers;

use App\Models\Video;
use Illuminate\Http\Request;

use App\Http\Traits\QueryTrait;
use App\Models\Entry;

class ContestController extends Controller
{
    use QueryTrait;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware(['auth', 'verified']);
    }


    public function join() {
        //Get current contest from trait
        $current_contest = $this->getCurrentContest();

        //Get contest videos
        $contest_videos = $this->getContestVideos();


        if($current_contest !== null) {
            //There is an active contest
            if (!$current_contest->activate_payment) {
                //No payment activated for the active contest
                return view('contest.index')->with('contest_videos', $contest_videos);
            }

            //Payment is activated
            //Before redirecting to the payment route, check if user has paid for this contest
            $payment_record = $this->getPaymentRecord();

            if ($payment_record !== null) {
                //payment found, go to contest page
                return view('contest.index')->with('contest_videos', $contest_videos);
            }

            //No payment found
            //Redirect to the payment route
            return redirect()->route('pay');

        } else {
            return redirect()->back()->with('error', 'No contest is active at the moment');
        }
    }

    public function show_video($id) {

        //If user tries to access video that's not part of the contest, go back home
        $contest_videos = $this->getContestVideos();
        if(!$contest_videos->contains('id', $id)) {
            return redirect('home');
        }

        $video = Video::find($id);

        return view('contest.show_video')->with('video', $video);
    }

    public function add_entry(Request $request) {

        $user = $this->getUser();
        $current_contest_id = $this->getCurrentContest()->id;
        $theVideo = $this->getVideo($request->input('video'));

        $user_record_for_this_video = Entry::where('contest_id', $current_contest_id)->where('user_id', $user->id)->where('video_id', $request->input('video'))->first();

        if($user_record_for_this_video === null){
            //No entry found

            //Create watch history
            Entry::create([
                'contest_id' => $current_contest_id,
                'user_id' => $user->id,
                'video_id' => $request->input('video'),
                'entry' => $theVideo->video_entry,
            ]);

            $entry_text = $theVideo->video_entry == 1 ? 'entry' : 'entries';

            return response()->json(
                [
                    'success' => true,
                    'message' => 'Great! you have successfully secured ' . $theVideo->video_entry . ' ' . $entry_text .', good luck!'
                ]
            );
        }
    }
}
