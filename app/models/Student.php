<?php

class Student extends Eloquent {

    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'students';

    /**
     * Method helping to retrieve the courses of a teacher
     *
     * 
     */ 

    public function sessions()
    {
        return $this->belongsToMany('CourseSession', 'session_student', 'student_id', 'session_id')
                    ->withPivot('attendance_id','comment')
                    ->withTimestamps();
    }
    
    public function sessionsByCourse($course)
    {
        return $this->belongsToMany('CourseSession', 'session_student', 'student_id', 'session_id')
                    ->where('sessions.course_id','=',$course->id)
                    ->withPivot('attendance_id','comment')
                    ->get();
    }

    public function groups()
    {
        return $this->belongsToMany('Group')->withTimestamps();
    }

    public function level()
    {
        return $this->belongsTo('Level');
    }

    public function courses()
    {
        return $this->belongsToMany('Course')->withTimestamps();
    }


}