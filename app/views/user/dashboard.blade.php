@extends('layouts.default')

@section('content')

	<ul>
		<li>
			{{ HTML::link( URL::route('vacancy-list'), 'Vacancy') }}
		</li>
		<li>
			{{ HTML::link( URL::route('category-list'), 'Category') }}
		</li>
		<li>
			{{ HTML::link( URL::route('user-list'), Auth::user()->is_admin == 1 ? 'Users': 'User Profile') }}
		</li>
	</ul>
	<ul>
		<li>
			{{ HTML::link( URL::route('page-list'), 'Static') }}
		</li>
		<li>
			{{ HTML::link( URL::route('company-list'), 'Companies') }}
		</li>
		<li>
			{{ HTML::link( URL::route('blog-list'), 'Blog') }}
		</li>
		@if (Auth::user()->is_admin == 1)
		<li>
			{{ HTML::link( URL::route('country-list'), 'Country') }}
		</li>
		<li>
			{{ HTML::link( URL::route('region-list'), 'Region') }}
		</li>
		<li>
			{{ HTML::link( URL::route('city-list'), 'City') }}
		</li>
		@endif
	</ul>
@stop