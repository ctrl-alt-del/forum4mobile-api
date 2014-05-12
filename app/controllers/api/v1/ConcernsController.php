<?php

class ConcernsController extends \BaseController {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index() {
		return Response::json(Concern::all());
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store() {
		$rules = array(
			'topic_id'	=> 'required',
			'user_id' 	=> 'required'
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

		$concern = Concern::where('user_id','=',$user_id)->where('topic_id','=',$topic_id)->get();
		if ($concern != null) {
			return Response::json(array(
				'success'   => false,
				'error'     => true,
				'type'      => '403',
				'message'   => 'you had expressed your concern',
				));
		}

		// store
		$concern = new Concern;
		$concern->topic_id   	= Input::get('topic_id');
		$concern->user_id   	= Input::get('user_id');

		if ($topic->save()) {
			return Response::json(array(
				'success'   => true,
				'error'     => false,
				'type'      => '201',
				'message'   => 'new topic has created',
				));
		} else {
			return Response::json(array(
				'success'   => false,
				'error'     => true,
				'type'      => '403',
				'message'   => 'cannot create new topic',
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
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id) {
		
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
