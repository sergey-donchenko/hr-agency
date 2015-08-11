@extends('layouts.default')

@section('content')

{{ Form::open(array('url'=> $url , 'method'=>'POST', 'class'=>'form-delete')) }}
	{{ $message }}
	{{ Form::submit('Yes', array()) }}
	{{ Form::hidden('id', $id) }}

	{{HTML::link ($backUrl, $backMessage)}}
	
{{ Form::close() }}

	
@stop