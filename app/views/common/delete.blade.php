@extends('layouts.default')

@section('content')

	<div class="panel panel-default">
		<div class="panel-heading">Vacancy</div>
		<div class="panel-body"></div>
		<table class="table table-hover">
			{{ Form::open(array('url'=> $url , 'method'=>'POST', 'class'=>'form-delete')) }}
			<tr>
				<td>
					{{ $message }}
				</td>
			</tr>
			<tr>
				<td>
					{{ Form::submit('Yes', array())}}
					{{HTML::link ($backUrl, $backMessage)}}
				</td>
			</tr>
		{{ Form::hidden('id', $id) }}
		</table>
	</div>
	{{ Form::close() }}
@stop