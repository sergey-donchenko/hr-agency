<?php

class CityController extends BaseController {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
        return View::make('cities.index');
	}

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function listItem()
	{
		$currUser = Auth::user();

		if ($currUser->is_admin == 0) {
			return Redirect::route('user-dashboard', array());
		}

		$oQuery = Cities::join('regions', 'regions.id', '=', 'region_id')
			->join('country', 'country.id', '=', 'country_id')
			->join('users', 'users.id', '=', 'user_id')
			->select ('cities.id as id',
				'cities.name', 
				'cities.description',  
				'regions.name as region_name',
				'regions.id as region_id',
				'country.name as country_name',
				'users.name as user_name'
			);
		
		$aCity = $oQuery->paginate(10);

		return View::make('/city/list', array(
			'aCity'	 => $aCity
		));

	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
        return View::make('cities.create');
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
        return View::make('cities.show');
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
        $oCountries = Countries::all();
        $oRegions 	= Regions::all();
		$aCity 		= NULL;
		
		foreach( $oCountries as $item) {
			$aCountries[$item->name] = array();
			$aRegions = Regions::where('country_id','=', $item->id)
				->get();
			foreach ( $aRegions as $region) {
				$aCountries[$item->name][$region->id] = $region->name;
			}
		}

		if ( $id > 0 ) {
			$aCity = Cities::find($id);
		}

		if ($currUser->is_admin == 0) {
			return Redirect::route('user-dashboard', array());
		}

		return View::make('/city/edit', array(
			'aCity' 	 => $aCity,
			'aCountries' => $aCountries,
			'oRegions'	 => $oRegions,
			'currUser' 	 => $currUser,
			'id'		 => $id
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
		$validator = Validator::make(Input::all(), Cities::$rules);
 		
 		if ($validator->passes()) {
 			$id = Input::get('id');

 			if ( isset($id)  && $id > 0 ) {
 				$cities = Cities::find($id);
 			} else {
 				$cities = new Cities;
 			}	

		    $cities->name 			= Input::get('name');
		    $cities->description    = Input::get('description');
		    $cities->region_id		= Input::get('region');
		    
		    $cities->save();

		    return Redirect::route('city-list')
    			->with('message', 'Region has been added/changed.');   
		} else {
			return Redirect::route('city-edit')
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
		$currUser = Auth::user();

		if ($currUser->is_admin == 0) {
			return Redirect::route('user-dashboard', array());
		}
		
		return View::make('/common/delete', array(
			'id' 		  => $id,
			'url' 		  => URL::route('city-delete'),
			'message'	  => 'Вы дейсвительно хотите удалить?',
			'backMessage' => 'Go to city list',
			'backUrl' 	  => URL::route('city-list'),
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
			$city = Cities::find($aData['id']);
			$city->delete();

			return Redirect::route('city-list')
        		->with('message', 'Город успешно удален');
		}
		return Redirect::route('city-list')
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
