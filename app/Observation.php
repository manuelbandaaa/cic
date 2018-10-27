<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Observation extends Model
{
    protected $fillable = ['obs', 'type_id', 'type'];
    public $timestamps = true;
}
