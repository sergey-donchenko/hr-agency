@extends('layouts.default')

@section('content')

	{{ HTML::link( URL::route('category-new'), Auth::user()->is_admin == 1 ? 'Add new category' : '') }}
	<table border="1">
		<tr>
			<th>id</th>
			<th>name</th>
			<th>description</th>
			<th>parent_id</th>
			@if (Auth::user()->is_admin == 1)
			<th>action</th>
			@endif
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
		    @if (Auth::user()->is_admin == 1)
		    <td>
				{{ HTML::link( URL::route('category-edit'), 'Edit') }}
				{{ HTML::link( URL::route('category-delete'), 'Delete' ) }}
			</td>
			@endif
		</tr>
	@empty
	    <tr>
	    	<td colspan='4'>Нет категорий</td>
	    </tr>
	@endforelse

	</table>

@stop