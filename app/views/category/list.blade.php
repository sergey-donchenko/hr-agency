@extends('layouts.default')

@section('content')

	{{ HTML::link( URL::route('category-new'),'Add new category') }}
	<table border="1">
		<tr>
			<th>id</th>
			<th>name</th>
			<th>description</th>
			<th>parent_id</th>
			<th>actions</th>
		</tr>

	@forelse($aCategories as $category)

		<tr>
		    <td>
		    	{{ $category->id }} 
		    </td>
		    <td>
		    	{{ $category->name }}
		    </td>
		    <td>
		    	{{ $category->description }}
		    </td>
		    <td>{{ $category->parent_id }}
		    </td>
		    <td>
				{{ HTML::link( URL::route('category-edit', array('id'=>$category->id)),'Edit') }}
				{{ HTML::link( URL::route('category-delete', array('id'=>$category->id)),'Delete') }}
			</td>
		</tr>
	@empty
	    <tr>
	    	<td colspan='4'>Нет категорий</td>
	    </tr>
	@endforelse

	</table>

@stop