<?php

use Illuminate\Auth\UserTrait;
use Illuminate\Auth\UserInterface;
use Illuminate\Auth\Reminders\RemindableTrait;
use Illuminate\Auth\Reminders\RemindableInterface;

class User extends Eloquent implements UserInterface, RemindableInterface {

	use UserTrait, RemindableTrait;

	/**
	 * The database table used by the model.
	 *
	 * @var string
	 */
	protected $table = 'users';

	/**
	 * The attributes excluded from the model's JSON form.
	 *
	 * @var array
	 */
	protected $hidden = array('password', 'remember_token');

	/**
	*
	*
	*/
	public static $rules = array(
	    'name'=>'required|alpha|min:2',
	    'email'=>'required|email|unique:users',
	    'password'=>'required|alpha_num|between:6,12|confirmed',
	    'password_confirmation'=>'required|alpha_num|between:6,12'
	    
    );

	/**
	*
	*
	*/
	public static $rul = array();

	/**
	 * The attributes excluded from the change password form.
	 *
	 * @var array
	 */
	public static $change_pass = array(
	    'password'=>'required|alpha_num|between:6,12|confirmed',
	    'password_confirmation'=>'required|alpha_num|between:6,12'
	);

}