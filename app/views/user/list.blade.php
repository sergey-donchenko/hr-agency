@extends('layouts.default')

@section('content')
	<div class="panel panel-default">
		<div class="panel-heading">Users</div>
		<div class="panel-body"></div>
		<table class="table table-hover">
			<thead>
				<tr>
					<th>Id</th>
					<th>Name</th>
					<th>E-mail</th>
					<th>Phone</th>
					<th>City</th>
					<th>Admin</th>
					<th>Date registration</th>
					<th>actions</th>
				</tr>
			</thead>
			@forelse($aUsers as $user)
			<tbody>
			    <tr>
			    	<td>
			    		{{ $user->id }} 
				    </td>
				    <td>
				    	{{ $user->name }} 
				    </td>
				    <td>
				    	{{ $user->email }}
				    </td>
				    <td>
				    	{{ $user->phone }}
				    </td>
				    <td>
				    	{{ $user->city }}
				    </td>
				    <td>
				    	{{ $user->is_admin }}
				    </td>
				    <td>
				    	{{ $user->created_at }}
				    </td>
				    <td>
				    	<div class="btn-group">
				    		<a class="btn btn-primary dropdown-toggle" data-toggle="dropdown" href="#"><span class="caret"></span></a>
				    		<ul class="dropdown-menu">
				    			<li>
				    				<a href="{{route('user-edit', array('id'=>$user->id)) }}">Edit</a>
				    				<a href="{{route('user-delete', array('id'=>$user->id)) }}">Delete</a>
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
	<div class="text-center"><?php echo $aUsers->links(); ?></div>
@stop