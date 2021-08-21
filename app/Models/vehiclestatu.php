<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class vehiclestatu extends Model
{
    protected $table = "vehiclestatus";

    public function offers()
    {
        return $this->belongsTo(offer::class,'id','id_vehiclestatus');
    }

}
