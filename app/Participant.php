<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Participant extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'age', 'cellphone', 'address', 'course_id',
    ];

    public function course(){
        return $this->belongsTo(Course::class, 'course_id');
    }

    public function attendances(){
        return $this->hasMany(Attendance::class);
    }
}
