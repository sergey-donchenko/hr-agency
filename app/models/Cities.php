<?php

use Illuminate\Database\Eloquent\SoftDeletingTrait;

class Cities extends Eloquent 
{
	use SoftDeletingTrait;

	protected $dates = ['deleted_at'];
	
	/**
	 * The database table used by the model.
	 *
	 * @var string
	 */
	protected $table = 'cities';

	public static $rules = array();
	
}