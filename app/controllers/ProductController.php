<?php

class ProductController extends \BaseController {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		$data['products'] = Product::all();
		return View::make('products.index', $data);
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		return View::make('products.form');
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
			
			Product::create(Input::get());
			return Redirect::to('products')->with('message', trans('data.success_saved'));
		}
		else
			return Redirect::back()->withInput()->withErrors($v)->with('message', trans('data.error_saving'));
	}

	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
		$data['product'] = Product::find($id);
		return View::make('products.show', $data);
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
		$data['product'] = Product::find($id);
		return View::make('products.form', $data);
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id)
	{
		$input = Input::get();
		$v = $this->validate($input);

		if ($v->passes()) {
			Product::find($id)->update(Input::get());
			return Redirect::to('products')->with('message', trans('data.success_updated'));
		}
		else
			return Redirect::back()->withInput()->withErrors($v)->with('message', trans('data.error_saving'));
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		$product = Product::find($id);
		$product->delete();

		return json_encode(array('success' => true));
	}

	/**
	 * Validator before insert and update.
	 */
	private function validate($input)
	{
		$rules = array(
			'name' => 'required',
			'price' => 'required|numeric'
		);

		return Validator::make($input, $rules);
	}

}