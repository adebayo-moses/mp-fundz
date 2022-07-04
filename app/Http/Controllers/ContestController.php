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


        $user = $this->getUser();

        if($current_contest !== null) {
            //There is an active contest
            if (!$current_contest->activate_payment) {
                //No payment activated for the active contest

                //Attach user to contest
                $current_contest->users()->attach($user->id);
                return redirect()->route('contest.show_videos');
            }

            //Payment is activated
            //Before redirecting to the payment route, check if user has paid for this contest
            $result = $this->checkIfUserIsAttachedToContest();

            if ($result) {
                //User is attached to this contest, go to contest page
                return redirect()->route('contest.show_videos');
            }

            //User not attached to this contest //Check if user has sufficient coins

            $user_coin_balance = $user->coin_balance;
            //If user has sufficient coins, deduct the amount for the contest, attach user to contest, and go to contest
            if($user_coin_balance >= '50.00') {
                //User has sufficient coin balance // deduct it, and update coin balance in db
                $updated_coin_balance = $user_coin_balance - '50.00';

                $user->update([
                    'coin_balance' => $updated_coin_balance
                ]);

                //Attach user to contest
                $current_contest->users()->attach($user->id);

                //Go to contest page
                return redirect()->route('contest.show_videos');
            }

            //No sufficient coins at this point, go to the coin purchase page
            return view('contest.purchase_coin');

            // return redirect()->route('pay');

        } else {

            $error_text = '';

            if($this->getTodayContest() !== null) {
                //There's a contest today
                $error_text = 'No contest is active at the moment, check by ' . $this->getTodayContest()->start_time;
            } else {
                $error_text = 'No contest is active at the moment';
            }

            return redirect()->back()->with('error', $error_text);
        }
    }

    public function show_videos() {
        //Get contest videos
        $contest_videos = $this->getContestVideos();

        return view('contest.index')->with('contest_videos', $contest_videos);
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
