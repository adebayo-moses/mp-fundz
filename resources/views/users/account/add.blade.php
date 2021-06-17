@extends('layouts.app')

@section('title')
    <title>Create Account | MP Fundz</title>
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
        <form method="POST" action="{{route('user.account.store')}}">
            @csrf

            <div class="vid-title">
                <h2 class="title-hd">Account Name </h2>
                <div class="form_field">
                    <input id="account_name" type="text" name="account_name" placeholder="Add account name here..." class="form-control @error('account_name') is-invalid @enderror" name="account_name" value="{{ old('account_name') }}" required>


                    @error('account_name')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
            </div><!--vid-title-->
            <div class="abt-tags">
                <div class="row">
                    <div class="col-lg-9 col-md-9 col-sm-8 col-12">
                        <h2 class="title-hd">Account Number </h2>
                        <div class="form_field pr">
                            <input id="account_number" type="text" name="account_number" placeholder="Account number" class="form-control @error('account_number') is-invalid @enderror" name="account_number" value="{{ old('account_number') }}" required>

                            @error('account_number')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-3 col-sm-4 col-12">
                        <div class="option">
                            <h2 class="title-hd">Bank Name </h2>
                            <div class="form_field">
                                <select id="bank_name" type="text" name="bank_name" class="form-control @error('bank_name') is-invalid @enderror" name="bank_name" value="{{ old('bank_name') }}" required>
                                    {{-- <option value="" disable="true" selected="true">Select Bank</option> --}}
                                    <option value="access">Access Bank</option>
                                    <option value="citibank">Citibank</option>
                                    <option value="diamond">Diamond Bank</option>
                                    <option value="ecobank">Ecobank</option>
                                    <option value="fidelity">Fidelity Bank</option>
                                    <option value="firstbank">First Bank</option>
                                    <option value="fcmb">First City Monument Bank (FCMB)</option>
                                    <option value="gtb">Guaranty Trust Bank (GTB)</option>
                                    <option value="heritage">Heritage Bank</option>
                                    <option value="keystone">Keystone Bank</option>
                                    <option value="polaris">Polaris Bank</option>
                                    <option value="providus">Providus Bank</option>
                                    <option value="stanbic">Stanbic IBTC Bank</option>
                                    <option value="standard">Standard Chartered Bank</option>
                                    <option value="sterling">Sterling Bank</option>
                                    <option value="suntrust">Suntrust Bank</option>
                                    <option value="union">Union Bank</option>
                                    <option value="uba">United Bank for Africa (UBA)</option>
                                    <option value="unity">Unity Bank</option>
                                    <option value="wema">Wema Bank</option>
                                    <option value="zenith">Zenith Bank</option>
                                </select>

                                @error('bank_name')
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

            <div class="category">
                    <div class="btn-sbmit">
                        <button type="submit">Add Account</button>
                    </div><!--btn-sbmit end-->
                </div><!--category-typ-->
            </div><!--Category-->
        </form>
    </div>
</section><!--vid-title-sec-->

@endsection
