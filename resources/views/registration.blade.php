@extends('layouts.master')

@section('title')
Registration
@endsection

@section('content')
	<div class="row">
		<div class="col-md-6 col-md-offset-6 align-middle">
			<h3>Registration</h3>
			<form action="{{ route('registration') }}" method="post">
				<div class="form-group">
					<label for="email">Your E-mail</label>
					<input class="form-control {{ $errors->has('email') ? 'is-invalid' : '' }}" type="text" name="email" id="email" placeholder="example@mail.com" value="{{ Request::old('email') }}">
				</div>
				<div class="form-group">
					<label for="first_name">Your First Name</label>
					<input class="form-control {{ $errors->has('first_name') ? 'is-invalid' : '' }}" type="text" name="first_name" id="first_name" placeholder="Name" value="{{ Request::old('first_name') }}">
				</div>
				<div class="form-group">
					<label for="password">Your Password</label>
					<input class="form-control {{ $errors->has('password') ? 'is-invalid' : '' }}" type="password" name="password" id="password" placeholder="Your Strong Password" value="{{ Request::old('password') }}">
				</div>
				<button type="submit" class="btn btn-primary">Submit</button>
				<input type="hidden" name="_token" value="{{ Session::token() }}">
			</form>
		</div>
	</div>
@endsection