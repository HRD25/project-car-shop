<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller as HttpController;
use App\Models\offer;
use App\Models\User;

class Controller extends HttpController
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function dashboard()
    {
        return view('admin.dashboard', [
            'stats' => offer::StatsAdmin(),
            'offers' => offer::OffersDashboard()
        ]);
    }

    public function addOffer()
    {
        return view('admin.AddOffer');
    }

    public function showUsers()
    {
        return view('admin.Users', ['users' => User::all()]);
    }

    public function viewUsers()
    {
        return view('admin.viewUsers');
    }

    public function viewOffer(int $id)
    {
        $offer = offer::where('id', $id)->get();
        $offert = $offer->toArray();

        return view('admin.viewOffer', ['offer' => $offert['0']]);
    }
}
