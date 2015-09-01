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
		<div class="panel-heading">Blog</div>
		<div class="panel-body"></div>
		<table class="table table-hover">
			{{ Form::open(array('url'=>URL::route('blog-save-post'), 'method'=>'POST', 'class'=>'form-blog')) }}
			<tr>
				<td>
					{{ Form::label('title', 'Title') }}<br>
					{{ Form::text('title', ( isset($aBlog) ? $aBlog->title : null ), ['class' => 'form-control']) }}
				</td>
			</tr>
			<tr>
				<td>
					{{ Form::label('tags', 'Tags') }}<br>
					{{ Form::text('tags', ( isset($aBlog) ? $aBlog->tags : null ), ['class' => 'form-control']) }}
				</td>
			</tr>
			<tr>
				<td>
					{{ Form::label('Description', 'Description') }}<br>
					{{ Form::textarea('description', ( isset($aBlog) ? $aBlog->description : null ), ['class' => 'form-control']) }}
				</td>
			</tr>
			<tr>
				<td>
					{{ Form::submit('Save', array())}}
					{{ HTML::link( URL::route('blog-list'), 'To The List') }}
				</td>
			</tr>
		</table>
	</div>
	{{ Form::hidden('id', $id) }}
	{{ Form::close() }}
@stop