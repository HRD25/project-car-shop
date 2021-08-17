<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class favorite extends Model
{
    protected $table = 'favorites';

    public function offers()
    {
        return $this->belongsTo(offer::class, 'id_offer', 'id');
    }
}
