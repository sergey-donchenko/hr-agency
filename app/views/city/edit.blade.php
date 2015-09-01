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
		<div class="panel-heading">City</div>
		<div class="panel-body"></div>
		<table class="table table-hover">
			{{ Form::open(array('url'=>URL::route('city-save-post'), 'method'=>'POST', 'class'=>'form-city')) }}
			<tr>
				<td>
					{{ Form::label('region', 'Region') }}<br>
					{{ Form::select('region', $aCountries, ( isset($aCity) ? $aCity->region_id : null ), array('class' => 'form-control')) }}
				</td>
			</tr>
			<tr>
				<td>
					{{ Form::label('name', 'Name') }}<br>
					{{ Form::text('name', ( isset($aCity) ? $aCity->name : null ), ['class' => 'form-control']) }}
				</td>
			</tr>
			<tr>
				<td>
					{{ Form::label('Description', 'Description') }}<br>
					{{ Form::text('description', ( isset($aCity) ? $aCity->description : null ), ['class' => 'form-control']) }}
				</td>
			</tr>
			<tr>
				<td>
					{{ Form::submit('Save', array())}}
					{{ HTML::link( URL::route('city-list'), 'To The City List') }}
				</td>
			</tr>
		</table>
	</div>
	{{ Form::hidden('id', $id) }}
	{{ Form::close() }}				
@stop