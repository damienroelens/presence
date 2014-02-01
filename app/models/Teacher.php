<?php


use Illuminate\Auth\UserInterface;
use Illuminate\Auth\Reminders\RemindableInterface;

class Teacher extends Eloquent implements UserInterface, RemindableInterface {

    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'teachers';

    /**
     * The attributes excluded from the model's JSON form.
     *
     * @var array
     */
    protected $hidden = array('password');

    /**
     * Get the unique identifier for the user.
     *
     * @return mixed
     */
    public function getAuthIdentifier()
    {
        return $this->getKey();
    }

    /**
     * Get the password for the user.
     *
     * @return string
     */
    public function getAuthPassword()
    {
        return $this->password;
    }

    /**
     * Get the e-mail address where password reminders are sent.
     *
     * @return string
     */
    public function getReminderEmail()
    {
        return $this->email;
    }

    /**
     * Method helping to retrieve the courses of a teacher
     *
     * 
     */
    public function courses()
    {
        return $this->belongsToMany('Course')->withTimestamps();
    }

    public function students()
    {
        return $this->belongsToMany('Course')
                    ->join('course_student','courses.id','=','course_student.course_id')
                    ->join('students','course_student.student_id','=','students.id')
                    ->join('group_student','students.id','=','group_student.student_id')
                    ->join('groups','groups.id','=','group_student.group_id')
                    ->select('students.id as student_id', 
                             'students.name as student_name',
                             'students.first_name as student_first_name',
                             'students.slug as student_slug',
                             'students.photo as student_photo',
                             'groups.id as group_id',
                             'groups.name as group_name')
                    ->groupBy('students.id');
    }

    public function groups()
    {
        return $this->belongsToMany('Course')
                    ->join('course_student','courses.id','=','course_student.course_id')
                    ->join('students','course_student.student_id','=','students.id')
                    ->join('group_student','students.id','=','group_student.student_id')
                    ->join('groups','groups.id','=','group_student.group_id')
                    ->select('groups.id as group_id',
                             'groups.name as group_name')
                    ->groupBy('groups.id');
    }

}