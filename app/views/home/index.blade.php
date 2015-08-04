@extends('layouts.default')

@section('content')
<ul>
	@forelse($aCategories as $category)
	    <li>{{ $category->name }} ==> {{ $category->description }} </li>
	@empty
	    <li>Нет категорий</li>
	@endforelse

</ul>
@stop