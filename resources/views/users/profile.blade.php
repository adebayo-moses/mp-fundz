@extends('layouts.app')
@section('title')
    <title>My Profile | MP Fundz</title>
@endsection
@section('main')

@include('includes.side_menu')

<section class="user-account">
    <div class="container">
        @if(session()->has('success'))
            <div class="alert alert-success" role="alert">
                {{ session()->get('success') }}
            </div>
        @endif
        <div class="row">
            <div class="col-lg-3">
                <div class="sidebar">
                    <div class="widget video_info pr sp">
                        <span class="vc_hd">
                            <img src="{{asset('assets/images/resources/user-img.png')}}" alt="">
                        </span>
                        <h4>{{Auth::user()->first_name . ' ' . Auth::user()->last_name}}</h4>
                        <p>since: {{Auth::user()->created_at->format('F d, Y')}} </p>
                        <span>Last Login: {{\Carbon\Carbon::parse(Auth::user()->last_login_at)->diffForHumans() }}</span>
                    </div><!--video_info pr-->
                    <div class="widget account">
                        <h2 class="hd-uc"> <i class="icon-user"></i> Account</h2>
                        <ul>
                            <li><a href="#">My Account</a></li>
                            <li><a href="#"> Change Password</a></li>
                        </ul>
                    </div><!--account end-->
                    {{-- <div class="widget chanel-pro">
                        <h2 class="hd-uc"><i class="icon-preferences"></i>Channel and Profile  </h2>
                            <ul>
                            <li><a href="#"> Profile Settings </a></li>
                            <li><a href="#"> Change Avatar</a></li>
                        </ul>
                    </div><!--chanel-pro end--> --}}
                    <div class="widget vid-ac">
                        <h2 class="hd-uc"><i class="icon-play"></i>Videos </h2>
                            <ul>
                            <li><a href="{{route('user.videos')}}">My Videos</a></li>
                        </ul>
                    </div><!--vid-ac end-->
                </div><!--sidebar end-->
            </div>
            <div class="col-lg-9">
                <div class="video-details">
                    <div class="latest_vidz">
                        <div class="latest-vid-option">
                            <h2 class="hd-op"> Latest Videos</h2>
                            <div class="clearfix"></div>
                        </div><!--latest-vid-option end-->
                        <div class="vidz_list">
                            <div class="tb-pr">
                                @foreach ($latest_videos as $video)
                                    <div class="row">
                                        <div class="col-xl-8 col-lg-9 col-md-9 col-sm-12">
                                            <div class="tab-history acct_page mb-2">
                                                <div class="videoo">
                                                    <div class="vid_thumbainl ms br">
                                                        <a href="{{route('videos.show', ['video' => $video->id])}}" title="Video detail">
                                                            <img src="https://img.youtube.com/vi/{{$video->video_id}}/hqdefault.jpg" alt="">
                                                            <span class="vid-time">30:32</span>
                                                            <span class="watch_later">
                                                                <i class="icon-watch_later_fill"></i>
                                                            </span>
                                                        </a>
                                                    </div><!--vid_thumbnail end-->
                                                    <div class="video_info ms br">
                                                        <h3><a href="{{route('videos.show', ['video' => $video->id])}}" title="">{{$video->title}}</a></h3>
                                                        <h4><a href="#" title="">By: {{$video->user->username}}</a></h4>
                                                        <span>283K views . {{\Carbon\Carbon::parse($video->created_at)->diffForHumans()}}</span>
                                                        <ul>
                                                            {{-- <li><span class="br-1">Inactive</span></li> --}}
                                                            <li><span class="br-2">Active</span></li>
                                                        </ul>
                                                    </div>
                                                    <div class="clearfix"></div>
                                                </div><!--videoo end-->
                                            </div>
                                        </div>
                                        <div class="col-xl-4 col-lg-3 col-md-3 col-sm-12">
                                            <div class="icon-list mb-2">
                                                <ul>
                                                    <li><a href="#" title=""><i class="icon-play"></i></a></li>
                                                    <li><a href="#" title=""><i class="icon-pencil"></i></a></li>
                                                    <li><a href="#" title=""><i class="icon-cancel"></i></a></li>
                                                </ul>
                                            </div><!--icon-list end-->
                                        </div>
                                    </div>
                                @endforeach
                            </div><!--tb-pr end-->
                        </div><!--vidz_list end-->
                    </div><!--latest_vidz end-->
                    <div class="change-pswd">
                        <h2 class="hd-op">Change password</h2>
                        <form method="POST" action="{{ route('password.change') }}">
                            @csrf

                            <div class="ch-pswd">
                                <input type="password" name="current_password" placeholder="Current Password">
                            </div><!--ch-pswd end-->
                            <div class="ch-pswd">
                                <input type="password" name="new_password" placeholder=" New Password">
                            </div><!--ch-pswd end-->
                            <div class="ch-pswd">
                                <input type="password" name="new_confirm_password" placeholder="Confirm New Password">
                            </div><!--ch-pswd end-->
                            <div class="ch-pswd">
                                <button type="submit"> Update</button>
                            </div><!--ch-pswd end-->
                        </form>
                    </div><!--change-pswd end-->
                    {{-- <div class="latest_vidz">
                        <div class="latest-vid-option">
                            <h2 class="hd-op"> Account Details</h2>
                            <div class="clearfix"></div>
                        </div><!--latest-vid-option end-->
                        <div class="vidz_list">
                            <div class="tb-pr">
                                <div class="row">
                                    <div class="col-xl-8 col-lg-9 col-md-9 col-sm-12">
                                        <div class="tab-history acct_page">
                                            <div class="videoo">
                                                <div class="video_info ms br">
                                                    <h3><a href="#" title="">Bank Name</a></h3>
                                                    <h4><a href="#" title="">Bankt Name</a></h4>
                                                    <span>Account Number</span>
                                                </div>
                                                <div class="clearfix"></div>
                                            </div><!--videoo end-->
                                        </div>
                                    </div>
                                    <div class="col-xl-4 col-lg-3 col-md-3 col-sm-12">
                                        <div class="icon-list">
                                            <ul>
                                                <li><a href="#" title=""><i class="icon-play"></i></a></li>
                                                <li><a href="#" title=""><i class="icon-pencil"></i></a></li>
                                                <li><a href="#" title=""><i class="icon-cancel"></i></a></li>
                                            </ul>
                                        </div><!--icon-list end-->
                                    </div>
                                </div>
                            </div><!--tb-pr end-->
                        </div><!--vidz_list end-->
                    </div><!--latest_vidz end--> --}}
                    {{-- <div class="blocked-pr mange_sub">
                        <div class="manage-sub">
                            <h2 class="hd-op"> Withdrawal Requests </h2>
                            <div class="clearfix"></div>
                        </div><!--Manage-Sub end-->
                        <div class="blckd_list">
                            <div class="blocked-vcp">
                                <div class="vcp_inf">
                                <div class="vc_info st">
                                    <h4><a href="#" title="">ScereBro</a></h4>
                                    <span>Subscribed 3 months ago</span>
                                </div>
                                </div><!--vcp_inf end-->
                                <span class="active-mb pr"> Active</span>
                                <a href="" title="" class="play_ms">
                                    Action
                                    <i class="icon-arrow_below"></i>
                                </a>
                                <div class="clearfix"></div>
                            </div><!--blocked-vcp-->
                            <div class="blocked-vcp">
                                <div class="vcp_inf">
                                <div class="vc_info st">
                                    <h4><a href="#" title="">Doge</a></h4>
                                    <span>Subscribed 16 months ago</span>
                                </div>
                                </div><!--vcp_inf end-->
                                <a href="#" title="" class="play_ms">
                                    Action
                                    <i class="icon-arrow_below"></i>
                                </a>
                                <span class="active-mb sr"> Inactive</span>
                                <div class="clearfix"></div>
                            </div><!--blocked-vcp-->
                            <div class="blocked-vcp">
                                <div class="vcp_inf">
                                <div class="vc_info st">
                                    <h4><a href="#" title="">Menji</a></h4>
                                    <span>Subscribed 2 years ago</span>
                                </div>
                                </div><!--vcp_inf end-->
                                <a href="#" title="" class="play_ms">
                                    Action
                                    <i class="icon-arrow_below"></i>
                                </a>
                                <span class="active-mb mr">  Paused</span>
                                <div class="clearfix"></div>
                            </div><!--blocked-vcp-->
                        </div>
                    </div><!--blocked-pr end--> --}}
                </div><!--video-details end-->
            </div>
        </div>
    </div>
</section><!--user-account end-->

@endsection
