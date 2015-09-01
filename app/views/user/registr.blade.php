@extends('layouts.default')
@section('content')
    <ul>
        @foreach($errors->all() as $error)
        <li>{{ $error }}</li>
        @endforeach
    </ul>

    <div class="panel panel-default">
        <div class="panel-heading">Registr</div>
        <div class="panel-body"></div>
        <table class="table table-hover">
            {{ Form::open(array('url'=>URL::route('registr-post'), 'method'=>'POST', 'class'=>'form-getRemind')) }}
            <tr>
                <td>
                    <label for="name">You Name:</label><br> 
                    {{ Form::text('name', null, ['class' => 'form-control']) }}
                </td>
            </tr>
            <tr>
                <td>
                    <label for="email">Email address:</label><br>
                    {{ Form::text('email', null, ['class' => 'form-control']) }}
                </td>
            </tr>
            <tr>
                <td>
                    <label for="phone">Phone number:</label><br>
                    {{ Form::text('phone', null, ['class' => 'form-control']) }}
                </td>
            </tr>
            <tr>
                <td>
                    <label for="city">City:</label><br>
                    {{ Form::text('city', null, ['class' => 'form-control']) }}
                </td>
            </tr>
            <tr>
                <td>
                    <label for="pwd">Password:</label><br>
                    {{ Form::password('password', ['class' => 'form-control']) }}
                </td>
            </tr>
            <tr>
                <td>
                    <label for="confirm_pwd">Confirm Password:</label><br>
                    {{ Form::password('password_confirmation', ['class' => 'form-control']) }}
                </td>
            </tr>
            <tr>
                <td>
                    <button type="submit" class="btn btn-default">Registr</button>
                </td>
            </tr>
        </table>
    </div>
    {{ Form::close() }}
@stop