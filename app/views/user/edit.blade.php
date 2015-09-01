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
		<div class="panel-heading">User</div>
		<div class="panel-body"></div>
		<table class="table table-hover">
			{{ Form::open(array('url'=>URL::route('user-save-post'), 'method'=>'POST',)) }}
			<tr>
				<td>
					{{ Form::label('name', 'Name') }}<br>
					{{ Form::text('name', ( isset($oUser) ? $oUser->name : null ), ['class' => 'form-control']) }}
				</td>
			</tr>
			<tr>
				<td>
					{{ Form::label('city', 'City') }}<br>
					{{ Form::text('city', ( isset($oUser) ? $oUser->city : null ), ['class' => 'form-control']) }}
				</td>
			</tr>
			<tr>
				<td>
					{{ Form::label('phone', 'Phone') }}<br>
					{{ Form::text('phone', ( isset($oUser) ? $oUser->phone : null ), ['class' => 'form-control']) }}
				</td>
			</tr>
			<tr>
				<td>
					{{ Form::submit('Save', array())}}
					@if (Auth::user()->is_admin == 1 )
					{{ HTML::link( URL::route('user-list'), 'To The List') }}
					@endif
					|
					{{ HTML::link( URL::route('user-change_pass', array('id'=>$oUser->id)), 'Change Password') }}
				</td>
			</tr>
		</table>
	</div>
	{{ Form::hidden('id', $id) }}
	{{ Form::close() }}
@stop