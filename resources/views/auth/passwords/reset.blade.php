@extends('layouts.app')

@section('title')
    <title>Reset Password | MP Fundz </title>
@endsection

@section('main')

    @include('includes.side_menu')

    <section class="form_popup">

		<div class="signup_form" id="signup_form">
		 	<div class="hd-lg">
		 		{{-- <img src="{{asset('assets/images/logo.png')}}" alt="MP Fundz logo"> --}}
		 		<span>{{ __('Reset Password') }}</span>
		 	</div><!--hd-lg end-->
			<div class="user-account-pr">
				<form method="POST" action="{{ route('password.update') }}">
                    @csrf

                    <input type="hidden" name="token" value="{{ $token }}">

					<div class="input-sec">
						<input id="email" type="email" placeholder="E-Mail Address" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email">

                        @error('email')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>

					<div class="input-sec">
						<input id="password" type="password" placeholder="Password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">

                        @error('password')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
					<div class="input-sec">
						<input id="password-confirm" type="password" placeholder="Re-enter password" class="form-control" name="password_confirmation" required autocomplete="new-password">
					</div>
					<div class="input-sec mb-0">
						<button type="submit">{{ __('Reset Password') }}</button>
					</div><!--input-sec end-->
				</form>
			</div><!--user-account end--->
		</div><!--login end--->

	</section><!--form_popup end-->


@endsection
