<?php

namespace App\Http\Controllers;

use App\Models\offer;
use App\Models\bodytype;
use App\Models\carmodel;
use App\Models\engine;
use App\Models\favorite;
use App\Models\fueltype;
use App\Models\steeringwheel;
use App\Models\viewhome;
use Illuminate\Http\Request;
class homeController extends Controller
{
    protected $favorite;
    protected $fueltype;
    protected $engine;
    protected $carmodel;
    protected $bodytype;
    protected $offer;
    protected $Slider;
    protected $steeringwheel;

    public function __construct(
        offer $offer,
        viewhome $Slider,
        bodytype $bodytype,
        carmodel $carmodel,
        engine $engine,
        steeringwheel $steeringwheel,
        fueltype $fueltype,
        favorite $favorite
    ) {
        $this->favorite = $favorite;
        $this->fueltype = $fueltype;
        $this->steeringwheel = $steeringwheel;
        $this->engine = $engine;
        $this->carmodel = $carmodel;
        $this->bodytype = $bodytype;
        $this->offer = $offer;
        $this->Slider = $Slider;
    }

    public function ShowOffer(int $id)
    {
        return view('user.viewOffer', [
            'offer' => $this->offer->ShowOffer($id),
            'suggestions' => $this->offer->SuggestionsOffers(),
            'idFavorits' => $this->mapIdfavorits()
        ]);
    }

    public function home(Request $req)
    {
        return view('user.home', [
            'Sliders' => $this->Slider->PhotoForSlider(),
            'offers' => $this->offer->OfferforHome($req),
            'idFavorits' => $this->mapIdfavorits(),
            'stats' => [
                'bodytypes' => $this->bodytype->BodyType(),
                'carmodel' => $this->carmodel->CarModel(),
                'engine' => $this->engine->Engine(),
                'steeringwheel' => $this->steeringwheel->Steeringwheel(),
                'fueltype' => $this->fueltype->FuelType()
            ]
        ]);
    }

    private function mapIdfavorits()
    {
        $idFavorits = [];
        foreach ($this->favorite->MapFavorits() as $favorit) {
            $idFavorits[] = $favorit->id_offer;
        }
        return $idFavorits;
    }
}
