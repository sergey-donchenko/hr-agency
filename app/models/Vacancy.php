<?php

use Illuminate\Database\Eloquent\SoftDeletingTrait;

class Vacancy extends Eloquent 
{
	use SoftDeletingTrait;

	protected $dates = ['deleted_at'];
	
	/**
	 * The database table used by the model.
	 *
	 * @var string
	 */
	protected $table = 'vacancies';
	
		
	public static $rules = array(
	    'title'=>'required|min:2',
	    'description'=>'required|min:20'
	);

}
