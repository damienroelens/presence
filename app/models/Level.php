<?php

class Level extends Eloquent {

    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'levels';

    /**
     * Method helping to retrieve the courses of a Level
     *
     * 
     */
    public function courses()
    {
        return $this->hasMany('Course');
    }

    public function students()
    {
        return $this->hasMany('Student');
    }

}