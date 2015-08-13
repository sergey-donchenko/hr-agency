@extends('layouts.default')

@section('content')

	
	{{ HTML::link( URL::route('page-new'), Auth::user()->is_admin == 1 ? 'Add new static page' : '') }}

	<table border="1">
		<tr>
			<th>Id</th>
			<th>Title</th>
			<th>URL</th>
			<th>Date of creation</th>
			@if (Auth::user()->is_admin == 1)
			<th>Action</th>
			@endif
		</tr>

	@forelse($aPage as $static_page)
	  
	    <tr>
	    	<td>
	    		{{ $static_page->id }} 
		    </td>
		    <td>
		    	{{ $static_page->title }} 
		    </td>
		    <td>
		    	{{ $static_page->url }}
		    </td>
		    <td>
		    	{{ $static_page->created_at }}
		    
		    </td>
		    @if (Auth::user()->is_admin == 1)
		    <td>
				{{ HTML::link( URL::route('page-edit', array('id' => $static_page->id)), 'Edit') }}
				{{ HTML::link( URL::route('page-delete', array('id' => $static_page->id)), 'Delete') }}
			</td>
			@endif		   
		</tr>
	@empty

	@endforelse

@stop