<?php

class StaffController extends \BaseController {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		$data['staffs'] = User::all();
		return View::make('staffs.index', $data);
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
		$data['edit'] = true;
		$data['staff'] = User::find($id);
		return View::make('staffs.form', $data);
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id)
	{
		$input = Input::all();
		$v = $this->validate2($input);

		if ($v->passes()) {
			$user = User::find($id);
			$user->username = $input['username'];
			$user->name = $input['name'];
			$user->email = $input['email'];
			$user->save();
			
			return Redirect::to('staffs')->with('message', trans('data.success_updated'));
		}
		else
			return Redirect::back()->withInput()->withErrors($v)->with('message', trans('error_saving'));
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		$staff = User::find($id);
		$staff->delete();

		return json_encode(array('success' => true));
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

	private function validate2($input)
	{
		$rules = array(
			'username' => 'required',
			'name' => 'required',
			'email' => 'required|email'
		);

		return Validator::make($input, $rules);
	}

}