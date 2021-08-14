<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class bodytype extends Model
{
    public function offers()
    {
        return $this->belongsTo(offer::class, 'id_bodytype', 'id');
    }
}
