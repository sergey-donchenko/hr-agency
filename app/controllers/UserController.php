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
     * Method to render the GEt login FORM
    */
	public function login()
	{
		return View::make('user/login');
	}
 	
 	/**
     * Method to render the POST doLogin FORM
    */
	public function doLogin() 
	{
		$aParams = Input::all();
		
		if ( Auth::attempt(array(
			'email' 	=> $aParams['email'],
			'password'  => $aParams['password'] )) ) {
	    	return Redirect::route('user-dashboard')
	    		->with('message', 'You are now logged!');
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
     * Method to render the GET register FORM
    */
	public function registr()
	{
		return View::make('user/registr');
	}
	 	
 	/**
     * Method to render the POST doRegistr FORM
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
	 * Show the form for dashboard.
	 *
	 * @return Response
	 */
	public function dashboard()
	{
		return View::make('user/dashboard');
	}
	
	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function listItems()
	{
		$currUser = Auth::user();
		$oUser    = null; 

		if ( $currUser->is_admin == 0 ){
			return Redirect::route('user-edit', array(
				'id' => $currUser->id
			));
		} else {
		$oUsers = User::paginate(10);
	}
		return View::make('/user/list', array(
			'aUsers' => $oUsers
			));
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
	public function edit($id = NULL)
	{
		$currUser = Auth::user();
		$oUser    = null;
		if ( $currUser->is_admin == 0 && $id != $currUser->id){
			return Redirect::route('user-edit', array(
				'id' => $currUser->id
			));

		}
		if ($id > 0 ){
			$oUser = User::find($id);
		}
		return View::make('/user/edit', array(
			'oUser' => $oUser,
			'id'    => $id ));
	}

	/**
	 * Show the GET form for Chang_Password the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function change_pass($id = NULL)
	{
		$currUser = Auth::user();
		$oUser    = null; 
		if ( $currUser->is_admin == 0 && $id != $currUser->id){
			return Redirect::route('user-change_pass', array(
				'id' => $currUser->id
			));
		}
		if ($id > 0 ){
			$oUser = User::find($id);
		}
		return View::make('/user/change_pass', array(
			'oUser'  => $oUser,
			'id'	 => $id 
			));
	}

	/**
	 * Show the form POST for doChang_Password the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function doChange_pass()
	{
		$validator = Validator::make(Input::all(), User::$change_pass);
 		
 		if ($validator->passes()) {
 			$id = Input::get('id');
 			if ( isset($id) && $id > 0 ) {
 				$user = User::find($id);
 			} 	
		    $user->password = Hash::make(Input::get('password'));
		    $user->save();

		    return Redirect::route('user-change_pass')
    			->with('message', 'Password was changed successfully.');   
		} else {
			return Redirect::route('user-change_pass')
    			->with('message', 'The following errors occurred')
	    		->withErrors($validator)
	    		->withInput();    
			}
	}

	/**
	 * Show the POST form for doSave the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function doSave()
	{
		$validator = Validator::make(Input::all(), User::$rul);
 		
 		if ($validator->passes()) {
 			$id = Input::get('id');
 			if ( isset($id) && $id > 0 ) {
 				$user = User::find($id);
 			} else {
 				$user = new User;
 			}	

		    $user->name  = Input::get('name');
		    $user->city  = Input::get('city');
		    $user->phone = Input::get('phone');

		    $user->save();

		    return Redirect::route('user-dashboard')
    			->with('message', 'User was changed successfully.');   
		} else {
			return Redirect::route('user-dashboard')
    			->with('message', 'The following errors occurred')
	    		->withErrors($validator)
	    		->withInput();    
			
		}
	}

	/**
	* Show the GET form for delete the specified resource.
	*
	* @param  int  $id
	* @return Response
	*/
	public function delete($id=NULL)
	{
		return View::make('/common/delete', array(
			'id'  		  => $id,
			'url' 		  => URL::route('user-delete-post'),
			'message' 	  => 'Вы дейсвительно хотите удалить?',
			'backMessage' => 'Go to User List',
			'backUrl' 	  => URL::route('user-list'),
		));
	}

	/**
	* Show the POST form for doDelete the specified resource.
	*
	* @param  int  $id
	* @return Response
	*/
	public function doDelete()
	{
		$aData=Input::all();	
		if (isset($aData['id'])) 
		{
			$user = User::find($aData['id']);
			$user->delete();

			return Redirect::route('user-dashboard')
        		->with('message', 'Пользователь успешно удален');
		}
		return Redirect::route('user-list')
        		->with('message', 'Произошла ошибка удаления');
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
