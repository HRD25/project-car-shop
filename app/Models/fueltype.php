<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
class fueltype extends Model
{
    protected $table = "fueltypes";

    public function offers()
    {
        return $this->belongsTo(offer::class,'id_fueltype','id');
    }

    //SCOPE FUNCTION

    public function scopeFuelType()
    {
        return fueltype::select(['id','name'])->get();
    }
}
