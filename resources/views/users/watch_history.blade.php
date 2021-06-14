@extends('layouts.app')
@section('title')
    <title>Watch History | MP Fundz</title>
@endsection
@section('main')

@include('includes.side_menu')

<section class="vds-main">
    <div class="vidz-row">
        <div class="container">
            <div class="vidz_sec">
                <h3>Watched Videos</h3>
                <div class="vidz_list">
                    <div class="row">
                        @forelse ($video_history as $history)
                            <div class="col-lg-3 col-md-6 col-sm-6 col-6 full_wdth">
                                <div class="videoo">
                                    <div class="vid_thumbainl">
                                        <a href="{{route('videos.show', ['video' => $history->video->id])}}" title="">
                                            <img src="https://img.youtube.com/vi/{{$history->video->video_id}}/hqdefault.jpg" alt="{{$history->video->title}}" />
                                            <span class="vid-point">Reward:</span>
                                            <span class="vid-time">7 Coins</span>
                                            <span class="watch_later" style="color: orangered;">{{$history->video->check_history ? 'Watched' : ''}}</span>
                                            {{-- <span class="watch_later">
                                                <i class="icon-watch_later_fill"></i>
                                            </span> --}}
                                        </a>
                                    </div><!--vid_thumbnail end-->
                                    <div class="video_info">
                                        <h3><a href="#" title="">{{$history->video->title}}</a></h3>
                                        {{-- <h4><a href="#" title="">{{$history->video->user->username}}</a> <span class="verify_ic"><i class="icon-tick"></i></span></h4> --}}
                                        <span><a href="#" title="">By: {{$history->video->user->username}}</a> <span class="verify_ic"><i class="icon-tick"></i></span>&nbsp; &nbsp; &nbsp; <small class="posted_dt">{{\Carbon\Carbon::parse($history->video->created_at)->diffForHumans()}}</small></span>
                                    </div>
                                </div><!--videoo end-->
                            </div>
                        @empty
                            <p>You haven't watched any video yet</p>
                        @endforelse
                    </div>
                </div><!--vidz_list end-->
            </div><!--vidz_videos end-->
        </div>
    </div><!--vidz-row end-->
</section><!--vds-main end-->

@endsection
