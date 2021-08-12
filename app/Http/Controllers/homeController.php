<?php

namespace App\Http\Controllers;

use App\Models\offer;
use Illuminate\Http\Request;

class homeController extends Controller
{
    public function __invoke(offer $offer)
    {
        $offersSlider = $offer->all()->take(3);
        $offers = $offer->all();

        return view('layouts.home', ['offersSlider' => $offersSlider,'offers'=>$offers]);
    }
}
