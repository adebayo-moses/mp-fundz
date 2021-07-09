@extends('layouts.app')

@section('css')
    <link rel="stylesheet" type="text/css" href="{{asset('assets/css/lunar.css')}}">
@endsection

@section('scripts')
<script src="{{asset('assets/js/lunar.js')}}"></script>

<script type="text/javascript">
    $(document).ready(function(){
        $('#demoModal').modal('show');
    });
</script>

@endsection

@section('contest')
<div class="btm_bar">
    <div class="container pl-0" style="max-width: 1170px;">
        <div class="btm_bar_content">
            <ul class="shr_links">
                <li>
                    <h2>Make &#8358;20, 000.00 instantly by watching videos </h2>
                </li>
                <li>
                    <a href="{{ route('join_contest') }}">
                        Join Now
                    </a>
                </li>
            </ul><!--shr_links end-->
            <ul class="vid_thums">
                <li>
                    <a class="active" href="#" title=""><i class="icon-grid"></i></a>
                </li>
                <li>
                    <a href="#" title="">
                        <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px"
                             viewBox="0 0 108 108" xml:space="preserve">
                            <rect width="63" height="45"/>
                            <rect x="81" width="27" height="45"/>
                            <rect x="45" y="63" width="63" height="45"/>
                            <rect y="63" width="27" height="45"/>
                        </svg>
                    </a>
                </li>
            </ul><!--vid_status end-->
            <div class="clearfix"></div>
        </div><!--btm_bar_content end-->
    </div>
</div><!--btm_bar end-->
@endsection

@section('main')
    @include('includes.side_menu')

    <section class="vds-main">
        <div class="vidz-row">
            <div class="container">
                <div class="vidz_sec pt-0 pt-md-5">
                    @include('includes.adsense2')
                    <h3 class="mt-3">All Videos</h3>
                    @if (session('success'))
                        <div class="alert alert-success" role="alert">
                            {{ session('success') }}
                        </div>
                    @endif
                    @if (session('error'))
                        <div class="alert alert-danger" role="alert">
                            {{ session('error') }}
                        </div>
                    @endif
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
                                                <span class="vid-time">{{$video->point}} Coins</span>
                                                <span class="watch_later" style="color: orangered;">{{$video->check_history ? 'Watched' : ''}}</span>
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

                <!-- Modal -->
                <div class="modal fade"   id="demoModal"  tabindex="-1" role="dialog" aria-labelledby="demoModal" aria-hidden="true">
                    <div class="modal-dialog  modal-dialog-centered" role="document">
                        <div class="modal-content">
                            <button type="button" class="close light" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                            <div class=" py-5 text-center rounded-top" style="background-color: #d7d7da;    background-image: url(assets/img/poly.svg);
                                background-size: 10px;
                                background-repeat: repeat-x;
                                background-position: 0 100.1%;">
                                <img src="{{asset('assets/images/onboard.svg')}}" alt="">
                            </div>
                            <div class="modal-body">
                                <div class="text-center">
                                    <h1 class="pt-3">Welcome Back, {{Auth::user()->first_name}}</h1>
                                    <p class="my-2">
                                        Do you know you can instantly make <b style="font-weight: bold;">N20, 000.00</b> by watching videos in the ongoing contest? The more videos you watch, the better your chances of winning. We have 3 sessions, the first session is between 09am and 01am, second session is between 02pm and 06pm, and the last session is between 07pm and 11pm.
                                        What are you still waiting for ? Kindly click on 'Get Started' below and take advantage of this fantastic opportunity!
                                    </p>
                                    <a href="{{route('join_contest')}}" class="btn btn-default">Get Started</a>

                                </div>
                            </div>

                        </div>
                    </div>
                </div>
                <!-- Modal Ends -->
            </div>
        </div><!--vidz-row end-->
    </section><!--vds-main end-->

    <section class="more_items_sec">
		<div class="container">
            <div class="row">
                <div class="col-12 col-md-6">

                    {{ $videos->links() }}
                </div>
            </div>
		</div>
	</section><!--more_items_sec end-->

@endsection
