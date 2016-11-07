@extends('layouts.master')

@section('title','My Account')

@section('content')
	<section class="row edit-post">
		<div class="col-md-6 col-md-offset-2">
			<img class="avatar" src="/uploads/avatars/{{ $user->avatar }}">
			<header><h3>{{ $user->name }}'s Account</h3></header>
			<form enctype="multipart/form-data" method="post" action="{{ route('user.profile') }}">
				<label>Upload profile image</label>
				<input type="file" name="avatar">
				<input type="hidden" name="_token" value="{{Session::token()}}">

				<input type="submit" name="submit" class="pull-right btn btn-primary">
			</form>
			
		</div>
	</section>
@endsection