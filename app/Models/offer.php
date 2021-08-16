<?php

namespace App\Models;

use App\Models\country;
use App\Models\bodytype;
use Illuminate\Database\Eloquent\Model;

class offer extends Model
{
    public function bodytypes()
    {
        return $this->hasOne(bodytype::class, 'id', 'id_bodytype');
    }

    public function countrys()
    {
        return $this->hasOne(country::class, 'id', 'id_country');
    }

    public function equipments()
    {
        return $this->hasOne(equipment::class, 'id', 'id_additionalequipment');
    }

    // public function carmodels()
    // {
    //     return $this->hasMany('bodytype');
    // }

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
        return offer::get();
    }

    public function scopeShowOffer($builder, int $id)
    {
        return offer::where('id', '=', $id)->with('bodytypes', 'countrys')->get();
    }
}
