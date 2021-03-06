<?php

class CategoryController extends \BaseController {

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
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function listItems()
	{
		$oQuery = Category::join('users', 'users.id', '=', 'user_id')
			->select ('categories.id as id',    
				'categories.name', 
				'categories.description',
				'users.name as user_name'
			);

		$aCategories = $oQuery->paginate(10);
		
		return View::make('/category/list', array(
			'aCategories' => $aCategories
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
	 * Show the GET form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id = NULL)
	{
		$currUser	 = Auth::user();
		$oCategories = Category::all();
		$oCategory   = null; 

		$aCategories['0'] = 'Root Node';
		
		foreach( $oCategories as $item ) {
			$aCategories[$item->id] = $item->name;
		}		
		
		if ( $id > 0 ) {
			$oCategory = Category::find( $id );
		}

		if ($currUser->is_admin == 0 && (empty($oCategory) === false && $oCategory->user_id != $currUser->id)){
			return Redirect::route('category-list', array(
				'user_id' => $currUser->id
			));
		}

		return View::make('/category/edit', array(
			'aCategories'=> $aCategories,
			'oCategory' => $oCategory,
			'id' => $id
		));
	}

	/**
	 * Show the POST form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function doSave()
	{
		$validator = Validator::make(Input::all(), Category::$rules);
 		
 		if ($validator->passes()) {
 			$id = Input::get('id');

 			if ( isset($id)  && $id > 0 ) {
 				$category = Category::find($id);
 			} else {
 				$category = new Category;
 			}	

		    $category->name 		= Input::get('name');
		    $category->description  = Input::get('description');
		    $category->parent_id 	= Input::get('category');
   		    $category->user_id		= Auth::user()->id;

		    $category->save();

		    return Redirect::route('category-list')
    			->with('message', 'Category was changed successfully.');   
		} else {
			return Redirect::route('category-edit')
    			->with('message', 'The following errors occurred')
	    		->withErrors($validator)
	    		->withInput();    
			
		}
	}

	/**
	 * Form for GET  delete the specified resource.
	 *
	 * @return Response
	 */
	public function delete($id=NULL)
	{
		$currUser  = Auth::user();
		$aCategory = Category::find($id);

		if ($currUser->is_admin == 0 && $aCategory->user_id != $currUser->id){
			return Redirect::route('category-list', array(
				'user_id' => $currUser->id
			));
		}

		return View::make('/common/delete', array(
			'id' => $id,
			'url' => URL::route('category-delete-post'),
			'message' => 'Вы дейсвительно хотите удалить?',
			'backMessage' => 'Go to Category List',
			'backUrl' => URL::route('category-list'),
		));
	}

	/**
	 * Form for POST  delete the specified resource.
	 *
	 * @return Response
	 */
	public function doDelete()
	{
		$aData=Input::all();	
		if (isset($aData['id'])) 
		{
			$category = Category::find($aData['id']);
			$category->delete();

			return Redirect::route('category-list')
        		->with('message', 'Вакансия успешно удалена');
		}
		return Redirect::route('category-list')
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
