<?php

namespace App\Models;

use Carbon\Carbon;
use App\Models\drive;
use App\Models\engine;
use App\Models\country;
use App\Models\bodytype;
use App\Models\carmodel;
use App\Models\favorite;
use App\Models\fueltype;
use App\Models\equipment;
use App\Models\vehiclestatu;
use Illuminate\Http\Request;
use App\Models\steeringwheel;
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
        return $this->hasOne(favorite::class, 'id', 'id_offer');
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

    public function Users()
    {
        return $this->hasOne(User::class, 'id', 'id_user');
    }

    public function drives()
    {
        return $this->hasOne(drive::class,'id','id_drive');
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
            'Offers' => offer::count('id'),
            'Users' => User::where('role', '!=', 'admin')->count(),
            'Sellers' => User::where('role', 'seller')->count()
        ];;
    }

    public function scopeOffersForDashboard()
    {
        return offer::with(['Users'])->paginate(8);
    }

    public function scopeDestroyOffer(Builder $builder, int $id)
    {
        return offer::destroy($id);
    }

    // USER
    public function scopeAdditivesForNewOffer()
    {
        return [
            'fueltype' => fueltype::get(['id', 'name']),
            'vehiclestatu' =>  vehiclestatu::get(['id', 'name']),
            'steeringwheel' => steeringwheel::get(['id', 'name']),
            'carmodels' => carmodel::get(['id', 'name']),
            'bodytypes' =>  bodytype::get(['id', 'name']),
            'equipments' =>  equipment::get(['id', 'name']),
            'engines' => engine::get(['id', 'name']),
            'countrys' => country::get(['id', 'name']),
            'drives' =>  drive::get(['id', 'name'])
        ];
    }

    public function scopeSuggestionsOffers()
    {
        return offer::inRandomOrder()->with('vehiclestatus')->get()->take(15);
    }

    public function scopeAddNewOffer(Builder $builder, Request $req)
    {
        return offer::insert([
            "photo" => $req->photo ?? 'no',
            "carname" => $req->carname,
            "price" => $req->price,
            "yearproduction" => $req->yearproduction,
            "course" => $req->course,
            "id_steeringwheel" => $req->steeringwheel,
            "id_vehiclestatus" => $req->vehiclestatu,
            "id_fueltype" => $req->fueltype,
            "description" => $req->description,
            "id_carmodel" => $req->carmodel,
            "id_bodytype" => $req->bodytype,
            "id_equipment" => $req->equipment,
            "id_engine" => $req->engine,
            "location" => $req->location,
            "id_country" => $req->country,
            "id_drive" => $req->drive,
            "id_user" => Auth::id(),
            "created_at" => Carbon::now()
        ]);
    }

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
                ->with('vehiclestatus', 'favorites')
                ->paginate(12);
        }

        return offer::with('vehiclestatus', 'favorites')->paginate(12);
    }

    public function scopeSimilarOffers()
    {
        return offer::with('vehiclestatus')->get();
    }

    public function scopeShowOffer(Builder $builder, int $id)
    {
        return offer::where('id', $id)->with('bodytypes', 'countrys', 'fueltypes', 'vehiclestatus', 'steeringwheels', 'carmodels', 'engines', 'equipments','drives')->first();
    }
}
