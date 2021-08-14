<?php

namespace App\Models;

use App\Models\offer;
use Illuminate\Database\Eloquent\Model;

class country extends Model
{
    protected $table = 'countrys';

    public function offers()
    {
        return $this->belongsTo(offer::class, 'id_country', 'id');
    }
}
