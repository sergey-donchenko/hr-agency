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
		<div class="panel-heading">Region</div>
		<div class="panel-body"></div>
		<table class="table table-hover">
			{{ Form::open(array('url'=>URL::route('region-save-post'), 'method'=>'POST', 'class'=>'form-region')) }}
			<tr>
				<td>
					{{ Form::label('country', 'Country') }}<br>
					{{ Form::select('country', $aCountries, ( isset($oRegion) ? $oRegion->country_id : null ), array('class' => 'form-control')) }}
				</td>
			</tr>
			<tr>
				<td>
					{{ Form::label('name', 'Name') }}<br>
					{{ Form::text('name', ( isset($aRegion) ? $aRegion->name : null ), ['class' => 'form-control']) }}
				</td>
			</tr>
			<tr>
				<td>
					{{ Form::label('Description', 'Description') }}<br>
					{{ Form::text('description', ( isset($aRegion) ? $aRegion->description : null ), ['class' => 'form-control']) }}
				</td>
			</tr>
			<tr>
				<td>
					{{ Form::submit('Save', array())}}
					{{ HTML::link( URL::route('region-list'), 'To The Region List') }}
				</td>
			</tr>
		</table>
	</div>
	{{ Form::hidden('id', $id) }}
	{{ Form::close() }}
@stop