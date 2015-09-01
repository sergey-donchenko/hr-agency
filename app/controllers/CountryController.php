<?php

class CountryController extends BaseController {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
        return View::make('countries.index');
	}

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function listItem()
	{
		$currUser = Auth::user(); 

		$oQuery = Countries::join('users', 'users.id', '=', 'user_id')
			->select ('country.id as id',
				'country.name', 
				'country.description',  
				'users.name as user_name',
				'users.id as user_id'
			);
		
		if ($currUser->is_admin == 0) {
			return Redirect::route('user-dashboard', array());
		}

		$aCountry = $oQuery->paginate(10);

		return View::make('/country/list', array(
			'aCountry'	 => $aCountry
		));

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
			'url' 		  => URL::route('country-delete'),
			'message'	  => 'Вы дейсвительно хотите удалить?',
			'backMessage' => 'Go to country List',
			'backUrl' 	  => URL::route('country-list'),
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
			$country = Countries::find($aData['id']);
			$country->delete();

			return Redirect::route('country-list')
        		->with('message', 'Страна успешно удален');
		}
		return Redirect::route('country-list')
        		->with('message', 'Произошла ошибка удаления');
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
        return View::make('countries.create');
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
        return View::make('countries.show');
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
		$aCountry 	= NULL;

		$aCountries['0'] = 'Root Node';
		foreach( $oCountries as $item ) {
			$aCountries[$item->id] = $item->name;
		}

		if ( $id > 0 ) {
			$aCountry = Countries::find($id);
		}

		if ($currUser->is_admin == 0){
			return Redirect::route('user-dashboard', array());
		}

		return View::make('/country/edit', array(
			'aCountry' => $aCountry,
			'currUser' => $currUser,
			'id'	   => $id
		));
	}

	/**
	 * Show the POTS form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function doSave()
	{
		$validator = Validator::make(Input::all(), Countries::$rules);
 		
 		if ($validator->passes()) {
 			$id = Input::get('id');

 			if ( isset($id)  && $id > 0 ) {
 				$country = Countries::find($id);
 			} else {
 				$country = new Countries;
 			}	

		    $country->name 			= Input::get('name');
		    $country->description   = Input::get('description');
		    $country->user_id		= Auth::user()->id;

		    $country->save();

		    return Redirect::route('country-list')
    			->with('message', 'Country has been added/changed.');   
		} else {
			return Redirect::route('country-edit')
    			->with('message', 'The following errors occurred')
	    		->withErrors($validator)
	    		->withInput();    
			
		}
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
