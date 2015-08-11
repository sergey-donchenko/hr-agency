@extends('layouts.default')

@section('content')

 	<ul>
 		@foreach($errors->all() as $error)
 		<li>
 			{{ $error }}
 		</li>
        @endforeach
    </ul>

{{ Form::open(array('url'=>URL::route('user-save-post'), 'method'=>'POST',)) }}

	<table>
		<tr>
			<td>
				{{ Form::label('name', 'Name') }}
			</td>
		</tr>
		<tr>
			<td>
				{{ Form::text('name', ( isset($oUser) ? $oUser->name : null ), array('placeholder'=>'Name')) }}
			</td>
		</tr>
		<tr>
			<td>
				{{ Form::label('city', 'City') }}
			</td>
		</tr>
		<tr>
			<td>
				{{ Form::text('city', ( isset($oUser) ? $oUser->city : null ), array('placeholder'=>'city')) }}
			</td>
		</tr>
		<tr>
			<td>
				{{ Form::label('phone', 'Phone') }}
			</td>
		</tr>
		<tr>
			<td>
				{{ Form::text('phone', ( isset($oUser) ? $oUser->phone : null ), array('placeholder'=>'Phone')) }}
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
		<tr>
			<td>
			</td>
		</tr>
	</table>

{{ Form::hidden('id', $id) }}
{{ Form::close() }}
@stop