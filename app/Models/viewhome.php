<?php

namespace App\Models;

use Illuminate\Support\Carbon;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Http\Request;

class viewhome extends Model
{
    protected $table = 'viewhome';

    /// SCOPE FUNCTION

    // ADMIN

    public function scopeUpdateSwitchForSlider(Builder $builder, int $id, string $switch, string $action)
    {
        return viewhome::where('id', $id)->update([
            'status' => $switch,
            'active' => $action
        ]);
    }

    public function scopeDestroyPhotoForSlider(Builder $builder, int $id)
    {
        return viewhome::destroy($id);
    }

    public function scopeAddPhotoForSLider(Builder $builder, Request $req)
    {
        return viewhome::insert([
            'photo' => $req->photo->store('slider', 'public'),
            'created_at' => Carbon::now()
        ]);
    }

    public function scopeGetValueForAddToSlider()
    {
        return viewhome::get(['id', 'photo', 'status', 'active']);
    }


    // USER

    public function scopePhotoForSlider()
    {
        return viewhome::select(['id', 'photo', 'status', 'active'])->where('active', 'on')->get()->take(3);
    }
}
