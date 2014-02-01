<?php

class Year extends Eloquent {

    /**
     * The database table used by the model.
     *
     * 
     */
    protected $table = 'years';

    /**
     * Method helping to retrieve the Courses of a Year
     *
     * 
     */
    public function courses()
    {
        return $this->hasMany('Course');
    }
}