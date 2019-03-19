@extends('layouts.master')

@section('title')
Login
@endsection

@section('content')
	<div class="row">
		<div class="col-md-6">
			<h3>Login</h3>
			<form action="{{ route('login') }}" method="post">
				<div class="form-group">
					<label for="email">Your E-mail</label>
					<input class="form-control {{ $errors->has('email') ? 'is-invalid' : '' }}" type="text" name="email" id="email" value="{{ Request::old('email') }}">
				</div>
				<div class="form-group">
					<label for="password">Your Passsword</label>
					<input class="form-control {{ $errors->has('password') ? 'is-invalid' : '' }}" type="password" name="password" id="password" value="{{ Request::old('password') }}">
				</div>
				<button type="submit" class="btn btn-primary">Submit</button>
				<input type="hidden" name="_token" value="{{ Session::token() }}">
			</form>
			<br />
			<a href="#">Forgot Password?</a>
		</div>
	</div>
@endsection