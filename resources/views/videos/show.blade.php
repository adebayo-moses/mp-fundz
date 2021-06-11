@extends('layouts.app')

@section('title')
    <title>Show Video | MP Fundz</title>
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

    var data = new FormData();
    data.append("video", retrievedVideo);

    var player, playing = false;

    //Get height and width of the video from css
    const element = document.querySelector('.vid-pr');
    const style = getComputedStyle(element);
    const height = style.height //The height
    const width = style.width //The width


    function onYouTubeIframeAPIReady() {
        player = new YT.Player('player', {
            height: height,
            width: width,
            videoId: videoId,
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
        $.ajax({
            method: "POST",
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            url: "{{route('videos.points')}}",
            data: data,
            processData: false,
            contentType: false,
            success: (res) => {
                if(res.success == 'success') {
                    Swal.fire(
                        "Success!",
                        res.message,
                        'success'
                    ).then(function() {
                    });
                    $('#countdown').html('<a href="{{route('home')}}" style="font-weight:600;color:red"><b>MAKE MORE MONEY HERE</b></a>');
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


<section class="mn-sec">
    <div class="container">
        <div class="row">
            <div class="col-lg-9 mx-lg-auto">
                <div class="mn-vid-sc single_video">
                    @if ($video->check_history)
                        <h3 class="mb-4" style="color: red;">You've watched this video, and you won't be rewarded anymore!</h3>
                    @else
                        <h3 id="countdown" class="mb-4">Must play this video for <b><span id="played">0</span>/{{$video->exposure}} seconds to earn 10 points</b></h3>
                    @endif
                    <div class="vid-1">
                        <div class="vid-pr">
                            <div id="player"  video_id="{{$video->video_id}}" exposure={{$video->exposure}} video="{{$video->id}}"></div>
                        </div><!--vid-pr end-->
                        <div class="vid-info">
                            <h3>{{$video->title}}</h3>
                            <div class="info-pr">
                                {{-- <span>{{$video->views}} views</span> --}}
                                <div class="clearfix"></div>
                            </div><!--info-pr end-->
                        </div><!--vid-info end-->
                    </div><!--vid-1 end-->
                </div><!--mn-vid-sc end--->
            </div><!---col-lg-9 end-->
        </div>
    </div>
</section><!--mn-sec end-->

@endsection
