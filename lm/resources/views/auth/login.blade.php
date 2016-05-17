@extends('layouts.guest')
@section('rightLink')
			<span id="extr-page-header-space"> <span class="hidden-mobile hiddex-xs">Need an account?</span> <a href="{{ url('/register') }}" class="btn btn-danger">Create account</a> </span>
@endsection
<!-- Main Content -->
@section('content')						

						<div class="well no-padding">
							<form method="POST" action="{{ url('/login') }}" class="smart-form client-form">
								{!! csrf_field() !!}
								<header>
									Sign In
								</header>

								<fieldset>
									
									<section>
										<label class="label">E-mail</label>
										<label class="input"> <i class="icon-append fa fa-user"></i>
											<input type="email" class="form-control" name="email" value="{{ old('email') }}">
											<b class="tooltip tooltip-top-right"><i class="fa fa-user txt-color-teal"></i> Please enter email address/username</b></label>
										@if ($errors->has('email'))
		                                    <span class="help-block" style="color: red;">
		                                        <strong>{{ $errors->first('email') }}</strong>
		                                    </span>
		                                @endif
									</section>

									<section>
										<label class="label">Password</label>
										<label class="input"> <i class="icon-append fa fa-lock"></i>
											<input type="password" class="form-control" name="password">
											<b class="tooltip tooltip-top-right"><i class="fa fa-lock txt-color-teal"></i> Enter your password</b> </label>
										
		                                @if ($errors->has('password'))
		                                    <span class="help-block">
		                                        <strong>{{ $errors->first('password') }}</strong>
		                                    </span>
		                                @endif										
									</section>

									<section>
										<label class="checkbox">
											<input type="checkbox" name="remember" checked="">
											<i></i>Stay signed in</label>
									</section>
									<div class="note">
											 <a class="btn btn-link" href="{{ url('/password/reset') }}">Forgot Your Password?</a>
										</div>
								</fieldset>
								<footer>
									<button type="submit" class="btn btn-primary">
										Sign in
									</button>

								</footer>
							</form>

						</div>
@endsection