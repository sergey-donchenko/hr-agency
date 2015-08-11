@extends('layouts.default')

@section('content')

 	<ul>
 		@foreach($errors->all() as $error)
 		<li>
 			{{ $error }}
 		</li>
        @endforeach
    </ul>

{{ Form::open(array('url'=>URL::route('vacancy-save-post'), 'method'=>'POST', 'class'=>'form-vacancy')) }}

	<table>
		<tr>
			<td>
				{{ Form::label('parent category', 'Parent Category') }}
			</td>
		</tr>
		<tr>
			<td>
				{{ Form::select('category', $aCategories, ( isset($oVacancy) ? $oVacancy->category_id : null )) }}
			</td>
		</tr>
		<tr>
			<td>
				{{ Form::label('title', 'Title') }}
			</td>
		</tr>
		<tr>
			<td>
				{{ Form::text('title', ( isset($oVacancy) ? $oVacancy->title : null ), array('placeholder'=>'Title')) }}
			</td>
		</tr>
		<tr>
			<td>
				{{ Form::label('Description', 'Description') }}
			</td>
		</tr>
		<tr>
			<td>
				{{ Form::textarea('description', ( isset($oVacancy) ? $oVacancy->description : null ), array('placeholder'=>'Description')) }}
			</td>
		</tr>
		<tr>
			<td>
				{{ Form::label('city', 'City') }}
			</td>
		</tr>
		<tr>
			<td>
				{{ Form::text('city', ( isset($oVacancy) ? $oVacancy->city : null ), array('placeholder'=>'city')) }}
			</td>
		</tr>
		<tr>
			<td>
				{{ Form::submit('Save', array())}}
				{{ HTML::link( URL::route('vacancy-list'), 'To The List') }}
			</td>
		</tr>
		
	</table>
{{ Form::hidden('id', $id) }}
{{ Form::close() }}
	
@stop