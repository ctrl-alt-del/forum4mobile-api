
<?php

class ReviewsController extends \BaseController {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index() {
		return Response::json(Review::all());
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store() {
		$rules = array(
			'topic_id'    => 'required', 
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
		$review = new Review;
		$review->topic_id = Input::get('topic_id');
		$review->content   	= Input::get('content');
		$review->user_id   	= Input::get('user_id');

		if ($review->save()) {
			return Response::json(array(
				'success'   => true,
				'error'     => false,
				'type'      => '201',
				'message'   => 'new review has created',
				));
		} else {
			return Response::json(array(
				'success'   => false,
				'error'     => true,
				'type'      => '403',
				'message'   => 'cannot create new review',
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