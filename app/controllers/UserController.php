<?php

class UserController extends BaseController {

	public function showLogin()
	{
		return View::make('users.login');
	}

	public function login()
	{
		if (Auth::attempt(array('email' => $email, 'password' => $password))) {
			return Redirect::to('/');
		}
		else
			return Redirect::back()->withInput()->with('message', trans('login.login_error'));
	}

	public function logout()
	{
		if (Auth::check())
			Auth::logout();

		return Redirect::to('/');
	}

}