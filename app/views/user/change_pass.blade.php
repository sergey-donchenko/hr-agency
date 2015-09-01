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
		<div class="panel-heading">Change password</div>
		<div class="panel-body"></div>
		<table class="table table-hover">
			{{ Form::open(array('url'=>URL::route('user-change_pass-post'), 'method'=>'POST',)) }}
			<tr>
				<td>
					{{ Form::label('password', 'Password') }}<br>
					{{ Form::password('password', ['class' => 'form-control'], ( isset($user) ? $user->password : null ), array('placeholder'=>'Password')) }}
				</td>
			</tr>
			<tr>
				<td>
					{{ Form::label('password_confirmation', 'Password Confirmation') }}<br>
					{{ Form::password('password_confirmation', ['class' => 'form-control'], ( isset($user) ? $user->password : null ), array('placeholder'=>'Confirm Password')) }}
				</td>
			</tr>
			<tr>
				<td>
					{{ Form::submit('Save', array())}}
					{{ HTML::link( URL::route('user-list'), Auth::user()->is_admin == 1 ? 'Users': 'To The Form') }}
				</td>
			</tr>
		</table>
	</div>
	{{ Form::hidden('id', $id) }}
	{{ Form::close() }}
@stop