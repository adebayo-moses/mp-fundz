@extends('layouts.app')

@section('title')
    <title>Add Video | MP Fundz</title>
@endsection

@section('css')
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
@endsection

@section('scripts')
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>

    <script>
        $(document).ready(function() {
            $('.js-example-basic-multiple').select2();
        });
    </script>
@endsection

@section('main')

@include('includes.side_menu')


<section class="vid-title-sec mt-5">
    <div class="container">
        <form method="POST" action="{{route('videos.store')}}">
            @csrf

            <div class="vid-title">
                <h2 class="title-hd">Video Title </h2>
                <div class="form_field">
                    <input id="title" type="text" name="title" placeholder="Add title here..." class="form-control @error('title') is-invalid @enderror" name="title" value="{{ old('title') }}" required>


                    @error('title')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
            </div><!--vid-title-->
            <div class="abt-tags">
                <div class="row">
                    <div class="col-lg-9 col-md-9 col-sm-8 col-12">
                        <h2 class="title-hd">Video Link </h2>
                        <div class="form_field pr">
                            <input id="url" type="text" name="url" placeholder="https://www.youtube.com/watch?v=5k4tqWQ2re8" class="form-control @error('url') is-invalid @enderror" name="url" value="{{ old('url') }}" required>

                            @error('url')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-3 col-sm-4 col-12">
                        <div class="option">
                            <h2 class="title-hd">Video Exposure </h2>
                            <div class="form_field">
                                <select id="exposure" type="text" name="exposure" class="form-control @error('exposure') is-invalid @enderror" name="exposure" value="{{ old('exposure') }}" required>
                                    {{-- <option value="" disable="true" selected="true">Select Video Exposure (in seconds)</option> --}}
                                    {{-- @foreach ($video_categories as $key => $value)
                                        <option value="{{ $value->id }}">
                                            {{ $value->name }}
                                        </option>
                                    @endforeach --}}

                                    <option value="10">
                                        10 Seconds
                                    </option>
                                    <option value="20">
                                        20 Seconds
                                    </option>
                                    <option value="30">
                                        30 Seconds
                                    </option>
                                    <option value="60">
                                        60 Seconds
                                    </option>
                                    <option value="90">
                                        90 Seconds
                                    </option>
                                    <option value="120">
                                       120 Seconds
                                    </option>
                                    <option value="150">
                                       150 Seconds
                                    </option>
                                    <option value="180">
                                       180 Seconds
                                    </option>
                                    <option value="300">
                                       300 Seconds
                                    </option>
                                    <option value="400">
                                       400 Seconds
                                    </option>
                                    <option value="500">
                                       500 Seconds
                                    </option>
                                    <option value="600">
                                       600 Seconds
                                    </option>
                                    <option value="700">
                                       700 Seconds
                                    </option>
                                    <option value="900">
                                       900 Seconds
                                    </option>
                                    <option value="1200">
                                       1200 Seconds
                                    </option>
                                </select>

                                @error('exposure')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                                <a href="#" title="" class="arw_vz">
                                    <svg width="24" height="26" viewBox="0 0 24 26" fill="none" xmlns="http://www.w3.org/2000/svg">
                                        <path fill-rule="evenodd" clip-rule="evenodd" d="M19.9394 7.51447L22.0607 9.63579L12 19.6964L1.93936 9.63579L4.06068 7.51447L12 15.4538L19.9394 7.51447Z" fill="#9494A0"></path>
                                    </svg>
                                </a>
                            </div>
                        </div><!--option end-->
                    </div>
                </div>
            </div><!--abt-tags--->

            <div class="abt-tags">
                <div class="row">
                    <div class="col-lg-4 col-md-4 col-12">
                        <h2 class="title-hd">Views </h2>
                        <div class="form_field pr">
                            <input id="views" type="text" name="views" placeholder="100000" class="form-control @error('views') is-invalid @enderror" name="views" value="{{ old('views') }}" required>

                            @error('views')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-4 col-12">
                        <div class="option">
                            <h2 class="title-hd">Receive Views From: </h2>
                            <div class="form_field">
                                <select id="receive_views_from" class="js-example-basic-multiple form-control @error('views') is-invalid @enderror" name="receive_views_from[]" value="{{ old('views') }}" required multiple="multiple">
                                    @foreach ($countries as $key => $value)
                                        <option value="{{ $value->id }}" {{$value->id == '240' ? 'selected' : ''}}>
                                            {{ $value->name }}
                                        </option>
                                    @endforeach
                                </select>

                                @error('receive_views_from')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                                {{-- <a href="#" title="" class="arw_vz">
                                    <svg width="24" height="26" viewBox="0 0 24 26" fill="none" xmlns="http://www.w3.org/2000/svg">
                                        <path fill-rule="evenodd" clip-rule="evenodd" d="M19.9394 7.51447L22.0607 9.63579L12 19.6964L1.93936 9.63579L4.06068 7.51447L12 15.4538L19.9394 7.51447Z" fill="#9494A0"></path>
                                    </svg>
                                </a> --}}
                            </div>
                        </div><!--option end-->
                    </div>

                    <div class="col-lg-4 col-md-4 col-12">
                        <h2 class="title-hd">Daily Visit Limit </h2>
                        <div class="form_field pr">
                            <input id="daily_limit" type="text" name="daily_limit" placeholder="1000" class="form-control @error('daily_limit') is-invalid @enderror" name="daily_limit" value="{{ old('daily_limit') }}" required>

                            @error('daily_limit')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>
                </div>
            </div><!--abt-tags--->
            <div class="category">
                    <div class="btn-sbmit">
                        <button type="submit">Submit Video</button>
                    </div><!--btn-sbmit end-->
                </div><!--category-typ-->
            </div><!--Category-->
        </form>
    </div>
</section><!--vid-title-sec-->

<section class="suggestions">
    <div class="container">
        <div class="sgst_content">
            <h3>Help & Suggestions</h3>
            <p>By submitting your videos to MP Fundz, you acknowledge that you agree to MP Fundz’s<a href="#" title=""> Terms of Service</a>and<a href="#" title="">Community Guidelines</a>. Please be sure not to violate others’ copyright or privacy rights.<a href="#"> Learn more</a></p>
        </div>
    </div>
</section><!--Suggestions end-->


<div class="abt-vidz">
    <ul>
        <li>
            <a href="#">Upload Instructions </a>
        </li>
        <li>
            <a href="#">Troubleshooting </a>
        </li>
        <li>
            <a href="#">Mobile Upload </a>
        </li>
    </ul>
</div><!--abt-vidz-->

@endsection
