@extends('layouts.app')
@section('content')
<!--Creating the table for posts  -->
<div class="panel panel-custom">
			<div class="panel-heading nav-menu">
					Trash Bin
			</div>
				<div class="panel-body">
					<table class="table table-hover">
						<thead>
								<th>
										Image
								</th>
								<th>
										Title
								</th>
								<th>
										Edit
								</th>
								<th>
										Restore
								</th>
								<th>
										Destroy
								</th>
						</thead>
						<tbody>
							@if($posts->count() > 0)
								@foreach($posts as $post)
									<tr>
										<td><img src="{{ $post->featured }}" alt="{{ $post->title }}" width="90px" height="50px"></td>
										<td>{{ $post->title }}</td>
										<td>Edit</td>
										<td><a href="{{ route('post.restore', ['id' => $post->id]) }}" class="btn btn-xs btn-success"><i class="fa fa-undo"></i> Restore</a></td>
										<td><a href="{{ route('post.kill', ['id' => $post->id]) }}" class="btn btn-xs btn-danger">Delete</a></td>
									</tr>
								@endforeach
							@else
								<tr>
									<th class="text-center" colspan="5" style="color:red;">The Trash Bin Is Empty</th>
								</tr>
							@endif
						</tbody>
					</table>
				</div>
		</div>
@stop