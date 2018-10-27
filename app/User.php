<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'age', 'cellphone', 'address', 'password', 'position_id', 'course_id', 'pay', 'average', 'career', 'degree', 'level'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * Relación muchos a muchos entre Usuario y Departamento.
     */
    public function position(){
        return $this->belongsTo(Position::class, 'position_id');
    }

    public function planning(){
        return $this->hasMany(Planning::class, 'user_id');
    }

    public function course(){
        return $this->hasMany(Course::class, 'user_id');
    }

    public function reports(){
        return $this->hasMany(Report::class, 'user_id');
    }
}
