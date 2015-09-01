@extends('layouts.default')

@section('content')

	{{ HTML::link( URL::route('category-new'), 'Add new category', array('class' => 'btn btn-default btn-in-toolbar')) }}
	
	<div class="panel panel-default">
		<div class="panel-heading">Categories</div>
		<div class="panel-body"></div>
		<table class="table table-hover">
			<thead>
				<tr>
					<th>Id</th>
					<th>Name</th>
					<th>Description</th>
					<th>User Name</th>
					<th>action</th>
				</tr>
			</thead>
		@forelse($aCategories as $category)
			<tbody>
				<tr>
				    <td>
				    	{{ $category->id }} 
				    </td>
				    <td>
				    	<b>{{ $category->name }}</b>
				    </td>
				    <td>
				    	{{ $category->description }}
				    </td>
				    <td>
				    	{{ $category->user_name }}
				    </td>
				    <td>
				    	<div class="btn-group">
							<a class="btn btn-primary dropdown-toggle" data-toggle="dropdown" href="#"><span class="caret"></span></a>
							<ul class="dropdown-menu">
								<li>
									<a href="{{route('category-edit', array('id' => $category->id)) }}">Edit</a>
									<a href="{{route('category-delete', array('id' => $category->id))}}">Delete</a>
								</li>
							</ul>
						</div>
					</td>
				</tr>
				@empty
	    		<tr>
			    	<td colspan='4'>Нет категорий</td>
			    </tr>
				@endforelse
			</tbody>
		</table>
	</div>
	<div class="text-center"><?php echo $aCategories->links(); ?></div>
@stop