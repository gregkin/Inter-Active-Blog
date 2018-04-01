@extends('layouts.app')
@section('content')
	@include('admin.includes.errors')
<div class="panel panel-custom">
	<div class="panel-heading nav-menu">
			Create a New User
	</div>
	<div class="panel-body">
		<form action="{{ route('user.store') }}" method="post">
			{{ csrf_field() }}
			<div class="form-group">
				<label for="name">User Name</label>
				<input type="text" name="name" class="form-control">
			</div>
			<div class="form-group">
				<label for="name">Email Address</label>
				<input type="email" name="email" class="form-control">
			</div>
			<div class="form-group">
				<div class="text-center">
					<button class="btn btn-custom" type="submit">
						Create User
					</button>
				</div>
			</div>
		</form>
	</div>
</div>

@stop