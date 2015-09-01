<?php

class CompaniesController extends BaseController {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
        return View::make('companies.index');
	}

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function listItem()
	{
		$currUser = Auth::user()->id; 

		$oQuery = Companies::join('cities', 'cities.id', '=', 'city_id')
			->join('regions', 'regions.id', '=', 'cities.region_id')
			->join('country', 'country.id', '=', 'regions.country_id')
			->join('users', 'users.id', '=', 'companies.user_id')
			->select ('companies.id as id',
				'companies.phone', 
				'companies.email', 
				'companies.name', 
				'companies.web_site', 
				'companies.description',  
				'regions.name as region_name',
				'regions.id as region_id',
				'country.name as country_name',
				'users.name as user_name',
				'cities.name as city_name'
			);

		$aCompany = $oQuery->paginate(10);

		return View::make('/company/list', array(
			'aCompany'	 => $aCompany
		));

	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
        return View::make('companies.create');
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
        return View::make('companies.show');
	}

	/**
	 * Show the GET form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id = NULL)
	{
        $currUser 	= Auth::user();
        $oRegions 	= Regions::all();
        $oCity		= Cities::all();
		$aCompany 	= NULL;

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

		if ( $id > 0 ) {
			$aCompany = Companies::find($id);
		}

		if ($currUser->is_admin == 0 && (empty($aCompany) === false && $aCompany->user_id != $currUser->id)){
			return Redirect::route('company-list', array(
				'user_id' => $currUser->id
			));
		}

		return View::make('/company/edit', array(
			'aCompany' 	=> $aCompany,
			'aCity'		=> $aCity,
			'aRegions'	=> $aRegions,
			'currUser' 	=> $currUser,
			'id'		=> $id
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
		$validator = Validator::make(Input::all(), Companies::$rules);
 		
 		if ($validator->passes()) {
 			$id = Input::get('id');

 			if ( isset($id)  && $id > 0 ) {
 				$company = Companies::find($id);
 			} else {
 				$company = new Companies;
 			}	

		    $company->name 			= Input::get('name');
		    $company->description    = Input::get('description');
		    $company->city_id		= Input::get('city_id');
		    $company->phone		= Input::get('phone');
		    $company->email		= Input::get('email');
		    $company->web_site		= Input::get('web_site');
		    $company->user_id		= Auth::user()->id;
		    
		    $company->save();

		    return Redirect::route('company-list')
    			->with('message', 'Company has been added/changed.');   
		} else {
			return Redirect::route('company-edit')
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
		$currUser = Auth::user();
		$aCompany = Companies::find($id);

		if ($currUser->is_admin == 0 && $aCompany->user_id != $currUser->id){
			return Redirect::route('company-list', array(
				'user_id' => $currUser->id
			));
		}

		return View::make('/common/delete', array(
			'id' 		  => $id,
			'url' 		  => URL::route('company-delete'),
			'message'	  => 'Вы дейсвительно хотите удалить?',
			'backMessage' => 'Go to company list',
			'backUrl' 	  => URL::route('company-list'),
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
			$company = Companies::find($aData['id']);
			$company->delete();

			return Redirect::route('company-list')
        		->with('message', 'Компания успешно удален');
		}
		return Redirect::route('company-list')
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
