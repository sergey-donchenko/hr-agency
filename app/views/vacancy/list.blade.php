@extends('layouts.default')

@section('content')

	{{ HTML::link( URL::route('vacancy-new'),'Add new vacancy') }}
	<table  border="1">
		<tr>
			<th>id</th>
			<th>name</th>
			<th>description</th>
			<th>city</th>
			<th>actions</th>
		</tr>
	@forelse($aVacancies as $vacancy)
		<tr>
			<td>
				{{ $vacancy->id }}
			</td>
			<td>
				{{ $vacancy->title }}
			</td>
			<td>
				{{ $vacancy->description }}
			</td>
			<td>
				{{ $vacancy->city }}
			</td>
			<td>
				{{ HTML::link( URL::route('vacancy-edit', array('id'=>$vacancy->id)),'Edit') }}
				{{ HTML::link( URL::route('vacancy-delete', array('id'=>$vacancy->id)),'Delete', array('class' => 'delete-item', 'attr-id' => $vacancy->id)) }}
			</td>
		</tr>
	@empty
	    <tr>
	    	<td colspan='4'>Нет вакансий</td>
	    </tr>
	@endforelse
	</table>

@stop