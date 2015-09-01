@extends('layouts.default')

@section('content')

	@if (Auth::user()->is_admin == 1)
		{{ HTML::link( URL::route('region-new'), 'Add Region ', array('class' => 'btn btn-default btn-in-toolbar')) }}
	@endif

	<div class="panel panel-default">
		<div class="panel-heading">Regions</div>
		<div class="panel-body"></div>
		<table class="table table-hover">
			<thead>
				<tr>
					<th>Name</th>
					<th>Description</th>
					<th>Country</th>
					@if (Auth::user()->is_admin == 1)
					<th>Action</th>
					@endif
				</tr>
			</thead>
		@forelse($aRegion as $region)
			<tbody>
				<tr>
					<td>
						{{ $region->name }} 
					</td>
					<td>
						{{ $region->description }}
					</td>
					<td>
						{{ $region->country_name }}
					</td>
					@if (Auth::user()->is_admin == 1)
					<td>
						<div class="btn-group">
							<a class="btn btn-primary dropdown-toggle" data-toggle="dropdown" href="#"><span class="caret"></span></a>
							<ul class="dropdown-menu">
								<li>
									<a href="{{route('region-edit', array('id' => $region->id)) }}">Edit</a>
										<a href="{{route('region-delete', array('id' => $region->id)) }}">Delete</a>
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
	<div class="text-center"><?php echo $aRegion->links(); ?></div>
@stop