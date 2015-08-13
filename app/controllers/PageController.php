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
		$aPage = StaticPage::all();

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
		$aPage = StaticPage::find($id);
		$oPage    = null;
		if ( $currUser->is_admin == 0 && $id != $currUser->id){
			return Redirect::route('page-edit', array(
				'user_id' => $currUser->id
			));
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
	 * Form for save the specified resource.
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
	 * Form for delete the specified resource.
	 *
	 * @return Response
	 */
	public function delete($id=NULL)
	{
		return View::make('/common/delete', array(
			'id' 		  => $id,
			'url' 		  => URL::route('page-delete'),
			'message'	  => 'Вы дейсвительно хотите удалить?',
			'backMessage' => 'Go to Page List',
			'backUrl' 	  => URL::route('page-list'),
		));
	}

	/**
	 * Form for delete the specified resource.
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
        		->with('message', 'Вакансия успешно удалена');
		}
		return Redirect::route('page-list')
        		->with('message', 'Произошла ошибка удаления');
	}

}
