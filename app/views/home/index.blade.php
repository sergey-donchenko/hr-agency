@extends('layouts.default')

@section('content')

	<div class="panel panel-default">
		<div class="panel-heading">Categories</div>
		<div class="panel-body"></div>
		<table class="table table-hover">
			<thead>
				<tr>
					<th>Name</th>
					<th>Description</th>
				</tr>
			</thead>
			@forelse($aCategories as $category)
			<tbody>
				<tr>
					<td>
						{{ $category->name }}
					</td>
					<td>
						{{ $category->description }}
					</td>
				</tr>
				@empty
				<tr>
					<td colspan='4'>No category</td>
				</tr>
				@endforelse
			</tbody>
		</table>
	</div>
	<br>
	<div class="panel panel-default">
		<div class="panel-heading">Vacancies</div>
		<div class="panel-body"></div>
	  	<table class="table table-hover">
			<thead>
				<tr>
					<th>Name</th>
					<th>Description</th>
				</tr>
			</thead>
			@forelse($aVacancies as $vacancy)
			<tbody>
				<tr>
					<td>
						{{ $vacancy->title }}
					</td>
					<td>
						{{ $vacancy->description }}
					</td>
				</tr>
				@empty
				<tr>
					<td colspan='4'>No vacancy</td>
				</tr>
				@endforelse
			</tbody>
		</table>
	</div>
@stop