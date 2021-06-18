@extends('layouts.app')

@section('title')
    <title>Home | MP Fundz </title>
@endsection

@section('main')

    @include('includes.side_menu')

    <section class="banner-section">
        <div class="container">
            <div class="banner-text">
                <h2>Watch, earn and upload unlimited content</h2>
                <a href="{{route('register')}}" title="">Create my account</a>
            </div><!--banner-text end-->
            {{-- <h3 class="headline">Video of the Day by <a href="#" title="">Admin</a></h3> --}}
        </div>
    </section><!--banner-section end-->

    <section class="services-sec">
        <div class="container">
            <div class="services-row">
                <div class="row">
                    <div class="col-lg-4 mx-lg-auto col-md-6 col-sm-6 col-12">
                        <div class="service-col">
                            <img src="{{asset('assets/images/sv1.png')}}" alt="">
                            <h3>Get paid watching videos</h3>
                            <p>Make money from the comfort of your home catching cruise with videos</p>
                        </div><!--service-col end-->
                    </div>
                    {{-- <div class="col-lg-3 col-md-6 col-sm-6 col-12">
                        <div class="service-col">
                            <img src="{{asset('assets/images/sv2.png')}}" alt="">
                            <h3>Grow your audience/business</h3>
                            <p>Upload your content and wait while our growing audience do the magic. </p>
                        </div><!--service-col end-->
                    </div>
                    <div class="col-lg-3 col-md-6 col-sm-6 col-12">
                        <div class="service-col">
                            <img src="{{asset('assets/images/sv3.png')}}" alt="">
                            <h3>Simple transfer from YouTube</h3>
                            <p>Upload your videos from YouTube with an easy link copy/paste.</p>
                        </div><!--service-col end-->
                    </div> --}}
                    <div class="col-lg-4 mx-lg-auto col-md-6 col-sm-6 col-12">
                        <div class="service-col">
                            <img src="{{asset('assets/images/sv4.png')}}" alt="">
                            <h3>Make money with Us </h3>
                            <p>Every video you watch gives you 7 points and 100 points equlas 1 dollar.</p>
                        </div><!--service-col end-->
                    </div>
                </div>
            </div><!--services-row end-->
        </div>
    </section><!--services-sec end-->

    <section class="vds-main">
        <div class="vidz-row">
            <div class="container">
                <div class="vidz_sec">
                    @include('includes.adsense2')
                    <h3>All Videos</h3>
                    <div class="vidz_list">
                        <div class="row">
                            @include('includes.adsense3')
                            @foreach ($videos as $video)
                                <div class="col-lg-3 col-md-6 col-sm-6 col-6 full_wdth">
                                    <div class="videoo">
                                        <div class="vid_thumbainl">
                                            <a href="{{route('videos.show', ['video' => $video->id])}}" title="">
                                                <img src="https://img.youtube.com/vi/{{$video->video_id}}/hqdefault.jpg" alt="{{$video->title}}" />
                                                <span class="vid-point">Reward:</span>
                                                <span class="vid-time">7 Coins</span>
                                                <span class="watch_later" style="color: orangered;">{{$video->check_history ? 'Watched' : ''}}</span>
                                                {{-- <span class="watch_later">
                                                    <i class="icon-watch_later_fill"></i>
                                                </span> --}}
                                            </a>
                                        </div><!--vid_thumbnail end-->
                                        <div class="video_info">
                                            <h3><a href="#" title="">{{$video->title}}</a></h3>
                                            {{-- <h4><a href="#" title="">{{$video->user->username}}</a> <span class="verify_ic"><i class="icon-tick"></i></span></h4> --}}
                                            <span><a href="#" title="">By: Admin</a> <span class="verify_ic"><i class="icon-tick"></i></span>&nbsp; &nbsp; &nbsp; <small class="posted_dt">{{\Carbon\Carbon::parse($video->created_at)->diffForHumans()}}</small></span>
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

    @guest
        <section class="more_items_sec text-center">
            <div class="container">
                <a href="{{route('register')}}" title="" class="btn-default">Join Now</a>
            </div>
        </section><!--more_items_sec end-->
    @endguest


@endsection
