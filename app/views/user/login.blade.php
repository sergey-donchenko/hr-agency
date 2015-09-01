@extends('layouts.default')

@section('content')
	
	<div class="panel panel-default">
		<div class="panel-heading">Log In</div>
		<div class="panel-body"></div>
		<table class="table table-hover">
			{{ Form::open(array('url'=>URL::route('login-post'), 'method'=>'POST', 'class'=>'form-login')) }}
			<tr>
				<td>			
					<label for="email">Email address:</label><br>
					{{ Form::text('email', null, ['class' => 'form-control']) }}
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
					<button type="submit" class="btn btn-default">Login</button>
				</td>
			</tr>
		</table>
	</div>
	{{ Form::close() }}
@stop