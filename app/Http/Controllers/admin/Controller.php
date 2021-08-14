<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller as HttpController;
use App\Models\bodytype;
use App\Models\offer;
use App\Models\User;
use App\Models\viewhome;
use Illuminate\Http\Request;

class Controller extends HttpController
{
    protected $offer;
    protected $user;
    protected $slider;

    public function __construct(offer $offer, User $user, viewhome $slider)
    {
        $this->slider = $slider;
        $this->user = $user;
        $this->offer = $offer;
    }

    public function dashboard()
    {
        return view('admin.dashboard', [
            'stats' => $this->offer->StatsAdmin(),
            'offers' => $this->offer->OffersDashboard()
        ]);
    }

    public function updateView(int $id, Request $req)
    {
        if ($req->SwitchStatus == null) {
            $switch = 'off';
        } else {
            $switch = 'on';
        }

        $this->slider->where('id', $id)->update([
            'status' => $switch
        ]);
        return redirect()->route('admin.viewusers');
    }

    public function addOffer()
    {
        return view('admin.AddOffer');
    }

    public function editOffer(int $id)
    {
        return view('admin.edditOffer', ['offer' => $this->offer->where('id', $id)->with('bodytypes', 'countrys')->first()]);
    }

    public function showUsers()
    {
        return view('admin.Users', ['users' => $this->user->all()]);
    }

    public function viewUsers()
    {
        return view('admin.viewUsers', ['sliders' => $this->slider->get()]);
    }

    public function viewOffer(int $id)
    {
        return view('admin.viewOffer', ['offer' => $this->offer->where('id', $id)->with('bodytypes', 'countrys')->first()]);
    }

    public function deleteOffer(int $id)
    {
        $this->offer->destroy($id);
        return redirect()->route('admin.dashboard');
    }
}
