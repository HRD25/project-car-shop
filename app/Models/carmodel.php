<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class carmodel extends Model
{
    protected $table = 'carmodels';

    public function offers()
    {
        return $this->belongsTo(offer::class, 'id', 'id_carmodel');
    }

    // SCOPE FUNCTION

    public function scopeCarModel()
    {
        return carmodel::select(['id', 'name'])->get();
    }
}
