<?php

namespace App\Models;

use App\Models\country;
use App\Models\bodytype;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Builder;

class offer extends Model
{
    // RELATED
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
        return $this->hasOne(equipment::class, 'id', 'id_equipment');
    }

    public function favorites()
    {
        return $this->hasOne(favorite::class, 'id_offer', 'id');
    }

    public function carmodels()
    {
        return $this->hasOne(carmodel::class, 'id', 'id_carmodel');
    }

    public function fueltypes()
    {
        return $this->hasOne(fueltype::class, 'id', 'id_fueltype');
    }

    public function steeringwheels()
    {
        return $this->hasOne(steeringwheel::class, 'id', 'id_steeringwheel');
    }

    public function vehiclestatus()
    {
        return $this->hasOne(vehiclestatu::class, 'id', 'id_vehiclestatus');
    }

    public function engines()
    {
        return $this->hasOne(engine::class, 'id', 'id_engine');
    }

    /// SCOPE FUNCTION

    // ADMIN

    public function scopeGetOfferForEdit(Builder $builder, int $id)
    {
        return offer::where('id', $id)->with(['bodytypes', 'countrys', 'vehiclestatus', 'equipments'])->get()->first();
    }

    public function scopeStatsAdmin()
    {
        return [
            'Offers' => offer::count(),
            'Users' => User::where('role', '!=', 'admin')->count(),
            'Sellers' => User::where('role', 'seller')->count()
        ];;
    }

    public function scopeOffersForDashboard()
    {
        return offer::paginate(8);
    }


    public function scopeDestroyOffer(Builder $builder, int $id)
    {
        return offer::destroy($id);
    }

    // USER

    public function scopeMyOffers()
    {
        return offer::with('vehiclestatus')->where('id_user', Auth::id())->get();
    }

    public function scopeOfferforHome(Builder $builder, Request $req)
    {
        if (
            $req->carname ||
            $req->bodytype ||
            $req->carmodel ||
            $req->fueltype ||
            $req->courseod ||
            $req->coursedo ||
            $req->engine ||
            $req->steeringwheel ||
            $req->priceod ||
            $req->pricedo
        ) {
            return offer::join('steeringwheels', 'offers.id_steeringwheel', 'steeringwheels.id')
                ->join('engines', 'offers.id_engine', '=', 'engines.id')
                ->join('fueltypes', 'offers.id_fueltype', '=', 'fueltypes.id')
                ->join('carmodels', 'offers.id_carmodel', '=', 'carmodels.id')
                ->join('bodytypes', 'offers.id_bodytype', '=', 'bodytypes.id')
                ->select('offers.*')
                ->when($req->carname, function ($query) use ($req) {
                    $query->where('offers.carname', 'like', "%$req->carname%");
                })
                ->when($req->bodytype, function ($query) use ($req) {
                    $query->where('bodytypes.name', '=', $req->bodytype);
                })
                ->when($req->carmodel, function ($query) use ($req) {
                    $query->where('carmodels.name', '=', $req->carmodel);
                })
                ->when($req->fueltype, function ($query) use ($req) {
                    $query->where('fueltypes.name', '=', $req->fueltype);
                })
                ->when($req->courseod && $req->coursedo, function ($query) use ($req) {
                    $query->whereBetween('offers.course', [$req->courseod, $req->coursedo]);
                })
                ->when($req->courseod, function ($query) use ($req) {
                    $query->where('offers.course', '>', $req->courseod);
                })
                ->when($req->coursedo, function ($query) use ($req) {
                    $query->where('offers.course', '<', $req->coursedo);
                })
                ->when($req->engine, function ($query) use ($req) {
                    $query->where('engines.name', '=', $req->engine);
                })
                ->when($req->steeringwheel, function ($query) use ($req) {
                    $query->where('steeringwheels.name', '=', $req->steeringwheel);
                })
                ->when($req->priceod && $req->pricedo, function ($query) use ($req) {
                    $query->whereBetween('offers.price', [$req->priceod, $req->pricedo]);
                })
                ->when($req->priceod, function ($query) use ($req) {
                    $query->where('offers.price', '>', $req->priceod);
                })
                ->when($req->pricedo, function ($query) use ($req) {
                    $query->where('offers.price', '<', $req->pricedo);
                })
                ->with('vehiclestatus')
                ->paginate(12);
        }

        return offer::with('vehiclestatus')->paginate(12);
    }

    public function scopeSimilarOffers()
    {
        return offer::with('vehiclestatus')->get();
    }

    public function scopeShowOffer(Builder $builder, int $id)
    {
        return offer::where('id', $id)->with('bodytypes', 'countrys', 'fueltypes', 'vehiclestatus', 'steeringwheels', 'carmodels', 'engines', 'equipments')->get();
    }
}
