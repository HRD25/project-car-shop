<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class drive extends Model
{
    protected $table = "drives";

    /// RELATED
    public function offers()
    {
        return $this->belongsTo(offer::class, 'id_drive', 'id');
    }
}
