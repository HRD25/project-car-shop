<?php

namespace App\Models;

use Illuminate\Support\Facades\Auth;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Builder;

class favorite extends Model
{
    protected $table = 'favorites';

    public function offers()
    {
        return $this->belongsTo(offer::class, 'id_offer', 'id');
    }

    // SCOPE FUNCTION

    public function scopeFavoritesGet()
    {
        return favorite::select(['id', 'id_user', 'id_offer'])->where('id_user', Auth::id())->with('offers')->get();
    }

    public function scopeAddFavorite(Builder $builder,int $id)
    {
        return favorite::insert([
            'id_user' => Auth::id(),
            'id_offer' => $id
        ]);
    }

    public function scopeDestroyFavorite(Builder $builder,int $id)
    {
        return favorite::destroy($id);
    }
}
