<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Attendance extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'participant_id', 'attendance_list_id', 'attendance',
    ];

    protected $table = 'attendance';

    public function participant(){
        return $this->belongsTo(Participant::class);
    }

    public function attendance_list(){
        return $this->belongsTo(AttendanceList::class, 'attendance_list_id');
    }
}
