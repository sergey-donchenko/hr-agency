@extends('layouts.default')

@section('content')

		@if (Auth::user()->is_admin == 1)
		{{ HTML::link( URL::route('country-new'), 'Add Country ', array('class' => 'btn btn-default btn-in-toolbar')) }}
		@endif

	<div class="panel panel-default">
		<div class="panel-heading">Countries</div>
		<div class="panel-body"></div>
		<table class="table table-hover">
			<thead>
				<tr>
					<th>Name</th>
					<th>Description</th>
					<th>User name</th>
					@if (Auth::user()->is_admin == 1)
					<th>Action</th>
					@endif
				</tr>
			</thead>
			@forelse($aCountry as $country)
			<tbody>
			    <tr>
				    <td>
				    	{{ $country->name }} 
				    </td>
				    <td>
				    	{{ $country->description }}
				    </td>
				    <td>
				    	{{ $country->user_name }}
				    </td>
					@if (Auth::user()->is_admin == 1)
				    <td>
				    	<div class="btn-group">
							<a class="btn btn-primary dropdown-toggle" data-toggle="dropdown" href="#"><span class="caret"></span></a>
								<ul class="dropdown-menu">
								<li>
									<a href="{{route('country-edit', array('id' => $country->id)) }}">Edit</a>
									<a href="{{route('country-delete', array('id' => $country->id)) }}">Delete</a>
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
	<div class="text-center"><?php echo $aCountry->links(); ?></div>
@stop