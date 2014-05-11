<?php

class Topic extends Eloquent {

    // protected $guarded = array('id');
    // public static $rules = array(
    //     'user_id' => 'required|exists:users,id',
    //     'title' => 'min:3',
    //     'description' => 'min:3',
    //     'content' => 'min:3',
    // );
    
    protected $appends = array('location', 'concerns_count');//'user', 'responses_count','concerns_count');
    protected $hidden = array('concerns');

    // /**
    //  * @return mixed
    //  */
    // public function validate() {
    //     return Validator::make($this->toArray(), self::$rules);
    // }

    // public function responses() {
    //     return $this->hasMany('Response');
    // }

    public function concerns() {
        return $this->hasMany('Concern');
    }

    // public function includeResponses() {
    //     $this->hidden = array_diff($this->hidden, array('responses'));
    // }

    // public function getResponsesCount() {
    //     return count($this->responses);
    // }

    public function getConcernsCountAttribute() {
        return count($this->concerns);
    }

    public function getLocationAttribute() {
//        return URL::to('products?' . 'upc=' . $this->upc);
        return URL::to('api/v1/topics/' . $this->id);
    }

	// public function getImageAttribute($image)
	// {
	// 	return URL::to('images/'.$image);
	// }

    public function user() {
        return $this->belongsTo('User');
    }

}
