@extends('layouts.app')

@section('title')
    <title>Show Contest Video | MP Fundz</title>
@endsection

@section('css')
@endsection

@section('scripts')
<script src="https://www.youtube.com/iframe_api"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@9"></script>
<script type="text/javascript">
    var playing = false;
    var fullyPlayed = false;
    var interval = '';
    var played = 0;
    var length = document.getElementById('player').getAttribute("exposure");
    var videoId = document.getElementById('player').getAttribute("video_id");

    var retrievedVideo = document.getElementById('player').getAttribute("video");
    var watchedVideo = document.getElementById('player').getAttribute("watched");

    var data = new FormData();
    data.append("video", retrievedVideo);

    var player, playing = false;

    //Get height and width of the video from css
    const element = document.querySelector('.vid-pr');
    const style = getComputedStyle(element);
    const height = style.height //The height
    const width = style.width //The width

    //When the iframe is ready, initiate the player... when the state changes, fire onYouTubePlayerStateChange event
    function onYouTubeIframeAPIReady() {
        player = new YT.Player('player', {
            height,
            width,
            videoId,
            events: {
                'onStateChange': onYouTubePlayerStateChange
            }
        });
    }

    //When the youtube player is playing
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

    //The youtube video has been played for the exposure specified, reward user
    function YouTubePlayed() {
        if (watchedVideo == 0) {
            $.ajax({
                method: "POST",
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                url: "{{route('contest.add_entry')}}",
                data: data,
                processData: false,
                contentType: false,
                success: (res) => {
                    if(res) {
                        Swal.fire(
                            "Success!",
                            res.message,
                            'success'
                        ).then(function() {
                        });
                        $('#countdown').html('<a href="{{route('join_contest')}}" style="font-weight:600;color:red"><b>WATCH MORE VIDEOS HERE</b></a>');
                    }

                } ,
                error: (response) => {
                    if(response.status === 422) {
                        let errors = response.responseJSON.errors;
                        Object.keys(errors).forEach(function (key) {
                            $("#" + key + "Error").text(errors[key][0]);
                        });
                    }
                },
            });
        }
    }

    //When the youtube player is ready, initiate and allow event to fire
    function onYouTubePlayerReady(a) {
        ytplayer = document.getElementById("myytplayer");
        ytplayer.addEventListener("onStateChange", "onYouTubePlayerStateChange")
    }

    //When the state changes; e.g play
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


<section class="mn-sec">
    <div class="container">
        <div class="row">
            <div class="col-lg-9 mx-lg-auto">
                <div class="mn-vid-sc single_video">
                    @if ($video->check_entry_history)
                        <h3 class="mb-4" style="color: red;">You've watched this video, and you won't have an entry on it anymore! <span style="color: black;"><a href="{{route('home')}}">Watch More Videos</a></span></h3>
                    @else
                    <h3 id="countdown" class="mb-4">You must play this video for <b><span id="played">0</span>/{{$video->exposure}} seconds to have {{$video->video_entry}} {{$video->video_entry == '1' ? 'entry' : 'entries'}}</b></h3>
                    @endif
                    <div class="vid-1">
                        @if ($video->video_type == 'youtube')
                            <div class="vid-pr">
                                <div id="player"  video_id="{{$video->video_id}}" exposure={{$video->exposure}} video="{{$video->id}}" watched={{$video->check_entry_history}}></div>
                            </div><!--vid-pr end-->
                            <div class="vid-info">
                                <h3>{{$video->title}}</h3>
                                <div class="info-pr">
                                    {{-- <span>{{$video->views}} views</span> --}}
                                    <div class="clearfix"></div>
                                </div><!--info-pr end-->
                            </div><!--vid-info end-->
                        @else
                            <div class="vid-pr">
                                <!-- Load Facebook SDK for JavaScript -->
                                <div id="fb-root"></div>
                                <script async defer src="https://connect.facebook.net/en_US/sdk.js#xfbml=1&version=v3.2"></script>

                                <!-- Your embedded video player code -->
                                <div class="fb-video" data-href="https://www.facebook.com/facebook/videos/165608152267073/" data-show-text="false"></div>
                            </div><!--vid-pr end-->
                            <div class="vid-info">
                                <h3>How to share with just friends.</h3>
                                <div class="info-pr">
                                    {{-- <span>{{$video->views}} views</span> --}}
                                    <div class="clearfix"></div>
                                </div><!--info-pr end-->
                            </div><!--vid-info end-->
                        @endif
                    </div><!--vid-1 end-->
                </div><!--mn-vid-sc end--->
            </div><!---col-lg-9 end-->
        </div>
    </div>
</section><!--mn-sec end-->

@endsection
