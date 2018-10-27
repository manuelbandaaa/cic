<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Event extends Model
{
    protected $fillable = ['title', 'description', 'img', 'public_id', 'created_at'];

    public function images(){
        return $this->hasMany(Image::class, 'model_id');
    }
}
