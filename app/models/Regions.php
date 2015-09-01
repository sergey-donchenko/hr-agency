<?php

use Illuminate\Database\Eloquent\SoftDeletingTrait;

class Regions extends Eloquent 
{
	use SoftDeletingTrait;

	protected $dates = ['deleted_at'];
	
	/**
	 * The database table used by the model.
	 *
	 * @var string
	 */
	protected $table = 'regions';

	public static $rules = array();
	
}
