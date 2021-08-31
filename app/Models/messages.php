<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class messages extends Model
{
    protected $table = "messages";

    /// RELATED
    public function Users()
    {
        return $this->hasOne(User::class,'id','idFromUser');
    }
}
