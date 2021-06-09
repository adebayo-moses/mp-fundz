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
    // var token = '70b79478fbc5f3e41cebac634ef14093';
    var playing = false;
    var fullyPlayed = false;
    var interval = '';
    var played = 0;
    var length = document.getElementById('player').getAttribute("exposure");

    var videoId = document.getElementById('player').getAttribute("video_id");
    // var response = '86';


    var player, playing = false;
    function onYouTubeIframeAPIReady() {
        player = new YT.Player('player', {
            height: '585',
            width: '847.5',
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
        // $.ajax({
        //     type: "POST",
        //     url: "system/gateways/video.php",
        //     data: "data=" + response + "&token=" + token,
        //     success: function(a) {
        //         $('#status').html(a);
        //         $('#countdown').html('<a href="?page=videos" style="font-weight:600;color:red"><b>WATCH ANOTHER VIDEO HERE</b></a>');
        //     }
        // })

        $.ajax({
            method: "POST",
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            url: "{{route('videos.points')}}",
            // data: data,
            processData: false,
            contentType: false,
            // beforeSend: function(){
            //     $('#account-add-form button[type=submit]').attr('disabled', true);
            //     $('#account-add-form button[type=submit] #request').hide();
            //     $("#spinner").show();
            // },
            success: (res) => {
                Swal.fire(
                    "Success!",
                    res.message,
                    'success'
                ).then(function() {
                });

                $('#countdown').html('<a href="{{route('home')}}" style="font-weight:600;color:red"><b>WATCH ANOTHER VIDEO HERE</b></a>');
            } ,
            error: (response) => {
                if(response.status === 422) {
                    let errors = response.responseJSON.errors;
                    Object.keys(errors).forEach(function (key) {
                        $("#" + key + "Error").text(errors[key][0]);
                    });
                } else {
                    // window.location.reload();
                }
            },
            // complete: function() {
            //     $('#account-add-form button[type=submit]').attr('disabled', false);
            //     $('#account-add-form button[type=submit] #request').show();
            //     $("#spinner").hide();
            // },
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
                    {{-- <h3 class="mb-3">{{$video->title}}</h3> --}}
                    <h3 id="countdown" class="mb-4">Must play this video for <b><span id="played">0</span>/{{$video->exposure}} seconds to earn 10 points</b></h3>
                    <div class="vid-1">
                        <div class="vid-pr">
                            <div id="player"  video_id="{{$video->video_id}}" exposure={{$video->exposure}}></div>
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
