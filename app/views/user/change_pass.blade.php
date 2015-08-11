@extends('layouts.default')

@section('content')

 	<ul>
 		@foreach($errors->all() as $error)
 		<li>
 			{{ $error }}
 		</li>
        @endforeach
    </ul>

{{ Form::open(array('url'=>URL::route('user-change_pass-post'), 'method'=>'POST',)) }}

	<table>
		<tr>
			<td>
				{{ Form::label('password', 'Password') }}
			</td>
		</tr>
		<tr>
			<td>
				{{ Form::password('password', ( isset($user) ? $user->password : null ), array('placeholder'=>'Password')) }}
			</td>
		</tr>
		<tr>
			<td>
				{{ Form::label('password_confirmation', 'Password Confirmation') }}
			</td>
		</tr>
		<tr>
			<td>
 			   {{ Form::password('password_confirmation', ( isset($user) ? $user->password : null ), array('placeholder'=>'Confirm Password')) }}
			</td>
		</tr>
		<tr>
			<td>
				{{ Form::submit('Save', array())}}
				{{ HTML::link( URL::route('user-list'), Auth::user()->is_admin == 1 ? 'Users': 'To The Form') }}
			</td>
		</tr>
	</table>

{{ Form::hidden('id', $id) }}
{{ Form::close() }}
	
@stop