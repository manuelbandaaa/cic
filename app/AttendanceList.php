<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class AttendanceList extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'course_id', 'date',
    ];

    protected $table = 'attendance_list';

    public function course(){
        return $this->belongsTo(Course::class, 'course_id');
    }

    public function attendance_list(){
        return $this->hasMany(Attendance::class, 'attendance_id');
    }
}
