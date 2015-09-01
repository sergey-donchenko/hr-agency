@extends('layouts.default')

@section('content')
	
	@if (Auth::user()->is_admin ==1)
	{{ HTML::link( URL::route('page-new'), 'Add new static page', array('class' => 'btn btn-default btn-in-toolbar')) }}
	@endif

	<div class="panel panel-default">
		<div class="panel-heading">Static Page</div>
		<div class="panel-body"></div>
		<table class="table table-hover">
			<thead>
				<tr>
					<th>Id</th>
					<th>Title</th>
					<th>URL</th>
					<th>User</th>
				@if (Auth::user()->is_admin == 1)
					<th>Action</th>
				@endif
				</tr>
			</thead>
		@forelse($aPage as $static_page)
			<tbody>
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
				    	{{ $static_page->user_name }}
				    </td>
			    @if (Auth::user()->is_admin == 1)
				    <td>
				    	<div class="btn-group">
				    		<a class="btn btn-primary dropdown-toggle" data-toggle="dropdown" href="#"><span class="caret"></span></a>
				    		<ul class="dropdown-menu">
				    			<li>
				    				<a href="{{route('page-edit', array('id' => $static_page->id)) }}">Edit</a>
				    				<a href="{{route('page-delete', array('id' => $static_page->id)) }}">Delete</a>
				    			</li>
				    		</ul>
				    	</div>
					</td>
				@endif		   
					</tr>
					@empty
					@endforelse
			</tbody>
		</table>
	</div>
	<div class="text-center"><?php echo $aPage->links(); ?></div>
@stop