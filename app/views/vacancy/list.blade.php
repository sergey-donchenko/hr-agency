@extends('layouts.default')

@section('content')

	{{ HTML::link( URL::route('vacancy-new'), 'Add new vacancy', array('class' => 'btn btn-default btn-in-toolbar')) }}
	<div class="panel panel-default">
		<div class="panel-heading">Vacancies</div>
		<div class="panel-body"></div>
		<table class="table table-hover">
			<thead>
				<tr>
					<th>id</th>
					<th>name</th>
					<th>description</th>
					<th>category</th>
					<th>city</th>
					<th>company</th>
					<th>user</th>
					<th>action</th>
				</tr>
			</thead>
			@forelse($aVacancies as $vacancy)
			<tbody>
				<tr>
					<td>
						{{ $vacancy->id }}
					</td>
					<td>
						{{ $vacancy->title }}
					</td>
					<td>
						{{ $vacancy->description }}
					</td>
					<td>
						{{ $vacancy->category_name }}
					</td>
					<td>
						{{ $vacancy->city_name }}
					</td>
					<td>
						{{ $vacancy->company_name }}
					</td>
					<td>
						{{ $vacancy->user_name }}
					</td>
					<td>
						<div class="btn-group">
				    		<a class="btn btn-primary dropdown-toggle" data-toggle="dropdown" href="#"><span class="caret"></span></a>
				    		<ul class="dropdown-menu">
				    			<li>
				    				<a href="{{route('vacancy-edit', array('id' => $vacancy->id)) }}">Edit</a>
				    				<a href="{{route('vacancy-delete', array(
				    					'id'=>$vacancy->id), array(
				    					'class' => 'delete-item', 'attr-id' => $vacancy->id))}}">Delete</a>
				    			</li>
				    		</ul>
				    	</div>
					</td>
				</tr>
				@empty
			    <tr>
			    	<td colspan='4'>Нет вакансий</td>
			    </tr>
				@endforelse
			</tbody>
		</table>
	</div>
	<div class="text-center"><?php echo $aVacancies->links(); ?></div>
@stop