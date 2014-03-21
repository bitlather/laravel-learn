<?php

use Illuminate\Auth\UserInterface;
use Illuminate\Auth\Reminders\RemindableInterface;

class User extends Eloquent implements UserInterface, RemindableInterface {

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
	protected $hidden = array('password');

	public static function boot()
	{
		parent::boot();

		# Add filters to creating a user
		User::creating(function($user)
		{
			$validator = Validator::make(array(
					'first_name' => $user->first_name,
					'last_name'  => $user->last_name,
					'password'   => $user->password,
					'email'      => $user->email
				), array(
					'first_name' => 'required',
					'last_name'  => 'required',
					'password'   => 'required|min:12',
					'email'      => 'required|email|unique:users'
				));

			if($validator->fails()){
				# Put validator in the user so router can access it
				$user->validator = $validator;
				unset($user->password);
				return false;
			}

			$user->password = Hash::make($user->password);

			return true;
		});
	}

	/**
	 * Get the unique identifier for the user.
	 *
	 * @return mixed
	 */
	public function getAuthIdentifier()
	{
		return $this->getKey();
	}

	/**
	 * Get the password for the user.
	 *
	 * @return string
	 */
	public function getAuthPassword()
	{
		return $this->password;
	}

	/**
	 * Get the e-mail address where password reminders are sent.
	 *
	 * @return string
	 */
	public function getReminderEmail()
	{
		return $this->email;
	}

}