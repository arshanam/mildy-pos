<?php

/**
 * UserController
 * Provides common user operations logic.
 */
class UserController extends BaseController {

	/**
	 * Shows the login form.
	 *
	 * @return View
	 */
	public function showLogin()
	{
		return View::make('users.login');
	}

	/**
	 * Attemps to log the user in. If input does not match any, redirect it back.
	 * Otherwise, send user to main page.
	 *
	 * @return Redirect
	 */
	public function login()
	{
		$email = Input::get('email');
		$password = Input::get('password');
		if (Auth::attempt(array('email' => $email, 'password' => $password))) {
			return Redirect::to('/');
		}
		else
			return Redirect::back()->withInput()->with('message', trans('login.login_error'));
	}

	/**
	 * Logs out current user and destroy session data.
	 *
	 * @return Redirect
	 */
	public function logout()
	{
		if (Auth::check())
			Auth::logout();

		return Redirect::to('/');
	}

}