<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class equipment extends Model
{
    protected $table = 'equipments';

    public function offers()
    {
        return $this->belongsTo(offer::class, 'id_additionalequipment', 'id');
    }
}
