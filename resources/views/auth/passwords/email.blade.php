@extends('layouts.app')

@section('title')
    <title>Email Password Link | MP Fundz </title>
@endsection

@section('main')

    @include('includes.side_menu')

    <section class="form_popup">

		<div class="signup_form" id="signup_form">
		 	<div class="hd-lg">
                @if (session('status'))
                    <div class="alert alert-success" role="alert">
                        {{ session('status') }}
                    </div>
                @endif
		 		<span>Reset Your Mpfundz Account's Password</span>
		 	</div><!--hd-lg end-->
			<div class="user-account-pr">
				<form method="POST" action="{{ route('password.email') }}">
                    @csrf

					<div class="input-sec">
						<input id="email" type="email" placeholder="E-Mail Address" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email">

                        @error('email')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
					<div class="input-sec mb-0">
						<button type="submit">{{ __('Send Password Reset Link') }}</button>
					</div><!--input-sec end-->
				</form>
			</div><!--user-account end--->
		</div><!--login end--->

	</section><!--form_popup end-->


@endsection
