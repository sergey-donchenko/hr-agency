<?php

use Illuminate\Database\Eloquent\SoftDeletingTrait;

class Category extends Eloquent 
{
	use SoftDeletingTrait;

	protected $dates = ['deleted_at'];
	
	/**
	 * The database table used by the model.
	 *
	 * @var string
	 */
	protected $table = 'categories';
	
	
	public static $rules = array(
	    'name'=>'required|min:2',

	);
}
