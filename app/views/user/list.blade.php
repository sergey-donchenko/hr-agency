@extends('layouts.default')

@section('content')

	<table border="1">
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

	@forelse($aUsers as $user)
	    
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
				{{ HTML::link( URL::route('user-edit', array('id'=>$user->id)),'Edit') }}
				{{ HTML::link( URL::route('user-delete', array('id'=>$user->id)),'Delete') }}
			</td>
		</tr>
	@empty
	   <tr>
	    	<td colspan='4'>Нет User-ов! =(</td>
	    </tr>
	@endforelse

	</ul>

@stop