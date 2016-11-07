@extends('layouts.master')

@section('title','Social App')

@section('content')


    @include('includes.messages')
    <div class="row">
        <div class="col-md-4">
        <h3>Sign Up</h3>
            <form method="post" action="{{ route('signUp') }}">
                <div class="form-group {{ $errors->has('email') ? 'has-error' : '' }}">
                    <label for="email">E-mail :</label>
                    <input type="email" class="form-control" id="email" name="email" placeholder="Email" value="{{Request::old('email')}}">
                </div>
                <div class="form-group {{ $errors->has('name') ? 'has-error' : '' }}">
                    <label for="name">Your Name :</label>
                    <input type="name" class="form-control" id="name" name="name" placeholder="Your Name" value="{{Request::old('name')}}">
                </div>
                <div class="form-group {{ $errors->has('password') ? 'has-error' : '' }}">
                    <label for="password">Password :</label>
                    <input type="password" class="form-control" id="password" name="password" placeholder="password" >
                </div>
                
                <button type="submit" class="btn btn-primary">Submit</button>
                <input type="hidden" name="_token" value="{{ Session::token() }}">
            </form>
        </div>
        
        <div class="col-md-4 col-md-offset-4">
            <h3>Sign In</h3>
            <form method="post" action="{{ route('signin') }}">
                <div class="form-group">
                    <label for="email">E-mail :</label>
                    <input type="email" class="form-control" id="email" name="email" placeholder="Email" value="{{ Request::old('email') }}">
                </div>
                <div class="form-group">
                    <label for="password">Password :</label>
                    <input type="password" class="form-control" id="password" name="password" placeholder="password">
                </div>
                
                <button type="submit" class="btn btn-primary">Submit</button>
                <input type="hidden" name="_token" value="{{ Session::token() }}">
            </form>
        </div>
    </div>
    

@endsection