@extends('layouts.auth')
@section('title', 'Recover My Account')
@section('content')

<div class="login-header login-caret">
		
	<div class="login-content">
		
		<a href="{{ route('home') }}" class="logo">
			<img src="{{ Theme::url('images/membra@2x.png') }}" width="120" alt="" />
		</a>
		
		<p class="description">Continue to recover your account</p>
		
		<!-- progress bar indicator -->
		<div class="login-progressbar-indicator">
			<h3>43%</h3>
			<span>recovering account...</span>
		</div>
	</div>
	
</div>

<div class="login-progressbar">
	<div></div>
</div>

<div class="login-form">
	
	<div class="login-content">
		
		<div class="form-login-error">
			<h3>Recover Unsuccessful</h3>
			<p id="recover_msg">Oooops...</p>
		</div>
		
		<form method="post" role="form" id="form_recover_account">

			<div class="form-register-success">
				<i class="fa fa-check"></i>
				<h3>Your account has been recovered!</h3><br>
				<p>You can now login to your account.</p>
			</div>

			<input type="hidden" name="_token" id="_token" value="{{ csrf_token() }}">
			
			<div class="form-steps">
				<div class="step current" id="step-1">
		
					<div class="form-group">
						
						<div class="input-group">
							<div class="input-group-addon">
								<i class="fa fa-code"></i>
							</div>
							
							<input type="text" class="form-control" name="passwordtoken" id="passwordtoken" readonly="readonly" value="{{ $passwordtoken }}" autocomplete="off" disabled="disabled" />
						</div>
					
					</div>

					<div class="form-group">
						
						<div class="input-group">
							<div class="input-group-addon">
								<i class="fa fa-envelope"></i>
							</div>
							
							<input type="text" class="form-control" name="email" id="email" placeholder="E-mail" autocomplete="off" />
						</div>
					
					</div>

					<div class="form-group">
						<div class="input-group">
							<div class="input-group-addon">
								<i class="fa fa-calendar"></i>
							</div>
							
							<input type="text" class="form-control" name="birthdate" id="birthdate" placeholder="Date of Birth (DD/MM/YYYY)" data-mask="date" autocomplete="off" />
						</div>
					</div>

					<div class="form-group">
						<button type="button" data-step="step-2" class="btn btn-primary btn-block btn-login">
							<i class="fa fa-angle-right"></i>
							Next Step
						</button>
					</div>
					
					<div class="form-group">
						<p>Step 1 of 2</p>
					</div>
				
				</div>

				<div class="step" id="step-2">

					<div class="form-group">
						<div class="input-group">
							<div class="input-group-addon">
								<i class="fa fa-key"></i>
							</div>
							
							<input type="password" class="form-control" name="password_temp" id="password_temp" placeholder="Confirm Temporary Password" autocomplete="off" />
						</div>
					</div>
				
					<div class="form-group">
						<div class="input-group">
							<div class="input-group-addon">
								<i class="fa fa-lock"></i>
							</div>
							
							<input type="password" class="form-control" name="password" id="password" placeholder="Choose Password" autocomplete="off" />
						</div>
					</div>

					<div class="form-group">
						<div class="input-group">
							<div class="input-group-addon">
								<i class="fa fa-lock"></i>
							</div>
							
							<input type="password" class="form-control" name="password_confirmation" id="password_confirmation" placeholder="Confirm Password" autocomplete="off" />
						</div>
					</div>
					
					<div class="form-group">
						<button type="submit" class="btn btn-warning btn-block btn-login">
							<i class="fa fa-retweet"></i>
							Complete Recovery
						</button>
					</div>
					
					<div class="form-group">
						<p>Step 2 of 2</p>
					</div>
					
				</div>

			</div>
			
		</form>
		
		
		<div class="login-bottom-links">
			
			<a href="{{ route('account-login') }}" class="link">
				<i class="fa fa-lock"></i>
				Return to Login Page
			</a>

			<p><a href="{{ route('account-tos') }}">Terms of Service</a> &middot; <a href="{{ route('account-privacy') }}">Privacy Policy</a></p>
			
		</div>
		
	</div>
	
</div>

@stop

@section('javascript')
	<script src="{{ Theme::url('js/neon-recoveraccount.js') }}"></script>
	<script src="{{ Theme::url('js/jquery.inputmask.bundle.min.js') }}"></script>
@stop