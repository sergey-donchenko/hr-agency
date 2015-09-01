@extends('layouts.default')

@section('content')

 	<ul>
 		@foreach($errors->all() as $error)
 		<li>
 			{{ $error }}
 		</li>
        @endforeach
    </ul>

	<div class="panel panel-default">
		<div class="panel-heading">Country</div>
		<div class="panel-body"></div>
		<table class="table table-hover">
			{{ Form::open(array('url'=>URL::route('country-save-post'), 'method'=>'POST', 'class'=>'form-country')) }}
			<tr>
				<td>
					{{ Form::label('Name', 'Name') }}<br>
					{{ Form::text('name', ( isset($aCountry) ? $aCountry->name : null ), ['class' => 'form-control']) }}
				</td>
			</tr>
			<tr>
				<td>
					{{ Form::label('Description', 'Description') }}<br>
					{{ Form::text('description', ( isset($aCountry) ? $aCountry->description : null ), ['class' => 'form-control']) }}
				</td>
			</tr>
			<tr>
				<td>
					{{ Form::submit('Save', array())}}
					{{ HTML::link( URL::route('country-list'), 'To The Country List') }}
				</td>
			</tr>
		</table>
	</div>
	{{ Form::hidden('id', $id) }}
	{{ Form::close() }}
@stop