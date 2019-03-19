<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
	public function postRegistration(Request $request)
	{
		$this->validate($request, [
			'email' => 'required|email|unique:users',
			'first_name' => 'required|max:120',
			'password' => 'required|min:4'
		]);                                             //Registration form validation + error messages

		$email = $request['email'];
		$first_name = $request['first_name'];
		$password = bcrypt($request['password']); //encrypting password

		$user = new User();
		$user->email = $email;
		$user->first_name = $first_name;
		$user->password = $password;

		$user->save();

		Auth::login($user);

		return redirect()->route('articles');
	}

		public function postLogin(Request $request)
	{
		$this->validate($request, [
			'email' => 'required',
			'password' => 'required'
		]);												//Login form validation + error messages

		if (Auth::attempt(['email' => $request['email'], 'password' => $request['password']])) 
		{
			return redirect()->route('articles');
		}
		return redirect()->back();
	}

	public function getLogout()
	{
		Auth::logout();
		return redirect()->route('articles');
	}
}
