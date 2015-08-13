<!doctype html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Laravel PHP Framework</title>
</head>
<body>
	<div class="navigation">
		<ul>
			<li><a href="{{ URL::route('home') }}">Home</a></li>			
			
			@if(!Auth::check())
				<li>{{ HTML::link( URL::route('login-link'), 'Login') }}</li>
				<li>{{ HTML::link( URL::route('registr'), 'Registr') }}</li>
			@else
                <li>{{ HTML::link( URL::route('user-dashboard'), 'Dashboard') }}</li>
                <li>{{ HTML::link( URL::route('logout'), 'Logout') }}</li>
		</ul>
		<ul>
			<li>
				<h3>You are logged in as {{ Auth::user()->name }}</h3>
			</li>
		</ul>
            @endif	
	</div>	

	<h1>Work.local</h1>		

	<!-- Content section -->        
	<div class="container">
        @if(Session::has('message'))
            <p class="alert">{{ Session::get('message') }}</p>
        @endif
 
        @yield('content')
    </div>
     
	
	</div>
</body>
</html>
