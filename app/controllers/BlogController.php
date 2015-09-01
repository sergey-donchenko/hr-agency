<?php

class BlogController extends \BaseController {

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
		$currUser = Auth::user()->id; 

		$oQuery = Blog::join('users', 'users.id', '=', 'user_id')
			->select ('blogs.id as id',
				'title', 
				'description', 
				'blogs.created_at as blog_create_at', 
				'users.name as user_name',
				'users.id as user_id'
			);

		if (Auth::user()->is_admin == 0 ) {
			$aBlog = $oQuery
				->where('user_id','=', $currUser);
				$aBlog = $oQuery->paginate(10);
		} else {
			$aBlog = $oQuery->paginate(10);
		}

		return View::make('/blog/list', array(
			'aBlog'	 => $aBlog
		));

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
	 * Show the GET form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id = NULL)
	{
		$currUser = Auth::user();
		$aBlog	  = NULL;

		if ( $id > 0 ) {
			$aBlog 	  = Blog::find($id);
		}

		if ($currUser->is_admin == 0 && (empty($aBlog) === false && $aBlog->user_id != $currUser->id)){
			return Redirect::route('blog-list', array(
				'user_id' => $currUser->id
			));
		}

		return View::make('/blog/edit', array(
			'aBlog'	   => $aBlog,
			'currUser' => $currUser,
			'id'	   => $id
		));
	}
	
	/**
	 * Form for POST save the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function doSave()
	{
		$validator = Validator::make(Input::all(), Blog::$rules);
 		
 		if ($validator->passes()) {
 			$id = Input::get('id');

 			if ( isset($id)  && $id > 0 ) {
 				$blog = Blog::find($id);
 			} else {
 				$blog = new Blog;
 			}	

		    $blog->title    	  	= Input::get('title');
		    $blog->description 		= Input::get('description');
		    $blog->tags				= Input::get('tags');
		    $blog->user_id 			= Auth::user()->id;

		    $blog->save();

		    return Redirect::route('blog-list')
    			->with('message', 'Blog was changed successfully.');   
		} else {
			return Redirect::route('blog-edit')
    			->with('message', 'The following errors occurred')
	    		->withErrors($validator)
	    		->withInput();    
			
		}
	}

	/**
	 * Form for GET delete the specified resource.
	 *
	 * @return Response
	 */
	public function delete($id=NULL)
	{
		return View::make('/common/delete', array(
			'id' 		  => $id,
			'url' 		  => URL::route('blog-delete'),
			'message'	  => 'Вы дейсвительно хотите удалить?',
			'backMessage' => 'Go to Page List',
			'backUrl' 	  => URL::route('blog-list'),
		));
	}

	/**
	 * Form for POST doDelete the specified resource.
	 *
	 * @return Response
	 */
	public function doDelete()
	{
		$aData=Input::all();	
		if (isset($aData['id'])) 
		{
			$blog = Blog::find($aData['id']);
			$blog->delete();

			return Redirect::route('blog-list')
        		->with('message', 'Блог успешно удален');
		}
		return Redirect::route('blog-list')
        		->with('message', 'Произошла ошибка удаления');
	}

}
