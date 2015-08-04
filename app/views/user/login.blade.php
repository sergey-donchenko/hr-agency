@extends('layouts.default')

@section('content')

{{ Form::open(array('url'=>URL::route('login-post'), 'method'=>'POST', 'class'=>'form-login')) }}
     
    {{ Form::text('email', null, array('placeholder'=>'Email Address')) }}
    {{ Form::password('password', array('placeholder'=>'Password')) }}
 
    {{ Form::submit('Login', array())}}
{{ Form::close() }}

@stop