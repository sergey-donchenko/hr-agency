<?php

class PageController extends \BaseController {

	/*
	|--------------------------------------------------------------------------
	| Default Static Page Controller
	|--------------------------------------------------------------------------
	|
	| You may wish to use controllers instead of, or in addition to, Closure
	| based routes. That's great! Here is an example controller method to
	| get you started. To route to this controller, just add the route:
	|
	|	Route::get('/', 'PageController@showWelcome');
	|
	*/
	public function listItem()
	{
		$currUser = Auth::user();

		$oQuery = StaticPage::join('users', 'users.id', '=', 'user_id')
			->select ('static_page.id as id',
				'static_page.title',
				'static_page.url',
				'static_page.description',  
				'users.name as user_name'
			);
		$aPage = $oQuery->paginate(10);

		return View::make('/page/list', array(
			'aPage'	 => $aPage));

	}

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
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id = NULL)
	{
		$currUser = Auth::user('name');
		$aPage 	  = StaticPage::find($id);
		$oPage    = null;
	
		if ( $currUser->is_admin == 0){
			return Redirect::route('page-list', array());
		}
		if ($id > 0 ){
			$aPage = StaticPage::find($id);
		}
		return View::make('/page/edit', array(
			'aPage'	   => $aPage,
			'currUser' => $currUser,
			'id'	   => $id ));
	}
	
	/**
	 * POST Form for save the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function doSave()
	{
		$validator = Validator::make(Input::all(), StaticPage::$rules);
 		
 		if ($validator->passes()) {
 			$id = Input::get('id');

 			if ( isset($id)  && $id > 0 ) {
 				$page = StaticPage::find($id);
 			} else {
 				$page = new StaticPage;
 			}	

		    $page->user_id 			= Auth::user()->id;
		    $page->title    	  	= Input::get('title');
		    $page->meta_keywords 	= Input::get('meta_keywords');
		    $page->meta_description = Input::get('meta_description');
		    $page->url 				= Input::get('url');
		    $page->description 		= Input::get('description');

		    $page->save();

		    return Redirect::route('page-list')
    			->with('message', 'Static Page was changed successfully.');   
		} else {
			return Redirect::route('page-edit')
    			->with('message', 'The following errors occurred')
	    		->withErrors($validator)
	    		->withInput();    
			
		}
	}

	/**
	 * GET Form for delete the specified resource.
	 *
	 * @return Response
	 */
	public function delete($id=NULL)
	{
		$currUser = Auth::user();

		if ($currUser->is_admin == 0) {
			return Redirect::route('page-list', array());
		}

		return View::make('/common/delete', array(
			'id' 		  => $id,
			'url' 		  => URL::route('page-delete'),
			'message'	  => 'Вы дейсвительно хотите удалить?',
			'backMessage' => 'Go to Page List',
			'backUrl' 	  => URL::route('page-list'),
		));
	}

	/**
	 * POST Form for delete the specified resource.
	 *
	 * @return Response
	 */
	public function doDelete()
	{
		$aData=Input::all();	
		if (isset($aData['id'])) 
		{
			$static_page = StaticPage::find($aData['id']);
			$static_page->delete();

			return Redirect::route('page-list')
        		->with('message', 'Static page removed');
		}
		return Redirect::route('page-list')
        		->with('message', 'Произошла ошибка удаления');
	}

}
