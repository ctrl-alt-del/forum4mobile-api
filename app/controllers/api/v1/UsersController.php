<?php

class UsersController extends \BaseController {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		// return Response::json(array(
		// 	'error' => true,
		// 	'type' => '404',
		// 	));
		return Response::json(User::all());
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store() {

		$rules = array(
			'name'	   => 'required|alphaNum|min:5',
			'email'    => 'required|email', 
			'password' => 'required|alphaNum|min:6' 
			);

		// run the validation rules on the inputs from the form
		$validator = Validator::make(Input::all(), $rules);

		// if the validator fails, redirect back to the form
		if ($validator->fails()) {
			return Response::json(array(
				'success'   => false,
				'error'     => true,
				'type'      => '403',
				'message'   => $validator->message()->all(),
				));
		}
		
		$userWithGivenName = User::where('name','=', Input::get('name'))->first();
		if ($userWithGivenName != null) {
			return Response::json(array(
				'success'   => false,
				'error'     => true,
				'type'      => '403',
				'message'   => 'Name used',
				));
		}

		$userWithGivenEmail = User::where('email','=', Input::get('email'))->first();
		if ($userWithGivenEmail != null) {
			return Response::json(array(
				'success'   => false,
				'error'     => true,
				'type'      => '403',
				'message'   => 'Email used',
				));
		}

		// store
		$user = new User;
		$user->uuid 		= uniqid("", true);
		$user->name  		= Input::get('name');
		$user->email   		= Input::get('email');
		$user->password   	= Hash::make(Input::get('password'));


		if ($user->save()) {
			return Response::json(array(
				'success'   => true,
				'error'     => false,
				'type'      => '201',
				'message'   => 'new user has created',
				));
		} else {
			return Response::json(array(
				'success'   => false,
				'error'     => true,
				'type'      => '403',
				'message'   => 'cannot create new user',
				));
		}
	}


	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id) {
		$user = User::find($id);
		if ($user == null) {
			return Response::json(array(
				'success'   => false,
				'error'     => true,
				'type'      => '403',
				'message'   => 'no user',
				));
		}
		return Response::json($user);
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
}