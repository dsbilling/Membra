@extends('layouts.main')
@section('title', $username . '\'s Profile')
@section('css')
	@if($profilecover)
		<style type="text/css">
			.blur-image:before {
				background-image:url("{{ $profilecover }}");
			}	
		</style>
	@endif
@endsection
   
@section('content')

<div class="profile-env">
	
	<header class="row">
		
		<div class="col-sm-2">
			<a class="profile-picture" @if(\Auth::user()->id == $id) href="{{ route('account-change-images') }}" @endif><img src="{{ $profilepicture or '/images/profilepicture/0.png' }}" class="img-responsive img-circle" /></a>
		</div>
		
		<div class="col-sm-7">
			
			<ul class="profile-info-sections">
				<li>
					<div class="profile-name">
						<strong>
							{{ $firstname }}@if($showname) {{ $lastname }}@endif
							@if($showonline)
								<a href="#" class="user-status is-{{ $onlinestatus }} tooltip-primary" data-toggle="tooltip" data-placement="top" data-original-title="{{ ucfirst($onlinestatus) }}"></a>
								<!-- User statuses available classes "is-online", "is-offline", "is-idle", "is-busy" -->
							@endif
						</strong>
						<span>
							@if($ismod)
								Moderator
							@elseif($isadmin)
								Administrator
							@elseif($issuperadmin)
								Administrator
							@else
								Member
							@endif							
						</span>
					</div>
				</li>
				
				
				<li>
					<div class="profile-stat">
						<h3>0</h3>
						<span><a href="#">seats reserved</a></span>
					</div>
				</li>
				<!--
				<li>
					<div class="profile-stat">
						<h3>0</h3>
						<span><a href="#">following</a></span>
					</div>
				</li>
				-->
			</ul>
			
		</div>
		
		<div class="col-sm-3">
			<!--
			<div class="profile-buttons">
				<a href="#" class="btn btn-default">
					<i class="fa fa-envelope-o"></i>
				</a>
			</div>
			-->
		</div>
		
	</header>
	
	<section class="profile-info-tabs blur-image">
		
		<div class="row">
			
			<div class="col-sm-offset-2 col-sm-10">
				
				<ul class="user-details">
					
					@if($location)
						<li>
							<a href="#">
								<i class="fa fa-map-marker"></i>
								{{ $location }}
							</a>
						</li>
					@endif

					@if($gender)
						<li>
							<a href="#">
								<i class="fa fa-genderless"></i>
								{{ $gender }}
							</a>
						</li>
					@endif

					@if($occupation)
						<li>
							<a href="#">
								<i class="fa fa-suitcase"></i>
								{{ $occupation }}
							</a>
						</li>
					@endif

					@if($showemail)
						<li>
							<a href="#">
								<i class="fa fa-envelope-o"></i>
								{{ $email }}
							</a>
						</li>
					@endif
					
					<li>
						<a href="#">
							<i class="fa fa-birthday-cake"></i>
							{{ date_diff(date_create($birthdate), date_create('today'))->y }}
						</a>
					</li>
				</ul>
				
				
				<!-- tabs for the profile links -->
				<ul class="nav nav-tabs">
					<li class="active"><a href="#profile-info">Profile</a></li>
					@if(\Auth::user()->id == $id)
						<li><a href="{{ route('account-change-details') }}"><i class="fa fa-edit"></i> Edit Profile Details</a></li>
						<li><a href="{{ route('account-change-password') }}"><i class="fa fa-asterisk"></i> Change Password</a></li>
						<li><a href="{{ route('account-settings') }}"><i class="fa fa-cog"></i> Edit Profile Settings</a></li>
					@endif
				</ul>
				
			</div>
			
		</div>
		
	</section>

</div>

<div class="container-fluid">
	<div class="row">
		<div class="col-lg-12">
			<p>Moar to come.</p>
		</div>
	</div>
</div>

@stop