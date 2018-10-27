<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Report extends Model
{
    protected $fillable = ['month', 'description', 'user_id', 'created_at'];

    public function user(){
    	return $this->belongsTo(User::class, 'user_id');
    }
}
