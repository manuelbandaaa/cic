<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Image extends Model
{
    protected $fillable = [
        'model_type', 'model_id', 'url', 'public_id', 'created_at',
    ];

    public function event(){
        return $this->belongsTo(Event::class, 'model_id');
    }

    public function course(){
        return $this->belongsTo(Course::class);
    }
}
