@extends('layouts.default')

@section('content')
		
	@if (Auth::user()->is_admin == 1)
		{{ HTML::link( URL::route('city-new'), 'Add City', array('class' => 'btn btn-default btn-in-toolbar')) }}
	@endif
	<div class="panel panel-default">
		<div class="panel-heading">Cities</div>
		<div class="panel-body"></div>
		<table class="table table-hover">
			<thead>
				<tr>
					<th>Name</th>
					<th>Description</th>
					<th>Region</th>
					<th>Country</th>
					<th>User</th>
				@if (Auth::user()->is_admin == 1)
					<th>Action</th>
				@endif
				</tr>
			</thead>
			<tbody>
			@forelse($aCity as $city)
			    <tr>
				    <td>
				    	{{ $city->name }} 
				    </td>
				    <td>
				    	{{ $city->description }}
				    </td>
				    <td>
				    	{{ $city->region_name }}
				    </td>
				    <td>
				    	{{ $city->country_name }}
				    </td>
				    <td>
				    	{{ $city->user_name }}
				    </td>
				    @if (Auth::user()->is_admin == 1)
				    <td>
				    	<div class="btn-group">
							<a class="btn btn-primary dropdown-toggle" data-toggle="dropdown" href="#"><span class="caret"></span></a>
							<ul class="dropdown-menu">
								<li>
									<a href="{{route('city-edit', array('id' => $city->id)) }}">Edit</a>
									<a href="{{route('city-delete', array('id' => $city->id)) }}">Delete</a>
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
	<div class="text-center"><?php echo $aCity->links(); ?></div>
@stop