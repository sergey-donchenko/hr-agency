@extends('layouts.default')

@section('content')

 	<ul>
 		@foreach($errors->all() as $error)
 		<li>
 			{{ $error }}
 		</li>
        @endforeach
    </ul>

{{ Form::open(array('url'=>URL::route('page-save-post'), 'method'=>'POST', 'class'=>'form-page')) }}

	<table>
		<tr>
			<td>
				{{ Form::label('title', 'Title') }}
			</td>
		</tr>
		<tr>
			<td>
				{{ Form::text('title', ( isset($aPage) ? $aPage->title : null ), array('placeholder'=>'Title')) }}
			</td>
		</tr>
		<tr>
			<td>
				{{ Form::label('meta_keywords', 'Meta Keywords') }}
			</td>
		</tr>
		<tr>
			<td>
				{{ Form::text('meta_keywords', ( isset($aPage) ? $aPage->meta_keywords : null ), array('placeholder'=>'Meta Keywords')) }}
			</td>
		</tr>
		<tr>
			<td>
				{{ Form::label('meta_description', 'Meta Description') }}
			</td>
		</tr>
		<tr>
			<td>
				{{ Form::text('meta_description', ( isset($aPage) ? $aPage->meta_description : null ), array('placeholder'=>'Meta Description')) }}
			</td>
		</tr>
		<tr>
			<td>
				{{ Form::label('Description', 'Description') }}
			</td>
		</tr>
		<tr>
			<td>
				{{ Form::textarea('description', ( isset($aPage) ? $aPage->description : null ), array('placeholder'=>'Description')) }}
			</td>
		</tr>
		<tr>
			<td>
				{{ Form::submit('Save', array())}}
				{{ HTML::link( URL::route('page-list'), 'To The List') }}
			</td>
		</tr>
		
	</table>
{{ Form::hidden('id', $id) }}
{{ Form::close() }}
	
@stop