<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller as HttpController;
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
        $switch = 'off';
        if ($req->SwitchActive == null) {
            $action = 'off';
        } else {
            $action = $req->SwitchActive;
            if (!empty($req->Switch1)) {
                $switch = $req->Switch1;
            } else if (!empty($req->Switch2)) {
                $switch = $req->Switch2;
            } else if (!empty($req->Switch3)) {
                $switch = $req->Switch3;
            }
            if ($req->Switch1 != null && $req->Switch2 != null || $req->Switch1 != null && $req->Switch3 != null || $req->Switch2 != null && $req->Switch3 != null) {
                $switch = 'off';
            }
        }

        $this->slider->where('id', $id)->update([
            'status' => $switch,
            'active' => $action
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
        return view('admin.viewOffer', ['offers' => $this->offer->ShowOffer($id)]);
    }

    public function deleteOffer(int $id)
    {
        $this->offer->destroy($id);
        return redirect()->route('admin.dashboard');
    }

    public function deleteViewUser(int $id)
    {
        $this->slider->destroy($id);
        return redirect()->route('admin.viewusers');
    }
}
