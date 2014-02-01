<?php

class Course extends Eloquent {

    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'courses';

    /**
     * Method helping to retrieve the Year of a Course
     *
     * 
     */
    public function year()
    {
        return $this->belongsTo('Year');
    }

    /**
     * Method helping to retrieve the Level of a Course
     *
     * 
     */
    public function level()
    {
        return $this->belongsTo('Level');
    }

    /**
     * Method helping to retrieve the Teachers of a Course
     *
     * 
     */
    public function teachers()
    {
        return $this->belongsToMany('Teacher')->withTimestamps();
    }

    public function students()
    {
        return $this->belongsToMany('Student')->withTimestamps();
    }

    public function sessions()
    {
        return $this->hasMany('CourseSession');
    }

}