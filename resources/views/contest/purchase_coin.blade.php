@extends('layouts.app')

@section('title')
    <title>Purchase Coin | MP Fundz</title>
@endsection

@section('css')
@endsection

@section('main')

<div class="page-content page-container" id="page-content">
    <div class="padding">
        <div class="text-center p-5">
            <h2 class="text-highlight">You don't have enough coins to join this contest!</h2>
        </div>
        <div class="row">
            <div class="col-12 col-md-8 mx-auto text-center">
                <div class="block d-inline-flex">
                    <div class="p-4 p-sm-5 b-r"> <sup class="text-sm" style="top: -0.5em">&#8358;</sup><span class="h1">250</span>
                        <div class="text-muted">contest fee</div>
                        <div class="py-4"><a href="#"
                            onclick="event.preventDefault();
                            document.getElementById('coin-form1').submit();" class="btn btn-sm btn-rounded btn-primary" style="background-color: #e06b20; border: none;" data-abc="true">Pay &#8358;250</a></div> <small class="text-muted">To Join Contest</small>
                    </div>
                    <form id="coin-form1" action="{{ route('pay') }}" method="POST" class="d-none">
                        @csrf
                        <input type="number" name="amount" value="250">
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
