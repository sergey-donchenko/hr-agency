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
		<div class="panel-heading">Company</div>
		<div class="panel-body"></div>
		<table class="table table-hover">
			{{ Form::open(array('url'=>URL::route('company-save-post'), 'method'=>'POST', 'class'=>'form-company')) }}
			<tr>
				<td>
					{{ Form::label('City', 'City') }}<br>
					{{ Form::select('city_id', $aRegions, ( isset($aCompany) ? $aCompany->city_id : null ), array('class' => 'form-control')) }}
				</td>
			</tr>
			<tr>
				<td>
					{{ Form::label('name', 'Name') }}<br>
					{{ Form::text('name', ( isset($aCompany) ? $aCompany->name : null ), ['class' => 'form-control']) }}
				</td>
			</tr>
			<tr>
				<td>
					{{ Form::label('Description', 'Description') }}<br>
					{{ Form::text('description', ( isset($aCompany) ? $aCompany->description : null ), ['class' => 'form-control']) }}
				</td>
			</tr>
				<tr>
				<td>
					{{ Form::label('Phone', 'Phone') }}<br>
					{{ Form::text('phone', ( isset($aCompany) ? $aCompany->phone : null ), ['class' => 'form-control']) }}
				</td>
			</tr>
			<tr>
				<td>
					{{ Form::label('E-mail', 'E-mail') }}<br>
					{{ Form::text('email', ( isset($aCompany) ? $aCompany->email : null ), ['class' => 'form-control']) }}
				</td>
			</tr>
			<tr>
				<td>
					{{ Form::label('Web Site', 'Web Site') }}<br>
					{{ Form::text('web_site', ( isset($aCompany) ? $aCompany->web_site : null ), ['class' => 'form-control']) }}
				</td>
			</tr>
			<tr>
				<td>
					{{ Form::submit('Save', array())}}
					{{ HTML::link( URL::route('company-list'), 'To The Company List') }}
				</td>
			</tr>
		</table>
	</div>
	{{ Form::hidden('id', $id) }}
	{{ Form::close() }}
@stop