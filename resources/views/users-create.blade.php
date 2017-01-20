@extends('layouts/main')

@section('content')

<form action = '/users' method = 'POST'>

	{!! csrf_field() !!}
	<div class="form-group">
		
	</div>

	{{--name--}}
	<div class="form-group">
		<label>name</label>
		<input type="text" name="name" class = 'form-control'>
	</div>
	{{-- email --}}
	<div class="form-group">
		<label>email</label>
		<input type="email" name="email" class = 'form-control'>
	</div>

	{{-- password--}}
	<div class="form-group">
		<label>password</label>
		<input type="password" name="password" class = 'form-control'>
	</div>

	<div class="form-group">
		<button type="submit" class="btn btn-block btn-primary">Submit</button>
	</div>
</form>


@endsection