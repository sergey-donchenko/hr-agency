@extends('layouts.default')

@section('content')

 	<ul>
 		@foreach($errors->all() as $error)
 		<li>
 			{{ $error }}
 		</li>
 		@endforeach
    </ul>

{{ Form::open(array('url'=>URL::route('category-save-post'), 'method'=>'POST', 'class'=>'form-category')) }}

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
				{{ Form::label('name', 'Name') }}
			</td>
		</tr>
		<tr>
			<td>
				{{ Form::text('name', ( isset($oCategory) ? $oCategory->name : null ), array('placeholder'=>'Name')) }}
			</td>
		</tr>
		<tr>
			<td>
				{{ Form::label('description', 'Description') }}
			</td>
		</tr>
		<tr>
			<td>
				{{ Form::textarea('description', ( isset($oCategory) ? $oCategory->description : null ), array('placeholder'=>'Description')) }}
			</td>
		</tr>
		<tr>
			<td>
				{{ Form::submit('Save', array())}}
				{{ HTML::link( URL::route('category-list'), 'To The List') }}
			</td>
		</tr>
		
	</table>
{{ Form::hidden('id', $id) }}
{{ Form::close() }}
	
@stop