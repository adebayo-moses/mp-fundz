@extends('layouts.app')

@section('title')
    <title>Show Video | MP Fundz</title>
@endsection

@section('css')
@endsection

@section('scripts')
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@9"></script>
@include('includes.youtube_script')
@endsection

@section('main')

@include('includes.side_menu')


<section class="mn-sec">
    <div class="container">
        <div class="row">
            <div class="col-lg-9 mx-lg-auto">
                <div class="mn-vid-sc single_video">
                    @if ($video->check_history)
                        <h3 class="mb-4" style="color: red;">You've watched this video, and you won't be rewarded anymore! <span style="color: black;"><a href="{{route('home')}}">Make More Money</a></span></h3>
                    @else
                    <h3 id="countdown" class="mb-4">Must play this video for <b><span id="played">0</span>/{{$video->exposure}} seconds to earn {{$video->point}} points</b></h3>
                    @endif
                    <div class="vid-1">
                        {{-- <div class="spinner"></div> --}}
                        <div class="vid-pr">
                            <div id="player"  video_id="{{$video->video_id}}" exposure={{$video->exposure}} video="{{$video->id}}" watched={{$video->check_history}}></div>
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
