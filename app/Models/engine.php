<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
class engine extends Model
{
    protected $table = "engines";

    public function offers()
    {
        return $this->belongsTo(offer::class,'id','id_engine');
    }
    // SCOPE FUNCTION
    public function scopeEngine()
    {
        return engine::select(['id','name'])->get();
    }
}
