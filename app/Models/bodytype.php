<?php

namespace App\Models;

use App\Models\offer;
use Illuminate\Database\Eloquent\Model;

class bodytype extends Model
{
    protected $table = 'bodytypes';

    public function offers()
    {
        return $this->belongsTo(offer::class, 'id_bodytype', 'id');
    }
}
