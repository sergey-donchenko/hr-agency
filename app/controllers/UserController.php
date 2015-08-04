<?php

class UserController extends \BaseController {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		//
	}

    /**
     * Method to render the login FORM
    */
	public function login()
	{
		return View::make('user/login');
	}
 	
 	/**
     * Method to render the doLogin FORM
    */
	public function doLogin() 
	{
		$aParams = Input::all();
		
		if ( Auth::attempt(array('email' => $aParams['email'], 'password' => $aParams['password'] )) ) {
	    	return Redirect::route('user-dashboard')->with('message', 'You are now logged in!');
		} else {			
    		return Redirect::route('login-link')
        		->with('message', 'Your username/password combination was incorrect')
        		->withInput();
		}
	}

	/**
     * Method to render the doLogin FORM
    */
	public function doLogout() 
	{
		Auth::logout();

    	return Redirect::route('login-link')
    		->with('message', 'Your are now logged out!');
	}
	
	/**
     * Method to render the register FORM
    */
	public function registr()
	{
		return View::make('user/registr');
	}
 	
 	/**
     * Method to render the validation FORM
    */
 	public function doRegistr() {
    	$validator = Validator::make(Input::all(), User::$rules);
 		
 		if ($validator->passes()) {
 			$user = new User;

		    $user->name     = Input::get('name');
		    $user->email    = Input::get('email');
		    $user->phone    = Input::get('phone');
		    $user->city     = Input::get('city');
		    $user->password = Hash::make(Input::get('password'));
		    $user->save();
 		
 		    return Redirect::route('login-link')
 		    	->with('message', 'Thanks for registering!');
        
    	} else {
    		return Redirect::route('registr')
    			->with('message', 'The following errors occurred')
	    		->withErrors($validator)
	    		->withInput();    
    	}    
	}
	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function dashboard()
	{
		die('Dashboard!!!!');
	}
	
	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		//
	}


	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
		//
	}


	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
		//
	}


	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		//
	}


	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id)
	{
		//
	}


	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		//
	}


}
