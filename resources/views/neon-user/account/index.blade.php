@extends('layouts.main')
@section('title', 'Dashboard')
@section('content')

<div class="container">
	<div class="row">
		<div class="col-md-12">
			<ol class="breadcrumb 2" >
				<li><a href="{{ route('home') }}"><i class="fa fa-home"></i>Home</a></li>
				<li class="active"><strong>Dashboard</strong></li>
			</ol>

			<h1>Welcome back, {{ $firstname }}@if($showname && $lastname) {{ $lastname }}@endif!</h1>
			<hr>
			<div class="row">
				<div class="col-lg-8">
					
				</div>
				<div class="col-lg-4">
					<div class="row">
						<div class="col-lg-3">
							<img src="{{ $profilepicturesmall or '/images/profilepicture/0_small.png' }}" class="img-thumbnail">
						</div>
						<div class="col-lg-9">
							<h3>
								<a href="{{ route('user-profile', $username) }}">{{ $firstname }} {{ $lastname }}</a>
								@if($showonline)
									<a href="#" class="user-status is-{{ $onlinestatus }} tooltip-primary" data-toggle="tooltip" data-placement="top" data-original-title="{{ ucfirst($onlinestatus) }}"></a>
									<!-- User statuses available classes "is-online", "is-offline", "is-idle", "is-busy" -->
								@endif
							</h3>
							<p>{{ date_diff(date_create($birthdate), date_create('today'))->y }}@if($location) from {{ $location }}@endif</p>
						</div>
					</div>
					<hr>
					<p class="text-center">Today is {{ date($userdateformat, time()) }}, and the time is {{ date($usertimeformat, time()) }}.</p>
					<hr>
					<p><em>Want to do some changes to your profile?</em></p>
					<div class="list-group">
						<a href="{{ route('account-change-details') }}" class="list-group-item"><i class="fa fa-edit"></i> Edit Profile Details</a>
						<a href="{{ route('account-change-password') }}" class="list-group-item"><i class="fa fa-asterisk"></i> Change Password</a>
						<a href="{{ route('account-change-images') }}" class="list-group-item"><i class="fa fa-picture-o"></i> Change Profile Images</a>
						<a href="{{ route('account-settings') }}" class="list-group-item"><i class="fa fa-cog"></i> Edit Profile Settings</a>
					</div>
					<hr>
					<p>
						<strong>Your referral link:</strong><br>
						<input class="form-control" type="text" name="referrallink" id="referrallink" value="{{ Config::get('infihex.appprotocol') }}://{{ Config::get('infihex.appdomain') }}/r/{{ $referral_code }}">
					</p>
					<p>You have referred <strong>{{ 0 }}</strong> user(s).</p>
				</div>
			</div>

		</div>
	</div>
</div>
@stop