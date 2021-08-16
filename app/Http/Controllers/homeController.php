<?php

namespace App\Http\Controllers;

use App\Models\offer;
use App\Models\viewhome;

class homeController extends Controller
{
    public function __invoke(offer $offer, viewhome $viewslider)
    {
        $Sliders = $viewslider->where('active', 'on')->get()->take(3);
        $offers = $offer->all();

        return view('user.home', ['Sliders' => $Sliders, 'offers' => $offers]);
    }
}
