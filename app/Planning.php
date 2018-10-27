<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Planning extends Model
{
    protected $fillable = ['course_name', 'background', 'delimitation', 'solution', 'requerements', 'diffusion', 'evaluation', 'user_id'];

    protected $table = 'planning';

    public function user(){
    	return $this->belongsTo(User::class, 'user_id');
    }

    public function sessions(){
        return $this->hasMany(Session::class);
    }

    public function course(){
    	return $this->hasOne(Course::class);
    }
}
