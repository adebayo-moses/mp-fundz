@extends('layouts.app')

@section('title')
    <title>Login | MP Fundz </title>
@endsection

@section('main')

    @include('includes.side_menu')

    <section class="form_popup">

		<div class="signup_form" id="signup_form">
		 	<div class="hd-lg">
		 		{{-- <img src="{{asset('assets/images/logo.png')}}" alt="MP Fundz logo"> --}}
		 		<span>Log into your Mpfundz account</span>
		 	</div><!--hd-lg end-->
			<div class="user-account-pr">
				<form method="POST" action="{{ route('login') }}">
                    @csrf

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
					<div class="chekbox-lg">
						<label>
							<input type="checkbox" name="remember" value="rem" id="remember" {{ old('remember') ? 'checked' : '' }}>
							<b class="checkmark"> </b>
							<span>Remember me</span>
						</label>
					</div>
					<div class="input-sec mb-0">
						<button type="submit">Login</button>
					</div><!--input-sec end-->
				</form>
                <a href="{{route('password.request')}}" title="" class="fg_btn">Forgot password?</a>
			</div><!--user-account end--->
            <div class="fr-ps">
				<h1>Don’t have an account? <a href="{{route('register')}}" class="show_signup">Signup here.</a></h1>
			</div><!--fr-ps end-->
		</div><!--login end--->

	</section><!--form_popup end-->


@endsection
