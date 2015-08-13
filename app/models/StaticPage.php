<?php

use Illuminate\Database\Eloquent\SoftDeletingTrait;

class StaticPage extends Eloquent 
{
	use SoftDeletingTrait;

	protected $dates = ['deleted_at'];
	
	/**
	 * The database table used by the model.
	 *
	 * @var string
	 */
	protected $table = 'static_page';

	public static $rules = array(
		'title'				=> 'required|min:2',
		'meta_description'	=> 'min:4',
		'meta_keywords'		=> 'min:2',
		'description'		=> 'required|min:20'

	);

}
