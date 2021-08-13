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
            'Sellers' => User::where('role', 'seller')->get()->count()
        ];;
    }

    public function scopeOffersDashboard()
    {
        return offer::select('id', 'carname', 'photo', 'price', 'id_user', 'location')->get();
    }
}
