<?php

class Group extends Eloquent {

    protected $table = 'groups';

    
    public function students()
    {
        return $this->belongsToMany('Student');
    }
}