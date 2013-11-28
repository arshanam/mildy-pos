<?php

class SalesController extends \BaseController {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		return View::make('sales.index');
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		return View::make('sales.form');
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
		if ($this->validate(Input::get())->passes()) {
			Sales::create(Input::get());
			return Redirect::to('sales')->with('message', trans('data.success_saved'));
		}
		else
			return Redirect::back()->with_input->with_errors->with('message', trans('data.error_saving'));
	}

	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
		$data['sales'] = Sales::find($id);
		return View::make('sales.show');
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		$data['sales'] = Sales::find($id);
		return View::make('sales.form', $data);
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id)
	{
		if ($this->validate(Input::get())->passes()) {
			Sales::find($id)->update(Input::get());
			return Redirect::to('sales')->with('message', trans('data.success_updated'));
		}
		else
			return Redirect::back()->with_input->with_errors->with('message', trans('data.error_saving'));
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		$sales = Sales::find($id);
		$sales->delete();

		return Redirect::to('sales')->with('message', trans('data.success_deleted'));
	}

	/**
	 * Validator before insert and update.
	 */
	private function validate($input)
	{
		$rules = array();

		return Validator::make($input, $rules);
	}

}