<script>
    // 2. This code loads the IFrame Player API code asynchronously.
    var tag = document.createElement('script');
    tag.src = "https://www.youtube.com/iframe_api";
    var firstScriptTag = document.getElementsByTagName('script')[0];
    firstScriptTag.parentNode.insertBefore(tag, firstScriptTag);

    //Get the player element
    var playerElement = document.getElementById('player');

    //Get id of the video
    var videoId = playerElement.getAttribute("video_id");

    //Get height and width of the video from css
    var element = document.querySelector('.vid-pr');
    var style = getComputedStyle(element);
    var height = style.height //The height
    var width = style.width //The width

    // This function creates an <iframe> (and YouTube player)
    //    after the API code downloads.
    var player;
    function onYouTubeIframeAPIReady() {
        player = new YT.Player('player', {
            height,
            width,
            videoId,
            events: {
            // 'onReady': onPlayerReady,
            'onStateChange': onYouTubePlayerStateChange
            }
        });
    }

    // function onPlayerReady() {
    //     document.querySelector('.spinner').style.display = "none";
    // }

    //When the state changes; e.g play
    var interval, playing= false, watchedVideo = playerElement.getAttribute("watched");
    function onYouTubePlayerStateChange(e) {
        if (e.data == YT.PlayerState.PLAYING) {
            if(watchedVideo == 0) {
                playing = true;
                interval = setInterval("YouTubePlaying()", 1000);
            }
        } else {
            if (playing) {
                clearInterval(interval);
            }
            playing = false
        }
    }

    // When the youtube player is playing, run this function
    var rewarded = false, playedTime = 0, videoExposure = playerElement.getAttribute("exposure");
    function YouTubePlaying() {
        // playedTime = Math.floor(player.getCurrentTime());
        playedTime += 1;
        document.getElementById("played").innerHTML = playedTime;
        if (playedTime == videoExposure && !rewarded) {
            //Video played for the specified exposure, reward user
            YouTubePlayed();
            rewarded = true;
            clearInterval(interval);
        }
    }


    //The youtube video has been played for the exposure specified, reward user
    var retrievedVideo = playerElement.getAttribute("video");
    var data = new FormData();
    data.append("video", retrievedVideo);
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
                if(res) {
                    Swal.fire(
                        "Success!",
                        res.message,
                        'success'
                    ).then(function() {
                    });
                    $('#countdown').html('<a href="{{route('home')}}" style="font-weight:600;color:red"><b>MAKE MORE MONEY HERE</b></a>');
                }

            },
        });
    }
</script>
