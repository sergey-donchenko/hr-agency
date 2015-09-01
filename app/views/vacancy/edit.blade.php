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
		<div class="panel-heading">Vacancy</div>
		<div class="panel-body"></div>
		<table class="table table-hover">
			{{ Form::open(array('url'=>URL::route('vacancy-save-post'), 'method'=>'POST', 'class'=>'form-vacancy')) }}
			<tr>
				<td>
					{{ Form::label('category', 'Category') }}<br>
					{{ Form::select('category', $aCategories, ( isset($oVacancy) ? $oVacancy->category_id : null ), array('class' => 'form-control')) }} </a></li>
				</td>		
			</tr>			
			<tr>
				<td>
					{{ Form::label('company', 'Company') }}<br>
					{{ Form::select('company', $aCompany, ( isset($oVacancy) ? $oVacancy->company_id : null ), array('class' => 'form-control')) }}
				</td>
			</tr>
			<tr>
				<td>
					{{ Form::label('city', 'City') }}<br>
					{{ Form::select('city', $aRegions, ( isset($oVacancy) ? $oVacancy->city_id : null ), array('class' => 'form-control')) }}
				</td>
			</tr>
			<tr>
				<td>
					{{ Form::label('title', 'Title') }}<br>
					{{ Form::text('title', ( isset($oVacancy) ? $oVacancy->title : null ), ['class' => 'form-control']) }}
				</td>
			</tr>
			<tr>
				<td>
					{{ Form::label('Description', 'Description') }}<br>
					{{ Form::textarea('description', ( isset($oVacancy) ? $oVacancy->description : null ), ['class' => 'form-control']) }}
				</td>
			</tr>
			<tr>
				<td>
					{{ Form::submit('Save', array())}}
					{{ HTML::link( URL::route('vacancy-list'), 'To The List') }}
				</td>
			</tr>
		</table>
	</div>
	{{ Form::hidden('id', $id) }}
	{{ Form::close() }}
@stop