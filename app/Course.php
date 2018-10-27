<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Course extends Model
{
    protected $fillable = ['name', 'description', 'user_id', 'day', 'time', 'place', 'numParticipants', 'public_id', 'img', 'average', 'planning_id', 'status'];

    public function user(){
    	return $this->belongsTo(User::class, 'user_id');
    }

    public function planning(){
    	return $this->belongsTo(Planning::class, 'planning_id');
    }

    public function images(){
        return $this->hasMany(Image::class);
    }

    public function participants(){
        return $this->hasMany(Participant::class);
    }

    public function attendace_lists(){
        return $this->hasMany(AttendanceList::class);
    }
}
