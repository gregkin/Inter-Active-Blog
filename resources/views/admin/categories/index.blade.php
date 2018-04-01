@extends('layouts.app')
@section('content')
<!--Creating the table for categories  -->
<div class="panel panel-custom">
			<div class="panel-heading nav-menu">
					List of All Categories
			</div>
				<div class="panel-body">
					<table class="table table-striped table-condensed">
						<thead>
								<th class = "ind">
										Category Name
								</th>
								<th>
										Editing
								</th>
								<th>
										Delete
								</th>
						</thead>
						<tbody>
						@if($categories->count() > 0)
							@foreach($categories as $category)
									<tr>
											<td class = "ind">
													{{ $category->name}}
											</td>
											<td>
													<a href="{{ route('category.edit', ['id' => $category->id ]) }}" class="btn btn-info btn-xs"><span class="glyphicon glyphicon-edit"></span> Edit
													</a>
											</td>
											<td>
													<a href="{{ route('category.delete', ['id' => $category->id ]) }}" class="btn btn-danger btn-xs"><span class="glyphicon glyphicon-trash"></span> Trash
													</a>
											</td>
									</tr>
							@endforeach
						@else
						<tr>
									<th class="text-center" colspan="5" style="color:red;">No Categories</th>
								</tr>
						@endif
						</tbody>
					</table>
				</div>
		</div>


@stop