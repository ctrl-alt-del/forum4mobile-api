<?php

class TopicsController extends \BaseController {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index() {
		return Response::json(Topic::all());
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store() {
		$rules = array(
			'title'	   => 'required',
			'description'    => 'required', 
			'content' => 'required',
			'user_id' => 'required'
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
		
		// store
		$topic = new Topic;
		$topic->title 		= Input::get('title');
		$topic->description = Input::get('description');
		$topic->content   	= Input::get('content');
		$topic->user_id   	= Input::get('user_id');

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
	public function destroy($id) {
		//
	}
}