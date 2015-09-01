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
		<div class="panel-heading">Static page</div>
		<div class="panel-body"></div>
		<table class="table table-hover">
			{{ Form::open(array('url'=>URL::route('page-save-post'), 'method'=>'POST', 'class'=>'form-page')) }}
			<tr>
				<td>
					{{ Form::label('title', 'Title') }}<br>
					{{ Form::text('title', ( isset($aPage) ? $aPage->title : null ), ['class' => 'form-control']) }}
				</td>
			</tr>
			<tr>
				<td>
					{{ Form::label('meta_keywords', 'Meta Keywords') }}<br>
					{{ Form::text('meta_keywords', ( isset($aPage) ? $aPage->meta_keywords : null ), ['class' => 'form-control']) }}
				</td>
			</tr>
			<tr>
				<td>
					{{ Form::label('meta_description', 'Meta Description') }}<br>
					{{ Form::text('meta_description', ( isset($aPage) ? $aPage->meta_description : null ), ['class' => 'form-control']) }}
				</td>
			</tr>
				<td>
					{{ Form::label('url', 'URL') }}<br>
					{{ Form::text('url', ( isset($aPage) ? $aPage->url : null ), ['class' => 'form-control']) }}
				</td>
			</tr>
			<tr>
				<td>
					{{ Form::label('Description', 'Description') }}<br>
					{{ Form::textarea('description', ( isset($aPage) ? $aPage->description : null ), ['class' => 'form-control']) }}
				</td>
			</tr>
			<tr>
				<td>
					{{ Form::submit('Save', array())}}
					{{ HTML::link( URL::route('page-list'), 'To The List') }}
				</td>
			</tr>
		</table>
	</div>
	{{ Form::hidden('id', $id) }}
	{{ Form::close() }}
@stop