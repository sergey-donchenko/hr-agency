<?php

use Illuminate\Database\Eloquent\SoftDeletingTrait;

class Countries extends Eloquent 
{
	use SoftDeletingTrait;

	protected $dates = ['deleted_at'];
	
	/**
	 * The database table used by the model.
	 *
	 * @var string
	 */
	protected $table = 'country';

	public static $rules = array();
	
}
