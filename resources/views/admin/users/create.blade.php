@extends('layouts.app')
@section('content')
	@include('admin.includes.errors')
<div class="panel panel-primary">
	<div class="panel-heading">
			Create a New User
	</div>
	<div class="panel-body">
		<form action="{{ route('user.store') }}" method="post">
			{{ csrf_field() }}
			<div class="form-group">
				<label for="name">User</label>
				<input type="text" name="name" class="form-control">
			</div>
			<div class="form-group">
				<label for="name">Email</label>
				<input type="email" name="email" class="form-control">
			</div>
			<div class="form-group">
				<div class="text-center">
					<button class="btn btn-success" type="submit">
						Add User
					</button>
				</div>
			</div>
		</form>
	</div>
</div>

@stop