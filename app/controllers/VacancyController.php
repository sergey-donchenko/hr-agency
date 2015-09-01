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
		$currUser = Auth::user()->id;
		$oQuery = Vacancy::join('categories', 'categories.id', '=', 'category_id')
		->join('users', 'users.id', '=', 'vacancies.user_id')
		->join('companies', 'companies.id', '=', 'vacancies.company_id')
		->join('cities', 'cities.id', '=', 'vacancies.city_id')
			->select ('vacancies.id as id',    
				'title', 
				'vacancies.description',
				'companies.id as company_id',
				'companies.name as company_name',
				'categories.name as category_name',
				'users.name as user_name',
				'categories.id as category_id',
				'cities.name as city_name'
			);

		if (Auth::user()->is_admin == 0 ) {
			$aVacancies = $oQuery
				->where('vacancies.user_id','=', $currUser);
				$aVacancies = $oQuery->paginate(10);
		} else {
			$aVacancies = $oQuery->paginate(10);
		}

		return View::make('/vacancy/list', array(
			'aVacancies' => $aVacancies,
			'currUser' 	 => $currUser
		));

	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id = NULL)
	{
		$currUser	 = Auth::user();
		$oCategories = Category::all();
		$oCity		 = Cities::all();
		$oVacancy    = null; 

		if ( $id > 0 ) {
			$oVacancy = Vacancy::find($id);
		}
			
		foreach( $oCategories as $item ) {
			$aCategories[$item->id] = $item->name;
		}

		if ( Auth::user()->is_admin == 0 ) {
		 $aCompanies = Companies::where(
		 	'user_id', '=', $currUser->id)
			->get();
		} else {
			$aCompanies = Companies::all();
		}
		
		foreach( $aCompanies as $item ) {
			$aCompany[$item->id] = $item->name;
		}

		$oQuery = Regions::join('country', 'country.id', '=', 'country_id')
			->select ('regions.id as id',
				'regions.name', 
				'country.name as country_name',
				'country.id as country_id'
			);

		if ($oRegions = $oQuery->get());

		foreach( $oRegions as $item) {
			$aRegions[$item->country_name] = array();
			$aCity = Cities::where('region_id','=', $item->id)
				->get();
			foreach ( $aCity as $city) {
				$aRegions[$item->name][$city->id] = $city->name;
			}
		}

		if ($currUser->is_admin == 0 && (empty($oVacancy) === false && $oVacancy->user_id != $currUser->id)){
			return Redirect::route('vacancy-list', array(
				'user_id' => $currUser->id
			));
		}

		return View::make('/vacancy/edit', array(
			'currUser'	 => $currUser,
			'aCategories'=> $aCategories,
			'aCompany'	 => $aCompany,
			'aRegions'	 => $aRegions,
			'oVacancy'	 => $oVacancy,
			'id' 		 => $id
		));
	}

	/**
	 * POST Form for save the specified resource.
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
		    $vacancy->company_id  = Input::get('company');
		    $vacancy->city_id	  = Input::get('city');
   		    $vacancy->user_id	  = Auth::user()->id;

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
	 * GET Display a delete of the resource.
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
	 * POST Display a doDelete of the resource.
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
