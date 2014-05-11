<?php

class Review extends Eloquent {

    // protected $guarded = array('id');
    // public static $rules = array(
    //     'user_id' => 'required|exists:users,id',
    //     'title' => 'min:3',
    //     'description' => 'min:3',
    //     'content' => 'min:3',
    // );

    protected $appends = array('location', 'votes_count');
    protected $hidden = array();

    // /**
    //  * @return mixed
    //  */
    // public function validate() {
    //     return Validator::make($this->toArray(), self::$rules);
    // }

    // public function reviews() {
    //     return $this->hasMany('Review');
    // }

    public function votes() {
        return $this->hasMany('Vote');
    }

    // public function includeReviews() {
    //     $this->hidden = array_diff($this->hidden, array('responses'));
    // }

    // public function getReviewsCountAttribute() {
    //     return count($this->responses);
    // }

    public function getVotesCountAttribute() {
        return count($this->votes);
    }

    public function getLocationAttribute() {
//        return URL::to('products?' . 'upc=' . $this->upc);
        return URL::to('api/v1/reviews/' . $this->id);
    }

	// public function getImageAttribute($image)
	// {
	// 	return URL::to('images/'.$image);
	// }

    public function topic() {
        return $this->belongsTo('Topic');
    }

    public function user() {
        return $this->belongsTo('User');
    }

}
