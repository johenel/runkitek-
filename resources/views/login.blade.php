@extends('layouts.default')
@section('content')
<section id="loginPage" class="register-account">
	<div class="event-cover">
		<img src="/media/runkitek-poster-final.jpg">
	</div>
	<div class="event-form">
		<div class="event-box">
			@if($errors->any())
				<div class="alert alert-danger" role="alert">
                    @foreach($errors->all() as $error)
                        <p>{{$error}}</p>
                    @endforeach
                </div>
			@endif
			<form action="/signin" method="post">
				@csrf
				<div class="event-header" style="margin-bottom: 20px;">
					<h1 class="title">Sign In</h1>
					<h3 class="subtitle">Access your account for Runkitek</h3>
				</div>
				<div class="form-group form-row row">
					<div class="col-12">
						<div class="rs-element rs-input rs-input--icon -full">
							<label for="inputUsername" class="rs-element rs-form-label">E-mail Address</label>
							<div class="rs-input-wrap">
								@if(session()->has('email'))
								<input name="email" type="email" class="rs-element form-control" value="{{session()->get('email')}}" style="padding-left: 30px;" required>
								@else
								<input name="email" type="email" class="rs-element form-control" value="" style="padding-left: 30px;" required>
								@endif
								<span class="rs-input__icon">
									<svg fill="currentColor" preserveAspectRatio="xMidYMid meet" height="14" width="14" viewBox="0 0 40 40" class="rs-icon" style="vertical-align: middle;">
										<g>
											<path d="m35.9 31.4q0 2.6-1.6 4.2t-4.3 1.5h-19.5q-2.7 0-4.4-1.5t-1.6-4.2q0-1.2 0.1-2.3t0.3-2.5 0.6-2.4 0.9-2.2 1.4-1.8 1.9-1.2 2.5-0.4q0.2 0 1 0.5t1.6 1 2.4 1.1 3 0.5 3-0.5 2.4-1.1 1.7-1 0.9-0.5q1.4 0 2.5 0.4t1.9 1.2 1.4 1.8 0.9 2.2 0.6 2.4 0.4 2.5 0 2.3z m-7.1-20q0 3.6-2.5 6.1t-6.1 2.5-6-2.5-2.6-6.1 2.6-6 6-2.5 6.1 2.5 2.5 6z">
												
											</path>
										</g>
									</svg>
								</span>
							</div>
						</div>
					</div>
				</div>
				<div class="form-group form-row">
					<div class="col-12">
						<div class="rs-element rs-input rs-input--icon -full">
							<label for="inputPassword" class="rs-element rs-form-label">Password</label>
							<div class="rs-input-wrap">
								<input name="password" id="inputPassword" type="password" class="rs-element form-control" value="" style="padding-left: 30px;" required>
								<span class="rs-input__icon">
									<svg fill="currentColor" preserveAspectRatio="xMidYMid meet" height="14" width="14" viewBox="0 0 40 40" class="rs-icon" style="vertical-align: middle;">
										<g>
											<path d="m14.1 17.1h11.5v-4.2q0-2.4-1.7-4.1t-4-1.7-4.1 1.7-1.7 4.1v4.2z m18.6 2.2v12.8q0 0.9-0.6 1.6t-1.5 0.6h-21.5q-0.8 0-1.5-0.6t-0.6-1.6v-12.8q0-0.9 0.6-1.5t1.5-0.7h0.8v-4.2q0-4.1 2.9-7.1t7.1-2.9 7 2.9 3 7.1v4.2h0.7q0.9 0 1.5 0.7t0.6 1.5z">
												
											</path>
										</g>
									</svg>
								</span>
							</div>
						</div>
					</div>
				</div>
				<div class="form-group form-row">
					<div class="col-12 text-center">
						<button type="submit" class="form-control rs-element rs-button rs-button--large rs-button--value -full" style=>
							<div class="rs-button__helper"></div>
							<span class="rs-button__value">Login</span>
						</button>
						<span class="form-misc-action">Don't have an account? 
							<a class="form-link" href="/register">Sign Up</a>
						</span>
					</div>
				</div>
			</form>
		</div>
	</div>
</section>
@endsection