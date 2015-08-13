<?php

class VacancyController extends \BaseController {

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
		$aVacancies = Vacancy::all();

		return View::make('/vacancy/list', array('aVacancies' => $aVacancies));
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
		$oVacancy    = null; 

		foreach( $oCategories as $item ) {
			$aCategories[$item->id] = $item->name;
		}		
		
		if ( $id > 0 ) {
			$oVacancy = Vacancy::find( $id );
		}

		return View::make('/vacancy/edit', array(
			'aCategories'=> $aCategories,
			'oVacancy'	 => $oVacancy,
			'id' 		 => $id
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
		$validator = Validator::make(Input::all(), Vacancy::$rules);
 		
 		if ($validator->passes()) {
 			$id = Input::get('id');

 			if ( isset($id)  && $id > 0 ) {
 				$vacancy = Vacancy::find($id);
 			} else {
 				$vacancy = new Vacancy;
 			}	

		    $vacancy->title    	  = Input::get('title');
		    $vacancy->description = Input::get('description');
		    $vacancy->category_id = Input::get('category');
		    $vacancy->city 		  = Input::get('city');

		    $vacancy->save();

		    return Redirect::route('vacancy-list')
    			->with('message', 'Vacancy was changed successfully.');   
		} else {
			return Redirect::route('vacancy-edit')
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
			'id' 	      => $id,
			'url' 		  => URL::route('vacancy-delete-post'),
			'message' 	  => 'Вы дейсвительно хотите удалить?',
			'backMessage' => 'Go to Vacancies List',
			'backUrl' 	  => URL::route('vacancy-list'),
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
			$vacancy = Vacancy::find($aData['id']);
			$vacancy->delete();

			return Redirect::route('vacancy-list')
        		->with('message', 'Вакансия успешно удалена');
		}
		return Redirect::route('vacancy-list')
        		->with('message', 'Произошла ошибка удаления');
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
