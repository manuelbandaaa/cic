<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Session extends Model
{
    protected $fillable = [
        'title', 'date', 'description', 'materials', 'planning_id',
    ];

    public function planning(){
        return $this->belongsTo(Planning::class);
    }
}
