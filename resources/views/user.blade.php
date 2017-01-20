@extends('layouts.main')

@section('content')

	<a href="/users/create" class = 'btn btn-sm btn-success'>Create</a>

	

		<table class="table table-strip table-hover table-border">
			<thead>
				<tr>
					<th>Name</th>
					<th>Address</th>
					<th>Joint on</th>
					<th>Action</th>
				</tr>
			</thead>

			<tbody>
				@foreach ($users as $user)
					<tr>
						<td>{{$user->name}}</td>
						<td>{{$user->email}}</td>
						<td>{{$user->created_at->diffforhumans()}}</td>
						<td>
							<ul class = 'list list-inline'>
								<li><a href="/users/{{$user->id}}">Detail</a></li>
								<li><a href="/users/{{$user->id}}/edit">Edit</a></li>


								<li><form action="users/{{$user->id}}" method = 'POST'>
									{!! csrf_field()!!}
									<input type="hidden" name = '_method' value = 'DELETE'>
									 <button type = 'submit' class="btn btn-danger btn-sm">Delete</button>
								</form></li>
							</ul>
						</td>
					</tr>
				@endforeach

			</tbody>
		


		</table>

@endsection