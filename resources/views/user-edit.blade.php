@extends('layouts.main')

@section('content')

	<h2>Edit profile for : {{$user->name}}</h2>
 <div class="jumbotron">
		
		<form action="/users/{{$user->id}}" method="POST">
			
			{!! CSRF_FIELD() !!}
			<input type = 'hidden' name = '_method' value = 'PATCH'>

			{{--name--}}
				<div class="form-group">
					<label>name</label>
					<input type="text" name="name" class = 'form-control' value = '{{$user->name}}'>
				</div>
			{{-- email --}}
				<div class="form-group">
					<label>email</label>
					<input type="email" name="email" class = 'form-control' value = '{{$user->email}}'>
				</div>

			{{-- password--}}
				<div class="form-group">
					<label>password</label>
					<input type="password" name="password" class = 'form-control' placeholder="*****">
				</div>

				<div class="form-group">
					<button type="submit" class="btn btn-block btn-primary">Update</button>
				</div>


		</form>

	</div>

@endsection