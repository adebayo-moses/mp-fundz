@extends('layouts.app')
@section('scripts')
    <script type="text/javascript">
        document.getElementById("copy-link").addEventListener("click", function(event){
            event.preventDefault();

            /* Get the text field */
            var copyText = document.getElementById("myInput");

            /* Select the text field */
            copyText.select();
            copyText.setSelectionRange(0, 99999); /* For mobile devices */

            /* Copy the text inside the text field */
            document.execCommand("copy");

            /* Alert the copied text */
            document.getElementById('copy-link').innerHTML = 'Copied';
        });
    </script>
@endsection
@section('title')
    <title>Refferal | MP Fundz</title>
@endsection
@section('main')

@include('includes.side_menu')

<section class="upload-videooz">
    <div class="container">
        <div class="row">
            <div class="col-lg-6">
                <div class="video-file">
                    <i class="icon-graphics_03"></i>
                    <div class="sgst_content mt-4">
                        <h3 class="mb-2">Instructions for the refferal program</h3>
                        <p>Invite your friends using your special affiliate URL and receive 10% of their earnings for life.  Just send them this link or share it on Facebook, Twitter or any other way, without spamming!</p>
                    </div>
                </div><!--video-file end-->
            </div>
            <div class="col-lg-6">
                <div class="youtube-dwn">
                    <i class="icon-graphics_05"></i>
                    <h3>Your referral link is shown below </h3>
                    <span>Copy your refferal link and send to your friends.</span>
                    <form>
                        <input type="text" id="myInput" value="{{ Auth::user()->referral_link }}">
                        <button id="copy-link">Copy Link</button>
                    </form>

                    <div class="mt-4 mb-2">Total Refferals: <span class="ml-4">{{Auth::user()->referrals->count()}}</span></div>
                    <div>Total Revenue: <span class="ml-4">{{Auth::user()->refferal_revenue}}</span></div>
                </div><!--youtube-dwn end-->
            </div>
        </div>
    </div>
</section><!--upload-videooz end-->

@endsection
