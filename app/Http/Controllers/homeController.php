<?php

namespace App\Http\Controllers;

use App\Models\offer;
use App\Models\viewhome;

class homeController extends Controller
{
    protected $offer;
    protected $Slider;

    public function __construct(offer $offer, viewhome $Slider)
    {
        $this->offer = $offer;
        $this->Slider = $Slider;
    }

    public function ShowOffer(int $id)
    {
        return view('user.viewOffer', ['offers' => $this->offer->ShowOffer($id)]);
    }

    public function home()
    {
        $Sliders = $this->Slider->where('active', 'on')->get()->take(3);
        $offers = $this->offer->all();
        $SimilarOffers = $this->offer->get()->take(6);

        return view('user.home', ['Sliders' => $Sliders, 'offers' => $offers, 'Similar' => $SimilarOffers]);
    }
}
