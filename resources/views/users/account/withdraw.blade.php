@extends('layouts.app')

@section('title')
    <title>Withdraw Money | MP Fundz</title>
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


<section class="suggestions">
    <div class="container">
        <div class="row col-12 col-lg-10 mx-lg-auto">

            <div class="sgst_content mt-5">
                <h3>Hello, {{Auth::user()->first_name . ' ' . Auth::user()->last_name}}</h3>
                <p>You currently have <span style="font-weight: bold;">{{Auth::user()->coin_balance}}</span> coins and <span style="font-weight: bold;">{{Auth::user()->refferal_revenue}}</span> refferal revenue. Please be aware that you will be able to place withdrawal directly to your bank account the moment you've earned up to <span style="font-weight: bold;">$20</span>. If you've not added your account, kindly <a href="{{route('user.account.add')}}"> Add Your Account</a> now.</p>
            </div>
        </div>
    </div>
</section><!--Suggestions end-->

@endsection
