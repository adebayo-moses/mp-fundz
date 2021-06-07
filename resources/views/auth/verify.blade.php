
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Verify Email | MP Fundz</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="" />
    <meta name="keywords" content="" />
    <link rel="icon" href="{{asset('assets/images/Favicon.png')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('assets/css/animate.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('assets/css/bootstrap.min.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('assets/css/flatpickr.min.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('assets/css/fontello.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('assets/css/fontello-codes.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('assets/css/thumbs-embedded.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('assets/css/style.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('assets/css/responsive.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('assets/css/color.css')}}">
</head>
<body>

<header>
    <div class="top_bar">
        <div class="container">
            <div class="top_header_content d-flex justify-content-between">
                <div class="menu_logo">
                    <a href="{{url('/')}}" title="" class="logo">
                        <img src="{{asset('assets/images/logo.png')}}" alt="MP Funds Logo">
                    </a>
                </div><!--menu_logo end-->

                <ul class="controls-lv">
                    <li><a href="{{url('/')}}" title="">Home</a></li>
                    <li><a href="#" title="">About us</a></li>
                    <li><a href="#" title="">How it works</a></li>
                    <li><a href="Single_Channel_Home.html" title="">Contact</a></li>
                    {{-- <li><a href="Single_Channel_Home.html" title="">FAQ</a></li> --}}
                    <li class="icon-menu-log d-flex d-sm-none mr-0">
                        <a href="#" title="" class="menu" style="font-size: 23px">
                            <i class="icon-menu"></i>
                        </a>
                    </li>
                    <li class="ml-5 d-none d-sm-inline-block">
                        <a href="{{route('login')}}" title="" class="btn-default btn-transparent">Login</a>
                    </li>
                    <li class="d-none d-sm-inline-block">
                        <a href="{{route('register')}}" title="" class="btn-default">Register</a>
                    </li>
                </ul><!--controls-lv end-->

            </div><!--top_header_content end-->
        </div>
    </div><!--header_content end-->
</header><!--header end-->

<div class="wrapper">

	{{-- <section class="banner-section p120">
		<div class="container">
			<div class="banner-text">
				<h2>Hi, {{Auth::user()->first_name}}</h2>
                <div class="row">
                    <div class="col-md-6 mx-auto">

                        <h6 class=" text-white">A fresh verification link has been sent to your email address. Before proceeding, please check your email for a verification link. If you did not receive the email,</h6>
                        <div class="banner-text">

                            <a href="#" title="">Create my account</a>
                        </div>
                    </div>
                </div>

			</div><!--banner-text end-->
		</div>
	</section><!--banner-section end--> --}}

    @include('includes.side_menu')

	<section class="form_popup">

		<div class="login_form" id="login_form">
		 	<div class="hd-lg">
                <h1 class="mb-4">Hi,  {{Auth::user()->first_name}}</h1>

                <h6 class="mb-3">A fresh verification link has been sent to your email address. Before proceeding, please check your email for a verification link. If you did not receive the email,</h6>


                <form method="POST" action="{{ route('verification.resend') }}">
                    @csrf
                    <button type="submit" class="btn-default" href="#">{{ __('click here to request another') }}</button>
                </form>
		 	</div><!--hd-lg end-->
		</div><!--login end--->

	</section><!--form_popup end-->


</div><!--wrapper end-->





<script src="{{asset('assets/js/jquery.min.js')}}"></script>
<script src="{{asset('assets/js/popper.js')}}"></script>
<script src="{{asset('assets/js/bootstrap.min.js')}}"></script>
<script src="{{asset('assets/js/flatpickr.js')}}"></script>
<script src="{{asset('assets/js/script.js')}}"></script>


</body>

</html>
