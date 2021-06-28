<!DOCTYPE html>
<html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        @yield('title')

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
        <link rel="stylesheet" type="text/css" href="{{asset('assets/css/custom.css')}}">
        <link rel="stylesheet" type="text/css" href="{{asset('assets/css/responsive.css')}}">
        <link rel="stylesheet" type="text/css" href="{{asset('assets/css/color.css')}}">

        <script type="text/javascript">
            $('#tooltip').tooltip(options);
        </script>

        @yield('css')
    </head>


    <body>

        <div class="wrapper hp_1">
            @include('includes.header')


            @yield('main')


            @include('includes.footer')

        </div><!--wrapper end-->


        <script src="{{asset('assets/js/jquery.min.js')}}"></script>
        <script src="{{asset('assets/js/popper.js')}}"></script>
        <script src="{{asset('assets/js/bootstrap.min.js')}}"></script>
        <script src="{{asset('assets/js/flatpickr.js')}}"></script>
        <script src="{{asset('assets/js/script.js')}}"></script>

        @yield('scripts')

        <!--Start of Tawk.to Script-->
        <script type="text/javascript">
            var Tawk_API=Tawk_API||{}, Tawk_LoadStart=new Date();
                (function(){
                var s1=document.createElement("script"),s0=document.getElementsByTagName("script")[0];
                s1.async=true;
                s1.src='https://embed.tawk.to/60d715027f4b000ac039abb4/1f942k5f6';
                s1.charset='UTF-8';
                s1.setAttribute('crossorigin','*');
                s0.parentNode.insertBefore(s1,s0);
            })();
        </script>
        <!--End of Tawk.to Script-->

        {{-- Google Adsense --}}
        <script data-ad-client="ca-pub-4199733205009272" async src="https://pagead2.googlesyndication.com/pagead/js/adsbygoogle.js"></script>
    </body>


</html>

