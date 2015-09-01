<?php

use Illuminate\Database\Eloquent\SoftDeletingTrait;

class Blog extends Eloquent 
{
	use SoftDeletingTrait;

	protected $dates = ['deleted_at'];
	
	/**
	 * The database table used by the model.
	 *
	 * @var string
	 */
	protected $table = 'blogs';

	public static $rules = array(
		'title'				=> 'min:2',
		'description'		=> 'min:20',
		'tags'				=> ''
		);
	
}
