@extends('layouts.app')

@section('title')
    <title>Register | MP Fundz </title>
@endsection

@section('main')

    @include('includes.side_menu')

    <section class="form_popup">

		<div class="signup_form" id="signup_form">
		 	<div class="hd-lg">
		 		{{-- <img src="{{asset('assets/images/logo.png')}}" alt="MP Fundz logo"> --}}
		 		<span>Register your Mpfundz account</span>
		 	</div><!--hd-lg end-->
			<div class="user-account-pr">
				<form method="POST" action="{{ route('register') }}">
                    @csrf

					<div class="input-sec mgb25">
						<input id="first_name" type="text" placeholder="First Name" class="form-control @error('first_name') is-invalid @enderror" name="first_name" value="{{ old('first_name') }}" required autocomplete="first_name" autofocus>

                        @error('first_name')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
					</div>

					<div class="input-sec mgb25">
						<input id="last_name" type="text" placeholder="Last Name" class="form-control @error('last_name') is-invalid @enderror" name="last_name" value="{{ old('last_name') }}" required autocomplete="last_name" autofocus>

                        @error('last_name')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
					</div>

					<div class="input-sec">
						<input id="email" type="email" placeholder="E-Mail Address" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email">

                        @error('email')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>

                    <div class="input-sec mgb25">
						<input id="username" type="text" placeholder="Username" class="form-control @error('username') is-invalid @enderror" name="username" value="{{ old('username') }}" required autocomplete="username" autofocus>
						<label>Letters A-Z or a-z , Numbers 0-9 and Underscores _</label>

                        @error('username')
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
					{{-- <div class="input-sec flatpickr">
						<input type="number" name="date" class="flatpickr-input" placeholder="Select Date..." data-input>
					</div> --}}
					<div class="chekbox-lg">
						<ul>
							<li>
								<label>
									<input type="radio" name="gender" value="Male">
									<b class="checkmark"> </b>
									<span>Male</span>
								</label>
							</li>
							<li>
								<label>
									<input type="radio" name="gender" value="Female">
									<b class="checkmark"> </b>
									<span>Female</span>
								</label>
							</li>
						</ul>
					</div>
					<div class="input-sec mb-0">
						<button type="submit">Signup</button>
					</div><!--input-sec end-->
				</form>
				<div class="form-text">
					<p>By sIgning up you agree to MPFundz’ <a href="#" title="">Terms of Service</a> and <a href="#" title="">Privacy Policy</a> </p>
				</div>
			</div><!--user-account end--->
			<div class="fr-ps">
				<h1>Already have an account?<a href="{{route('login')}}" title="" class="show_signup">&nbsp;Login here.</a></h1>
			</div><!--fr-ps end-->
		</div><!--login end--->

	</section><!--form_popup end-->


@endsection
