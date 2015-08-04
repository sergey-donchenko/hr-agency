@extends('layouts.default')

@section('content')

{{ Form::open(array('url'=>URL::route('registr-post'), 'method'=>'POST', 'class'=>'form-registr')) }}
    <ul>
        @foreach($errors->all() as $error)
            <li>{{ $error }}</li>
        @endforeach
    </ul>
 
    
    {{ Form::text('name', null, array('placeholder'=>'Name')) }}
    {{ Form::text('email', null, array('placeholder'=>'Email')) }}
    {{ Form::password('password', array('placeholder'=>'Password')) }}
    {{ Form::password('password_confirmation', array('placeholder'=>'Confirm Password')) }}
    {{ Form::text('phone namber', null, array('placeholder'=>'Phone')) }}
    {{ Form::text('city', null, array('placeholder'=>'City')) }}
 
    {{ Form::submit('Registr', array())}}
{{ Form::close() }}

@stop
