@extends('layouts.base.main')
@section('title') {{ $username }}'s Profile @stop
   
@section('content')

<div class="profile">
	<div class="profile-image-cover"></div>
	<div class="container">
		<div class="row">
			<div class="col-md-12">
				<img align="left" class="profile-image thumbnail" src="http://retardedtech.no/files/img/team/daniel.jpg" alt="{{ $username }}"/>
				<div class="profile-text">
					<h1>{{ $firstname }} {{ $lastname }} ({{ $username }})</h1>
					<p>{{ $email }}</p>
				</div>
			</div>
		</div>
	</div>
</div> 
@stop