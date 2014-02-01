<?php

class CourseSession extends Eloquent {

    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'sessions';

    
    public function students()
    {
        return $this->belongsToMany('Student', 'session_student', 'session_id', 'student_id')
                    ->join('group_student','students.id','=','group_student.student_id')
                    ->join('groups','groups.id','=','group_student.group_id')
                    ->select('groups.id as group_id',
                             'groups.name as group_name')
                    ->withPivot('attendance_id','comment')
                    ->withTimestamps();
    }

    public function course()
    {
        return $this->belongsTo('Course');
    }

}