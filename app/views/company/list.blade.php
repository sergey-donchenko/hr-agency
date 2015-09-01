@extends('layouts.default')

@section('content')

	{{ HTML::link( URL::route('company-new'), 'Add Company', array('class' => 'btn btn-default btn-in-toolbar')) }}

	<div class="panel panel-default">
		<div class="panel-heading">Companies</div>
		<div class="panel-body"></div>
		<table class="table table-hover">
			<thead>
				<tr>
					<th>Name</th>
					<th>Description</th>
					<th>Phone</th>
					<th>E-mail</th>
					<th>Web-site</th>
					<th>City</th>
					<th>Region</th>
					<th>Country</th>
					<th>User</th>
					<th>Action</th>
				</tr>
			</thead>
			@forelse($aCompany as $company)
			<tbody>
				<tr>
					<td>
						{{ $company->name }} 
					</td>
					<td>
						{{ $company->description }}
					</td>
					<td>
						{{ $company->phone }}
					</td>
					<td>
						{{ $company->email }}
					</td>
					<td>
						{{ $company->web_site }}
					</td>
					<td>
						{{ $company->city_name }}
					</td>
					<td>
						{{ $company->region_name }}
					</td>
					<td>
						{{ $company->country_name }}
					</td>
					<td>
						{{ $company->user_name }}
					</td>
					<td>
						<div class="btn-group">
							<a class="btn btn-primary dropdown-toggle" data-toggle="dropdown" href="#"><span class="caret"></span></a>
							<ul class="dropdown-menu">
								<li>
									<a href="{{route('company-edit', array('id' => $company->id)) }}">Edit</a>
									<a href="{{route('company-delete', array('id' => $company->id))}}">Delete</a>
								</li>
							</ul>
						</div>
					</td>
				</tr>
				@empty
				<tr>
					<td colspan='4'>Нет вакансий</td>
				</tr>
			@endforelse
			</tbody>
		</table>
	</div>
	<div class="text-center"><?php echo $aCompany->links(); ?></div>
@stop