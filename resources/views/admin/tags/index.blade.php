@extends('layouts.app')
@section('content')
<!--Creating the table for categories  -->
<div class="panel panel-custom">
			<div class="panel-heading nav-menu">
					All Tags
			</div>
				<div class="panel-body">
					<table class="table table-striped table-condensed">
						<thead>
								<th class ="ind">
										Tag Name
								</th>
								<th>
										Editing
								</th>
								<th>
										Delete
								</th>
						</thead>
						<tbody>
						@if($tags->count() > 0)
							@foreach($tags as $tag)
									<tr>
											<td class = "ind">
													{{ $tag->tag}}
											</td>
											<td>
													<a href="{{ route('tag.edit', ['id' => $tag->id ]) }}" class="btn btn-info btn-xs"><span class="glyphicon glyphicon-edit"></span> Edit
													</a>
											</td>
											<td>
													<a href="{{ route('tag.delete', ['id' => $tag->id ]) }}" class="btn btn-danger btn-xs"><span class="glyphicon glyphicon-trash"></span> Delete
													</a>
											</td>
									</tr>
							@endforeach
						@else
						<tr>
									<th class="text-center" colspan="5" style="color:red;">No Tags</th>
								</tr>
						@endif
						</tbody>
					</table>
				</div>
		</div>


@stop