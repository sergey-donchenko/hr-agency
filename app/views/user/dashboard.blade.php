@extends('layouts.default')

@section('content')

<ul>
	<li>{{ HTML::link( URL::route('vacancy-list'), 'Vacancy') }}</li>
	<li>{{ HTML::link( URL::route('category-list'), 'Category') }}</li>
	<li>{{ HTML::link( URL::route('user-list'), Auth::user()->is_admin == 1 ? 'Users': 'User Profile') }}</li>
</ul>
@stop