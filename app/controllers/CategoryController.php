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
		$aCateories = Category::all();

		return View::make('/category/list', array('aCategories' => $aCateories));
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
		$oCategories = Category::all();
		$oCategory   = null; 

		$aCategories['0'] = 'Root Node';
		foreach( $oCategories as $item ) {
			$aCategories[$item->id] = $item->name;
		}		
		
		if ( $id > 0 ) {
			$oCategory = Category::find( $id );
		}

		return View::make('/category/edit', array(
			'aCategories'=> $aCategories,
			'oCategory' => $oCategory,
			'id' => $id
		));
	}

	/**
	 * Show the form for editing the specified resource.
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

		    $category->name    	  = Input::get('name');
		    $category->description = Input::get('description');
		    $category->parent_id = Input::get('category');
		    
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
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function delete($id=NULL)
	{
		return View::make('/common/delete', array(
			'id' => $id,
			'url' => URL::route('category-delete-post'),
			'message' => 'Вы дейсвительно хотите удалить?',
			'backMessage' => 'Go to Category List',
			'backUrl' => URL::route('category-list'),
		));
	}

	/**
	 * Display a listing of the resource.
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
