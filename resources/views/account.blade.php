@extends('layouts.master')

@section('title','My Account')

@section('content')
	<section class="row edit-post">
		<div class="col-md-6 col-md-offset-3">
			<header><h3>My Account</h3></header>
			<form enctype="multipart/form-data">
				<div class="form-group">
					<label for="your_name">Your Name: </label>
					<input type="text" name="your_name" class="form-control" id="your_name" value="{{ $user->name }}">
				</div>
				<div class="form-group">
					<label for="avater">Upload Your Avater: </label>
					<input type="file" name="avater" id="avater" class="form-control">
				</div>
				<button class="btn btn-primary" type="submit">Save Account</button>
				<input type="hidden" name="_token" value="{{ Session::token() }}">
			</form>
		</div>
	</section>
@endsection