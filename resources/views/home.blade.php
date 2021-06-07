@extends('layouts.app')

@section('main')

@include('includes.side_menu')

<section class="vds-main">
    <div class="vidz-row">
        <div class="container">
            <div class="vidz_sec">
                <h3>Featured Videos</h3>
                <div class="vidz_list">
                    <div class="row">
                        <div class="col-lg-3 col-md-6 col-sm-6 col-6 full_wdth">
                            <div class="videoo">
                                <div class="vid_thumbainl">
                                    <a href="#" title="">
                                        <img src="{{asset('assets/images/resources/vide1.png')}}" alt="">
                                        <span class="vid-time">10:21</span>
                                        <span class="watch_later">
                                            <i class="icon-watch_later_fill"></i>
                                        </span>
                                    </a>
                                </div><!--vid_thumbnail end-->
                                <div class="video_info">
                                    <h3><a href="#" title="">Kingdom Come: Deliverance Funny Moments and Fails</a></h3>
                                    <h4><a href="#" title="">newfox media</a> <span class="verify_ic"><i class="icon-tick"></i></span></h4>
                                    <span>686K views .<small class="posted_dt">1 week ago</small></span>
                                </div>
                            </div><!--videoo end-->
                        </div>
                        <div class="col-lg-3 col-md-6 col-sm-6 col-6 full_wdth">
                            <div class="videoo">
                                <div class="vid_thumbainl">
                                    <a href="#" title="">
                                        <img src="{{asset('assets/images/resources/vide2.png')}}" alt="">
                                        <span class="vid-time">13:49</span>
                                        <span class="watch_later">
                                            <i class="icon-watch_later_fill"></i>
                                        </span>
                                    </a>
                                </div><!--vid_thumbnail end-->
                                <div class="video_info">
                                    <h3><a href="#" title="">DR DISRESPECT - Before They Were Famous - Twitch Streamer</a></h3>
                                    <h4><a href="#" title="">Eros Now</a> </h4>
                                    <span>283K views .<small class="posted_dt">3 months ago</small></span>
                                </div>
                            </div><!--videoo end-->
                        </div>
                        <div class="col-lg-3 col-md-6 col-sm-6 col-6 full_wdth">
                            <div class="videoo">
                                <div class="vid_thumbainl">
                                    <a href="#" title="">
                                        <img src="{{asset('assets/images/resources/vide3.png')}}" alt="">
                                        <span class="vid-time">2:54</span>
                                        <span class="watch_later">
                                            <i class="icon-watch_later_fill"></i>
                                        </span>
                                    </a>
                                </div><!--vid_thumbnail end-->
                                <div class="video_info">
                                    <h3><a href="#" title="">Top Perectly Timed Twitch Moments 2017 #7</a></h3>
                                    <h4><a href="#" title="">Animal Planet</a> <span class="verify_ic"><i class="icon-tick"></i></span></h4>
                                    <span>2.6M views .<small class="posted_dt">2 months ago</small></span>
                                </div>
                            </div><!--videoo end-->
                        </div>
                        <div class="col-lg-3 col-md-6 col-sm-6 col-6 full_wdth">
                            <div class="videoo">
                                <div class="vid_thumbainl">
                                    <a href="#" title="">
                                        <img src="{{asset('assets/images/resources/vide4.png')}}" alt="">
                                        <span class="vid-time">5:25</span>
                                        <span class="watch_later">
                                            <i class="icon-watch_later_fill"></i>
                                        </span>
                                    </a>
                                </div><!--vid_thumbnail end-->
                                <div class="video_info">
                                    <h3><a href="#" title="">Top 5 Amazing Bridge Block ever in PUBG</a></h3>
                                    <h4><a href="#" title="">Maketzi</a> </h4>
                                    <span>612K views .<small class="posted_dt">5 months ago</small></span>
                                </div>
                            </div><!--videoo end-->
                        </div>
                        <div class="col-lg-3 col-md-6 col-sm-6 col-6 full_wdth">
                            <div class="videoo">
                                <div class="vid_thumbainl">
                                    <a href="#" title="">
                                        <img src="{{asset('assets/images/resources/vide5.png')}}" alt="">
                                        <span class="vid-time">4:01</span>
                                        <span class="watch_later">
                                            <i class="icon-watch_later_fill"></i>
                                        </span>
                                    </a>
                                </div><!--vid_thumbnail end-->
                                <div class="video_info">
                                    <h3><a href="#" title="">Trailer Park Boys Season 12 - Official Trailer</a></h3>
                                    <h4><a href="#" title="">ScereBro</a> </h4>
                                    <span>45K views .<small class="posted_dt">3 days ago</small></span>
                                </div>
                            </div><!--videoo end-->
                        </div>
                        <div class="col-lg-3 col-md-6 col-sm-6 col-6 full_wdth">
                            <div class="videoo">
                                <div class="vid_thumbainl">
                                    <a href="#" title="">
                                        <img src="{{asset('assets/images/resources/vide6.png')}}" alt="">
                                        <span class="vid-time">6:20</span>
                                        <span class="watch_later">
                                            <i class="icon-watch_later_fill"></i>
                                        </span>
                                    </a>
                                </div><!--vid_thumbnail end-->
                                <div class="video_info">
                                    <h3><a href="#" title="">A day in the life of a Google software engineer</a></h3>
                                    <h4><a href="#" title="">MathChief</a> </h4>
                                    <span>86K views .<small class="posted_dt">6 days ago</small></span>
                                </div>
                            </div><!--videoo end-->
                        </div>
                        <div class="col-lg-3 col-md-6 col-sm-6 col-6 full_wdth">
                            <div class="videoo">
                                <div class="vid_thumbainl">
                                    <a href="#" title="">
                                        <img src="{{asset('assets/images/resources/vide7.png')}}" alt="">
                                        <span class="vid-time">8:16</span>
                                        <span class="watch_later">
                                            <i class="icon-watch_later_fill"></i>
                                        </span>
                                    </a>
                                </div><!--vid_thumbnail end-->
                                <div class="video_info">
                                    <h3><a href="#" title="">Avengers: Infinity War - Gym Workout motivation 2019</a></h3>
                                    <h4><a href="#" title="">RealLifeLore</a> <span class="verify_ic"><i class="icon-tick"></i></span></h4>
                                    <span>144K views .<small class="posted_dt">6 days ago</small></span>
                                </div>
                            </div><!--videoo end-->
                        </div>
                        <div class="col-lg-3 col-md-6 col-sm-6 col-6 full_wdth">
                            <div class="videoo">
                                <div class="vid_thumbainl">
                                    <a href="#" title="">
                                        <img src="{{asset('assets/images/resources/vide8.png')}}" alt="">
                                        <span class="vid-time">29:32</span>
                                        <span class="watch_later">
                                            <i class="icon-watch_later_fill"></i>
                                        </span>
                                    </a>
                                </div><!--vid_thumbnail end-->
                                <div class="video_info">
                                    <h3><a href="#" title="">How the Universe Works - The Milky Way Galaxy - Space</a></h3>
                                    <h4><a href="#" title="">Loskes</a></h4>
                                    <span>408K views .<small class="posted_dt">19 hours ago</small></span>
                                </div>
                            </div><!--videoo end-->
                        </div>
                    </div>
                </div><!--vidz_list end-->
            </div><!--vidz_videos end-->
        </div>
    </div><!--vidz-row end-->
    <div class="vidz-row">
        <div class="container">
            <div class="vidz_sec">
                <h3>New Videos</h3>
                <div class="vidz_list">
                    <div class="row">
                        <div class="col-lg-3 col-md-6 col-sm-6 col-6 full_wdth">
                            <div class="videoo">
                                <div class="vid_thumbainl">
                                    <a href="#" title="">
                                        <img src="{{asset('assets/images/resources/vide13.png')}}" alt="">
                                        <span class="vid-time">10:21</span>
                                        <span class="watch_later">
                                            <i class="icon-watch_later_fill"></i>
                                        </span>
                                    </a>
                                </div><!--vid_thumbnail end-->
                                <div class="video_info">
                                    <h3><a href="#" title="">Kingdom Come: Deliverance Funny Moments and Fails</a></h3>
                                    <h4><a href="#" title="">newfox media</a> <span class="verify_ic"><i class="icon-tick"></i></span></h4>
                                    <span>686K views .<small class="posted_dt">1 week ago</small></span>
                                </div>
                            </div><!--videoo end-->
                        </div>
                        <div class="col-lg-3 col-md-6 col-sm-6 col-6 full_wdth">
                            <div class="videoo">
                                <div class="vid_thumbainl">
                                    <a href="#" title="">
                                        <img src="{{asset('assets/images/resources/vide14.png')}}" alt="">
                                        <span class="vid-time">13:49</span>
                                        <span class="watch_later">
                                            <i class="icon-watch_later_fill"></i>
                                        </span>
                                    </a>
                                </div><!--vid_thumbnail end-->
                                <div class="video_info">
                                    <h3><a href="#" title="">DR DISRESPECT - Before They Were Famous - Twitch Streamer</a></h3>
                                    <h4><a href="#" title="">Eros Now</a> </h4>
                                    <span>283K views .<small class="posted_dt">3 months ago</small></span>
                                </div>
                            </div><!--videoo end-->
                        </div>
                        <div class="col-lg-3 col-md-6 col-sm-6 col-6 full_wdth">
                            <div class="videoo">
                                <div class="vid_thumbainl">
                                    <a href="#" title="">
                                        <img src="{{asset('assets/images/resources/vide15.png')}}" alt="">
                                        <span class="vid-time">2:54</span>
                                        <span class="watch_later">
                                            <i class="icon-watch_later_fill"></i>
                                        </span>
                                    </a>
                                </div><!--vid_thumbnail end-->
                                <div class="video_info">
                                    <h3><a href="#" title="">Top Perectly Timed Twitch Moments 2017 #7</a></h3>
                                    <h4><a href="#" title="">Animal Planet</a> <span class="verify_ic"><i class="icon-tick"></i></span></h4>
                                    <span>2.6M views .<small class="posted_dt">2 months ago</small></span>
                                </div>
                            </div><!--videoo end-->
                        </div>
                        <div class="col-lg-3 col-md-6 col-sm-6 col-6 full_wdth">
                            <div class="videoo">
                                <div class="vid_thumbainl">
                                    <a href="#" title="">
                                        <img src="{{asset('assets/images/resources/vide16.png')}}" alt="">
                                        <span class="vid-time">5:25</span>
                                        <span class="watch_later">
                                            <i class="icon-watch_later_fill"></i>
                                        </span>
                                    </a>
                                </div><!--vid_thumbnail end-->
                                <div class="video_info">
                                    <h3><a href="#" title="">Top 5 Amazing Bridge Block ever in PUBG</a></h3>
                                    <h4><a href="#" title="">Maketzi</a> </h4>
                                    <span>612K views .<small class="posted_dt">5 months ago</small></span>
                                </div>
                            </div><!--videoo end-->
                        </div>
                        <div class="col-lg-3 col-md-6 col-sm-6 col-6 full_wdth">
                            <div class="videoo">
                                <div class="vid_thumbainl">
                                    <a href="#" title="">
                                        <img src="{{asset('assets/images/resources/vide17.png')}}" alt="">
                                        <span class="vid-time">4:01</span>
                                        <span class="watch_later">
                                            <i class="icon-watch_later_fill"></i>
                                        </span>
                                    </a>
                                </div><!--vid_thumbnail end-->
                                <div class="video_info">
                                    <h3><a href="#" title="">Trailer Park Boys Season 12 - Official Trailer</a></h3>
                                    <h4><a href="#" title="">ScereBro</a> </h4>
                                    <span>45K views .<small class="posted_dt">3 days ago</small></span>
                                </div>
                            </div><!--videoo end-->
                        </div>
                        <div class="col-lg-3 col-md-6 col-sm-6 col-6 full_wdth">
                            <div class="videoo">
                                <div class="vid_thumbainl">
                                    <a href="#" title="">
                                        <img src="{{asset('assets/images/resources/vide18.png')}}" alt="">
                                        <span class="vid-time">6:20</span>
                                        <span class="watch_later">
                                            <i class="icon-watch_later_fill"></i>
                                        </span>
                                    </a>
                                </div><!--vid_thumbnail end-->
                                <div class="video_info">
                                    <h3><a href="#" title="">A day in the life of a Google software engineer</a></h3>
                                    <h4><a href="#" title="">MathChief</a> </h4>
                                    <span>86K views .<small class="posted_dt">6 days ago</small></span>
                                </div>
                            </div><!--videoo end-->
                        </div>
                        <div class="col-lg-3 col-md-6 col-sm-6 col-6 full_wdth">
                            <div class="videoo">
                                <div class="vid_thumbainl">
                                    <a href="#" title="">
                                        <img src="{{asset('assets/images/resources/vide19.png')}}" alt="">
                                        <span class="vid-time">8:16</span>
                                        <span class="watch_later">
                                            <i class="icon-watch_later_fill"></i>
                                        </span>
                                    </a>
                                </div><!--vid_thumbnail end-->
                                <div class="video_info">
                                    <h3><a href="#" title="">Avengers: Infinity War - Gym Workout motivation 2019</a></h3>
                                    <h4><a href="#" title="">RealLifeLore</a> <span class="verify_ic"><i class="icon-tick"></i></span></h4>
                                    <span>144K views .<small class="posted_dt">6 days ago</small></span>
                                </div>
                            </div><!--videoo end-->
                        </div>
                        <div class="col-lg-3 col-md-6 col-sm-6 col-6 full_wdth">
                            <div class="videoo">
                                <div class="vid_thumbainl">
                                    <a href="#" title="">
                                        <img src="{{asset('assets/images/resources/vide20.png')}}" alt="">
                                        <span class="vid-time">29:32</span>
                                        <span class="watch_later">
                                            <i class="icon-watch_later_fill"></i>
                                        </span>
                                    </a>
                                </div><!--vid_thumbnail end-->
                                <div class="video_info">
                                    <h3><a href="#" title="">How the Universe Works - The Milky Way Galaxy - Space</a></h3>
                                    <h4><a href="#" title="">Loskes</a></h4>
                                    <span>408K views .<small class="posted_dt">19 hours ago</small></span>
                                </div>
                            </div><!--videoo end-->
                        </div>
                    </div>
                </div><!--vidz_list end-->
            </div><!--vidz_videos end-->
        </div>
    </div><!--vidz-row end-->
    <div class="vidz-row">
        <div class="container">
            <div class="vidz_sec">
                <h3>Popular Videos</h3>
                <div class="vidz_list">
                    <div class="row">
                        <div class="col-lg-3 col-md-6 col-sm-6 col-6 full_wdth">
                            <div class="videoo">
                                <div class="vid_thumbainl">
                                    <a href="#" title="">
                                        <img src="{{asset('assets/images/resources/vide1.png')}}" alt="">
                                        <span class="vid-time">10:21</span>
                                        <span class="watch_later">
                                            <i class="icon-watch_later_fill"></i>
                                        </span>
                                    </a>
                                </div><!--vid_thumbnail end-->
                                <div class="video_info">
                                    <h3><a href="#" title="">Kingdom Come: Deliverance Funny Moments and Fails</a></h3>
                                    <h4><a href="#" title="">newfox media</a> <span class="verify_ic"><i class="icon-tick"></i></span></h4>
                                    <span>686K views .<small class="posted_dt">1 week ago</small></span>
                                </div>
                            </div><!--videoo end-->
                        </div>
                        <div class="col-lg-3 col-md-6 col-sm-6 col-6 full_wdth">
                            <div class="videoo">
                                <div class="vid_thumbainl">
                                    <a href="#" title="">
                                        <img src="{{asset('assets/images/resources/vide2.png')}}" alt="">
                                        <span class="vid-time">13:49</span>
                                        <span class="watch_later">
                                            <i class="icon-watch_later_fill"></i>
                                        </span>
                                    </a>
                                </div><!--vid_thumbnail end-->
                                <div class="video_info">
                                    <h3><a href="#" title="">DR DISRESPECT - Before They Were Famous - Twitch Streamer</a></h3>
                                    <h4><a href="#" title="">Eros Now</a> </h4>
                                    <span>283K views .<small class="posted_dt">3 months ago</small></span>
                                </div>
                            </div><!--videoo end-->
                        </div>
                        <div class="col-lg-3 col-md-6 col-sm-6 col-6 full_wdth">
                            <div class="videoo">
                                <div class="vid_thumbainl">
                                    <a href="#" title="">
                                        <img src="{{asset('assets/images/resources/vide3.png')}}" alt="">
                                        <span class="vid-time">2:54</span>
                                        <span class="watch_later">
                                            <i class="icon-watch_later_fill"></i>
                                        </span>
                                    </a>
                                </div><!--vid_thumbnail end-->
                                <div class="video_info">
                                    <h3><a href="#" title="">Top Perectly Timed Twitch Moments 2017 #7</a></h3>
                                    <h4><a href="#" title="">Animal Planet</a> <span class="verify_ic"><i class="icon-tick"></i></span></h4>
                                    <span>2.6M views .<small class="posted_dt">2 months ago</small></span>
                                </div>
                            </div><!--videoo end-->
                        </div>
                        <div class="col-lg-3 col-md-6 col-sm-6 col-6 full_wdth">
                            <div class="videoo">
                                <div class="vid_thumbainl">
                                    <a href="#" title="">
                                        <img src="{{asset('assets/images/resources/vide4.png')}}" alt="">
                                        <span class="vid-time">5:25</span>
                                        <span class="watch_later">
                                            <i class="icon-watch_later_fill"></i>
                                        </span>
                                    </a>
                                </div><!--vid_thumbnail end-->
                                <div class="video_info">
                                    <h3><a href="#" title="">Top 5 Amazing Bridge Block ever in PUBG</a></h3>
                                    <h4><a href="#" title="">Maketzi</a> </h4>
                                    <span>612K views .<small class="posted_dt">5 months ago</small></span>
                                </div>
                            </div><!--videoo end-->
                        </div>
                        <div class="col-lg-3 col-md-6 col-sm-6 col-6 full_wdth">
                            <div class="videoo">
                                <div class="vid_thumbainl">
                                    <a href="#" title="">
                                        <img src="{{asset('assets/images/resources/vide5.png')}}" alt="">
                                        <span class="vid-time">4:01</span>
                                        <span class="watch_later">
                                            <i class="icon-watch_later_fill"></i>
                                        </span>
                                    </a>
                                </div><!--vid_thumbnail end-->
                                <div class="video_info">
                                    <h3><a href="#" title="">Trailer Park Boys Season 12 - Official Trailer</a></h3>
                                    <h4><a href="#" title="">ScereBro</a> </h4>
                                    <span>45K views .<small class="posted_dt">3 days ago</small></span>
                                </div>
                            </div><!--videoo end-->
                        </div>
                        <div class="col-lg-3 col-md-6 col-sm-6 col-6 full_wdth">
                            <div class="videoo">
                                <div class="vid_thumbainl">
                                    <a href="#" title="">
                                        <img src="{{asset('assets/images/resources/vide6.png')}}" alt="">
                                        <span class="vid-time">6:20</span>
                                        <span class="watch_later">
                                            <i class="icon-watch_later_fill"></i>
                                        </span>
                                    </a>
                                </div><!--vid_thumbnail end-->
                                <div class="video_info">
                                    <h3><a href="#" title="">A day in the life of a Google software engineer</a></h3>
                                    <h4><a href="#" title="">MathChief</a> </h4>
                                    <span>86K views .<small class="posted_dt">6 days ago</small></span>
                                </div>
                            </div><!--videoo end-->
                        </div>
                        <div class="col-lg-3 col-md-6 col-sm-6 col-6 full_wdth">
                            <div class="videoo">
                                <div class="vid_thumbainl">
                                    <a href="#" title="">
                                        <img src="{{asset('assets/images/resources/vide7.png')}}" alt="">
                                        <span class="vid-time">8:16</span>
                                        <span class="watch_later">
                                            <i class="icon-watch_later_fill"></i>
                                        </span>
                                    </a>
                                </div><!--vid_thumbnail end-->
                                <div class="video_info">
                                    <h3><a href="#" title="">Avengers: Infinity War - Gym Workout motivation 2019</a></h3>
                                    <h4><a href="#" title="">RealLifeLore</a> <span class="verify_ic"><i class="icon-tick"></i></span></h4>
                                    <span>144K views .<small class="posted_dt">6 days ago</small></span>
                                </div>
                            </div><!--videoo end-->
                        </div>
                        <div class="col-lg-3 col-md-6 col-sm-6 col-6 full_wdth">
                            <div class="videoo">
                                <div class="vid_thumbainl">
                                    <a href="#" title="">
                                        <img src="{{asset('assets/images/resources/vide8.png')}}" alt="">
                                        <span class="vid-time">29:32</span>
                                        <span class="watch_later">
                                            <i class="icon-watch_later_fill"></i>
                                        </span>
                                    </a>
                                </div><!--vid_thumbnail end-->
                                <div class="video_info">
                                    <h3><a href="#" title="">How the Universe Works - The Milky Way Galaxy - Space</a></h3>
                                    <h4><a href="#" title="">Loskes</a></h4>
                                    <span>408K views .<small class="posted_dt">19 hours ago</small></span>
                                </div>
                            </div><!--videoo end-->
                        </div>
                    </div>
                </div><!--vidz_list end-->
            </div><!--vidz_videos end-->
        </div>
    </div><!--vidz-row end-->
</section><!--vds-main end-->

@endsection
