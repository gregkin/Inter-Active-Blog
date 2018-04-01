@extends('layouts.app')
@section('content')
<!--Creating the table for posts  -->
<div class="panel panel-custom">
			<div class="panel-heading nav-menu">
					List of Users
			</div>
				<div class="panel-body" height="36px;">
					<table class="table table-striped table-responsive">
						<thead>
								<th class="text-center">
										Image
								</th>
								<th class="text-center">
										Name
								</th>
								<th class="text-center">
										Permissions
								</th>
								<th class="text-center">
										Delete
								</th>
						</thead>
						<tbody>
							@if($users->count() > 0)
								@foreach($users as $user)
									<tr class="text-center">
										<td>
											<img src="{{ asset($user->profile->avatar) }}" alt="" width="40px" height="40px" style="border-radius: 50%;">
										</td>
										<td>
											{{ $user->name }}
										</td>
										<td width = "100px">
											@if($user->admin)
												<a href="{{ route('user.not.admin', ['id' => $user->id]) }}" class="btn btn-xs btn-danger btn-block">Remove Permission</a>
											@else	
												<a href="{{ route('user.admin', ['id' => $user->id]) }}" class="btn btn-xs btn-success btn-block">Make Admin</a>
											@endif
										</td>
										<td>
											@if(Auth::id() !== $user->id)
													<a href="{{ route('user.delete', ['id' => $user->id]) }}" class="btn btn-xs btn-danger">Delete User</a>
											@endif
										</td>
									</tr>
								@endforeach
							@else
								<tr>
									<th class="text-center" colspan="5" style="color:red;">No Users</th>
								</tr>
							@endif
						</tbody>
					</table>
				</div>
		</div>
@stop