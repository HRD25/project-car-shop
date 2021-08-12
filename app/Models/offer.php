<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class offer extends Model
{
    public function scopeStatsAdmin()
    {
        return [
            'Offers' => offer::all()->count(),
            'Users' => User::where('role', 'user')->get()->count(),
            'Sold' => '23400',
            'Watchers' => '1000'
        ];;
    }

    public function scopeOffersDashboard()
    {
        return offer::select('id','carname','photos','price','id_user','location')->get();
    }
}
