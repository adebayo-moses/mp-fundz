@extends('layouts.app')

@section('main')
    @include('includes.side_menu')

    <section class="vds-main">
        <div class="vidz-row">
            <div class="container">
                <div class="vidz_sec">
                    @include('includes.adsense2')
                    <h3 class="mt-3">Contest Videos</h3>
                    @if (session('success'))
                        <div class="alert alert-success" role="alert">
                            {{ session('success') }}
                        </div>
                    @endif
                    <div class="vidz_list">
                        <div class="row">
                            @include('includes.adsense3')
                            @forelse ($contest_videos as $video)
                                <div class="col-lg-3 col-md-6 col-sm-6 col-6 full_wdth">
                                    <div class="videoo">
                                        <div class="vid_thumbainl">
                                            <a href="{{route('contest.show_video', ['id' => $video->id])}}" title="">
                                                <img src="https://img.youtube.com/vi/{{$video->video_id}}/hqdefault.jpg" alt="{{$video->title}}" />
                                                {{-- <span class="vid-point">Reward:</span>
                                                <span class="vid-time">{{$video->point}} Coins</span> --}}
                                                <span class="watch_later" style="color: orangered;">{{$video->check_entry_history ? 'Watched' : ''}}</span>
                                            </a>
                                        </div><!--vid_thumbnail end-->
                                        <div class="video_info">
                                            <h3><a href="#" title="">{{$video->title}}</a></h3>
                                            {{-- <h4><a href="#" title="">{{$video->user->username}}</a> <span class="verify_ic"><i class="icon-tick"></i></span></h4> --}}
                                            <span><a href="#" title="">By: Admin</a> <span class="verify_ic"><i class="icon-tick"></i></span>&nbsp; &nbsp; &nbsp; <small class="posted_dt">{{\Carbon\Carbon::parse($video->created_at)->diffForHumans()}}</small></span>
                                        </div>
                                    </div><!--videoo end-->
                                </div>
                            @empty
                            <div class="col-lg-3 col-md-6 col-sm-6 col-6 full_wdth">
                                <p>No video posted for this contest yet!</p>
                            </div>
                            @endforelse
                        </div>
                    </div><!--vidz_list end-->
                </div><!--vidz_videos end-->
            </div>
        </div><!--vidz-row end-->
    </section><!--vds-main end-->

    <section class="more_items_sec">
		<div class="container">
            <div class="row">
                <div class="col-12 col-md-6">

                    {{ $contest_videos->links() }}
                </div>
            </div>
		</div>
	</section><!--more_items_sec end-->

@endsection
