<?php

namespace App\Http\Traits;

use App\Models\Contest;
use App\Models\Payment;
use App\Models\Video;
use App\User;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;

trait QueryTrait {

    public function getCurrentContest() {
        //Date now
        $current_date = Carbon::now()->format('Y-m-d');

        //Time now
        $current_time = Carbon::now()->format('H:i:s');

        return Contest::where('date', $current_date)->whereTime('start_time', '<=', $current_time)->whereTime('end_time', '>=', $current_time)->first();
    }

    public function getTodayContest() {
        //Date now
        $current_date = Carbon::now()->format('Y-m-d');

        //Time now
        $current_time = Carbon::now()->format('H:i:s');

        return Contest::where('date', $current_date)->where('publish', 1)->where('end_time', '>' , $current_time)->orderBy('id', 'DESC')->first();
    }

    public function getPaymentRecord() {

        $current_contest = $this->getCurrentContest();

        return Payment::where('user_id', Auth::id())->where('contest_id', $current_contest->id)->where('status', 'success')->first();
    }

    public function getContestVideos() {

        return Video::where('status', '!=' , 'pending')->where('show_video_on', 'contest')->orwhere('show_video_on', 'both')->orderBy('id', 'DESC')->simplePaginate(8);
    }

    public function attachUserToContest() {

        $current_contest = $this->getCurrentContest();

        //Attach the user
        return $current_contest->users()->attach(Auth::id());
    }

    public function getUser() {

        return User::find(Auth::id());
    }


    public function getVideo($id) {
        return Video::find($id);
    }
}
