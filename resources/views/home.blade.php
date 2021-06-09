@extends('layouts.app')

@section('scripts')
    <script src="https://www.youtube.com/iframe_api"></script>
    <script type="text/javascript">
        // var token = '70b79478fbc5f3e41cebac634ef14093';
        var playing = false;
        var fullyPlayed = false;
        var interval = '';
        var played = 0;
        var length = 20;
        var response = '86';


        var player, playing = false;
        function onYouTubeIframeAPIReady() {
            player = new YT.Player('player', {
                width: '270',
                height: '169',
                videoId: 'M7lc1UVf-VE',
                events: {
                    'onStateChange': onYouTubePlayerStateChange
                }
            });
        }

        function YouTubePlaying() {
            played += 0.1;
            roundedPlayed = Math.ceil(played);
            document.getElementById("played").innerHTML = Math.min(roundedPlayed, length);
            if (roundedPlayed == length) {
                if (fullyPlayed == false) {
                    YouTubePlayed();
                    fullyPlayed = true
                }
            }
        }

        function YouTubePlayed() {
            // $.ajax({
            //     type: "POST",
            //     url: "system/gateways/video.php",
            //     data: "data=" + response + "&token=" + token,
            //     success: function(a) {
            //         $('#status').html(a);
            //         $('#countdown').html('<a href="?page=videos" style="font-weight:600;color:red"><b>WATCH ANOTHER VIDEO HERE</b></a>');
            //     }
            // })

            alert("Youtube Played");
        }

        function onYouTubePlayerReady(a) {
            ytplayer = document.getElementById("myytplayer");
            ytplayer.addEventListener("onStateChange", "onYouTubePlayerStateChange")
        }

        function onYouTubePlayerStateChange(a) {
            if (a.data == YT.PlayerState.PLAYING) {
                playing = true;
                interval = window.setInterval("YouTubePlaying()", 100)
            } else {
                if (playing) {
                    window.clearInterval(interval)
                }
                playing = false
            }
        }
    </script>
@endsection

@section('main')

@include('includes.side_menu')

<section class="vds-main">
    <div class="vidz-row">
        <div class="container">
            <div class="vidz_sec">
                <h3>Featured Videos</h3>
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
