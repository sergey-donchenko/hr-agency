<?php

use Illuminate\Database\Eloquent\SoftDeletingTrait;

class Companies extends Eloquent 
{
	use SoftDeletingTrait;

	protected $dates = ['deleted_at'];
	
	/**
	 * The database table used by the model.
	 *
	 * @var string
	 */
	protected $table = 'companies';

	public static $rules = array();
}
