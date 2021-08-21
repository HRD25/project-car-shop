<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class steeringwheel extends Model
{
    protected $table = "steeringwheels";

    public function offers()
    {
        return $this->belongsTo(offer::class,'id','id_steeringwheel');
    }

    // SCOPE FUNCTION

    public function scopeSteeringwheel()
    {
        return steeringwheel::select(['id','name'])->get();
    }
}
