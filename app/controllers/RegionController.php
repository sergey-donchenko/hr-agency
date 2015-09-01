<?php

class RegionController extends BaseController {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
        return View::make('regions.index');
	}

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function listItem()
	{
		$id = Auth::user()->id;

		if ($currUser->is_admin == 0) {
			return Redirect::route('user-dashboard', array());
		}

		$oQuery = Regions::join('country', 'country.id', '=', 'country_id')
			->select ('regions.id as id',
				'regions.name', 
				'regions.description',  
				'country.name as country_name',
				'country.id as country_id'
			);


		$aRegion = $oQuery->paginate(10);

		return View::make('/region/list', array(
			'aRegion'	 => $aRegion
		));

	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
        return View::make('regions.create');
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
        return View::make('regions.show');
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
        $oCountries  = Countries::all();
		$aRegion 	 = NULL;

		foreach( $oCountries as $item ) {
			$aCountries[$item->id] = $item->name;
		}

		if ( $id > 0 ) {
			$aRegion = Regions::find($id);
		}

		if ($currUser->is_admin == 0){
			return Redirect::route('user-dashboard', array());

		}

		return View::make('/region/edit', array(
			'aRegion'	 => $aRegion,
			'aCountries' => $aCountries,
			'currUser'   => $currUser,
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
		$validator = Validator::make(Input::all(), Regions::$rules);
 		
 		if ($validator->passes()) {
 			$id = Input::get('id');

 			if ( isset($id)  && $id > 0 ) {
 				$regions = Regions::find($id);
 			} else {
 				$regions = new Regions;
 			}	

		    $regions->name 			= Input::get('name');
		    $regions->description   = Input::get('description');
		    $regions->country_id	= Input::get('country');
		    
		    $regions->save();

		    return Redirect::route('region-list')
    			->with('message', 'Region has been added/changed.');   
		} else {
			return Redirect::route('region-edit')
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
			return Redirect::route('user-dashboard', array());
		}

		return View::make('/common/delete', array(
			'id' 		  => $id,
			'url' 		  => URL::route('region-delete'),
			'message'	  => 'Вы дейсвительно хотите удалить?',
			'backMessage' => 'Go to region list',
			'backUrl' 	  => URL::route('region-list'),
		));
	}

	/**
	 * POST Form for doDelete the specified resource.
	 *
	 * @return Response
	 */
	public function doDelete()
	{
		$aData=Input::all();	
		if (isset($aData['id'])) 
		{
			$region = Regions::find($aData['id']);
			$region->delete();

			return Redirect::route('region-list')
        		->with('message', 'Область успешно удалена');
		}
		
		return Redirect::route('region-list')
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
