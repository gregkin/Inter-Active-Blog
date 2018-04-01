@extends('layouts.app')
@section('content')
<!--Creating the table for posts  -->
<div class="panel panel-custom">
			<div class="panel-heading nav-menu">
					Published Posts
			</div>
				<div class="panel-body" height="40px">
					<table class="table table-striped table-responsive">
						<thead>
								<th class="text-center">
										Image
								</th>
								<th class="text-center">
										Title
								</th>
								<th class="text-center">
										Edit
								</th>
								<th class="text-center">
										Trash
								</th>
						</thead>
						<tbody>
							@if($posts->count() > 0)
								@foreach($posts as $post)
									<tr>
										<td class="text-center"><img src="{{ $post->featured }}" alt="{{ $post->title }}" width="50px" height="35px"></td>
										<td class="text-center">{{ $post->title }}</td>
										<td class="text-center"><a href="{{ route('post.edit', ['id' => $post->id]) }}" class="btn btn-xs btn-info"><span class="glyphicon glyphicon-edit"></span> Edit</a></td>
										<td class="text-center"><a href="{{ route('post.delete', ['id' => $post->id]) }}" class="btn btn-xs btn-danger"><span class="glyphicon glyphicon-trash"></span> Trash</a></td>
									</tr>
								@endforeach
							@else
								<tr>
									<th class="text-center" colspan="5" style="color:red;">No Published Post</th>
								</tr>
							@endif
						</tbody>
					</table>
				</div>
		</div>
@stop