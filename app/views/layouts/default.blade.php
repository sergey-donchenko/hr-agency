<!doctype html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Work.local</title>
	<link rel="stylesheet" href="/css/styles.min.css">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
	<script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
</head>
<body>
	 <div class="container-fluid">
	 	<div class="navbar-header">
	 		<a class="navbar-brand" href="/">Work.Local</a>
	 	</div>
	 	<div>
	 		<ul class="nav navbar-nav">
	 			<li><a><strong>|</strong></a></li>
				<li><a href="{{route('home') }}">Home</a></li>
				<li><a href="{{route('category-list') }}">Categories</a></li>
				<li><a href="{{route('vacancy-list') }}">Vacancies</a></li>
				<li><a href="{{route('company-list') }}">Companies</a></li>
				<li><a href="{{route('blog-list') }}">Blogs</a></li>
				<li><a href="{{route('page-list') }}">About</a></li>
			</ul>
			<ul class="nav navbar-nav navbar-right">
			@if(!Auth::check())
				<li><a href="{{route('login-link') }}">Login</a></li>
				<li><a href="{{route('registr') }}">Registr</a></li>
				@else
				<li><a href="{{route('user-dashboard') }}">Dashboard</a></li>
				<li><a href="{{route('logout') }}">Logout</a></li>
				<li><a><strong>|</strong></a></li>
				@if (Auth::user()->is_admin == 1)
				<li><a href="{{route('user-list') }}">Users</a></li>
				@else
				<li><a href="{{route('user-edit') }}">User Profile</a></li>
				@endif
				<li><a><strong>|</strong></a></li>
				<li><a><strong>Hi {{ Auth::user()->name }}</strong></a></li>
				<li><a><strong>|</strong></a></li>
			</ul>
			@endif
	</div>
	<br>
	<br>
	<br>
			
	<!-- Content section -->        
	<div class="container custom-container">
        @if(Session::has('message'))
            <p class="alert">{{ Session::get('message') }}</p>
        @endif
 
        @yield('content')
    </div>
     
	
	</div>
</body>
</html>
