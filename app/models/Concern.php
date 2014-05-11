<?php

class Concern extends Eloquent {
    
    protected $appends = array('location');//'user', 'responses_count','concerns_count');
    protected $hidden = array();

   

    public function getLocationAttribute() {
        return URL::to('api/v1/concerns/' . $this->id);
    }

    public function user() {
        return $this->belongsTo('User');
    }

     public function topic() {
        return $this->belongsTo('Topic');
    }

}
