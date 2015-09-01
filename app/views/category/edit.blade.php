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
		<div class="panel-heading">Category</div>
		<div class="panel-body"></div>
		<table class="table table-hover">
			{{ Form::open(array('url'=>URL::route('category-save-post'), 'method'=>'POST', 'class'=>'form-category')) }}
			<tr>
				<td>
					{{ Form::label('parent category', 'Parent Category') }}<br>
					{{ Form::select('category', $aCategories, ( isset($oVacancy) ? $oVacancy->category_id : null ), array('class' => 'form-control')) }}
				</td>
			</tr>
			<tr>
				<td>
					{{ Form::label('name', 'Name') }}<br>
					{{ Form::text('name', ( isset($oCategory) ? $oCategory->name : null ), ['class' => 'form-control']) }}
				</td>
			</tr>
			<tr>
				<td>
					{{ Form::label('description', 'Description') }}<br>
					{{ Form::textarea('description', ( isset($oCategory) ? $oCategory->description : null ), ['class' => 'form-control']) }}
				</td>
			</tr>
			<tr>
				<td>
					{{ Form::submit('Save', array())}}
					{{ HTML::link( URL::route('category-list'), 'To The List') }}
				</td>
			</tr>
		</table>
	</div>
	{{ Form::hidden('id', $id) }}
	{{ Form::close() }}
@stop