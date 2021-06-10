@extends('layouts.app')
@section('title')
    <title>My Videos | MP Fundz</title>
@endsection
@section('main')

@include('includes.side_menu')

<section class="vds-main">
    <div class="vidz-row">
        <div class="container">
            <div class="vidz_sec">
                <h3>My Videos</h3>
                <div class="vidz_list">
                    <div class="row">
                        @foreach ($videos as $video)
                            <div class="col-lg-3 col-md-6 col-sm-6 col-6 full_wdth">
                                <div class="videoo">
                                    <div class="vid_thumbainl">
                                        <a href="{{route('videos.show', ['video' => $video->id])}}" title="">
                                            <img src="https://img.youtube.com/vi/{{$video->video_id}}/hqdefault.jpg" alt="">
                                            {{-- <div id="status"></div>
                                            <div id="countdown">Must play this video for <b><span id="played">0</span>/10 seconds</b></div>
                                            <div id="player"></div> --}}
                                            <span class="vid-point">5 points</span>
                                            <span class="vid-time">10:21</span>
                                            <span class="watch_later">
                                                <i class="icon-watch_later_fill"></i>
                                            </span>
                                        </a>
                                    </div><!--vid_thumbnail end-->
                                    <div class="video_info">
                                        <h3><a href="#" title="">{{$video->title}}</a></h3>
                                        {{-- <h4><a href="#" title="">{{$video->user->username}}</a> <span class="verify_ic"><i class="icon-tick"></i></span></h4> --}}
                                        <span><a href="#" title="">By: {{$video->user->username}}</a> <span class="verify_ic"><i class="icon-tick"></i></span>&nbsp; &nbsp; &nbsp; <small class="posted_dt">{{\Carbon\Carbon::parse($video->created_at)->diffForHumans()}}</small></span>
                                    </div>
                                </div><!--videoo end-->
                            </div>
                        @endforeach
                    </div>
                </div><!--vidz_list end-->
            </div><!--vidz_videos end-->
        </div>
    </div><!--vidz-row end-->
</section><!--vds-main end-->

@endsection
