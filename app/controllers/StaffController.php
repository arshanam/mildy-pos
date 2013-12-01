<?php

class StaffController extends \BaseController {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		return View::make('staffs.index');
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		return View::make('staffs.form');
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
		$input = Input::get();
		$v = $this->validate($input);

		if ($v->passes()) {
			unset($input['_token']);

			$user = new User;
			$user->username = $input['username'];
			$user->password = Hash::make($input['password']);
			$user->name = $input['name'];
			$user->email = $input['email'];
			$user->save();
			return Redirect::to('staffs')->with('message', 'Data has been successfully saved.');
		}else{
			return Redirect::back()->withInput()->withErrors($v);
		}		
	}

	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
		//
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		//
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id)
	{
		//
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		//
	}

	private function validate($input)
	{
		$rules = array(
			'username' => 'required',
			'password' => 'required',
			'name' => 'required',
			'email' => 'required|email'
		);

		return Validator::make($input, $rules);
	}

}