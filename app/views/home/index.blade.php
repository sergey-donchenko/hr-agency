@extends('layouts.default')

@section('content')

	<table border="1">
	@forelse($aCategories as $category)
		
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
			<td colspan='4'>Нет категорий</td>
		</tr>
	@endforelse

	</table>
	<hr>
	<table border="1">
	
	@forelse($aVacancies as $vacancy)
		
		<tr>
			<td>
				{{ $vacancy->title }}
			</td>
			<td>
				{{ $vacancy->description }}
			</td>
			<td>
				{{ $vacancy->city }}
			</td>
		</tr>
	@empty
		<tr>
			<td colspan='4'>Нет категорий</td>
		</tr>
	@endforelse

	</table>

@stop