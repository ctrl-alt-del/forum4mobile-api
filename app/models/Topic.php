<?php

class Topic extends Eloquent {
    
    protected $appends = array('location');
    protected $hidden = array();

    public function getLocationAttribute() {
        return URL::to('api/v1/topics/' . $this->id);
    }

    public function user() {
        return $this->belongsTo('User');
    }
