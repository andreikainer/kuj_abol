<?php namespace App\Services;

use App\User;
use Validator;
use Illuminate\Contracts\Auth\Registrar as RegistrarContract;

class Registrar implements RegistrarContract {

	/**
	 * Get a validator for an incoming registration request.
	 *
	 * @param  array  $data
	 * @return \Illuminate\Contracts\Validation\Validator
	 */
	public function validator(array $data)
	{
		return Validator::make($data, [
			'user_name' => 'required|regex:/^[a-zA-zÀ-ž0-9_-]{3,16}$/|unique:users_tbl',
			'email'     => 'required|email|max:255|unique:users_tbl',
			'password'  => 'required|confirmed|min:6',
            'password_confirmation' => 'required',
            'first_name' => 'required|regex:/^[a-zA-ZÀ-ž]+([\sa-zA-ZÀ-ž]+)*$/',
            'last_name'  => 'required|regex:/^[a-zA-ZÀ-ž]+([\sa-zA-ZÀ-ž]+)*$/',
            'business_name' => 'required_if:business_yes,1|max:255',
		]);
	}

	/**
	 * Create a new user instance after a valid registration.
	 *
	 * @param  array  $data
	 * @return User
	 */
	public function create(array $data)
	{
        $confirmation_code = str_random(30);
		return User::create([
			'user_name' => $data['user_name'],
			'email' => $data['email'],
			'password' => bcrypt($data['password']),
            'first_name' => $data['first_name'],
            'last_name'  => $data['last_name'],
            'business_name' => ($data['business_name']) ? $data['business_name'] : NULL,
            'confirmation_code' => $confirmation_code,
		]);
	}

}
