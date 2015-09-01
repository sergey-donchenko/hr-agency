@extends('layouts.default')

@section('content')

	
	{{ HTML::link( URL::route('blog-new'), 'New Blog', array('class' => 'btn btn-default btn-in-toolbar')) }}

	<div class="panel panel-default">
		<div class="panel-heading">Blogs</div>
		<div class="panel-body"></div>
		<table class="table table-hover">
			<thead>
				<tr>
					<th>Title</th>
					<th>Description</th>
					<th>Date of creation</th>
					<th>User name</th>
					<th>Action</th>
				</tr>
			</thead>
			@forelse($aBlog as $blog)
			<tbody>
				<tr>
					<td>
						{{ $blog->title }} 
					</td>
					<td>
						{{ $blog->description }}
					</td>
					<td>
						{{ $blog->blog_create_at }}
					</td>
					<td>
						{{ $blog->user_name }}
					</td>
					<td>
						<div class="btn-group">
							<a class="btn btn-primary dropdown-toggle" data-toggle="dropdown" href="#"><span class="caret"></span></a>
							<ul class="dropdown-menu">
								<li>
									<a href="{{route('blog-edit', array('id' => $blog->id)) }}">Edit</a>
									<a href="{{route('blog-delete', array('id' => $blog->id)) }}">Delete</a>
								</li>
							</ul>
						</div>
					</td>
				</tr>
			@empty
			@endforelse
			</tbody>
		</table>
	</div>
	<div class="text-center"><?php echo $aBlog->links(); ?></div>
@stop