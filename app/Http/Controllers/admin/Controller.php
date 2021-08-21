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
            'offers' => $this->offer->OffersForDashboard()
        ]);
    }

    public function updateView(int $id, Request $req)
    {
        $this->checkSwitch($req, $id);
        return redirect()->route('admin.viewusers');
    }

    public function addOffer()
    {
        return view('admin.AddOffer');
    }

    public function editOffer(int $id)
    {
        return view('admin.edditOffer', ['offer' => $this->offer->GetOfferForEdit($id)]);
    }

    public function showUsers()
    {
        return view('admin.Users', ['users' => $this->user->GetRegisteredUsers()]);
    }

    public function showuser(int $id)
    {
        return view('admin.User', ['user' => $this->user->GetUserForShow($id)]);
    }

    public function viewUsers()
    {
        return view('admin.viewUsers', ['sliders' => $this->slider->GetValueForAddToSlider()]);
    }

    public function viewOffer(int $id)
    {
        return view('admin.viewOffer', ['offers' => $this->offer->ShowOffer($id)]);
    }

    public function deleteOffer(int $id)
    {
        $this->offer->DestroyOffer($id);
        return redirect()->route('admin.dashboard');
    }

    public function addViewUser(Request $req)
    {
        $this->slider->AddPhotoForSLider($req);
        return redirect()->route('admin.addViewUser');
    }

    public function deleteViewUser(int $id)
    {
        $this->slider->DestroyPhotoForSlider($id);
        return redirect()->route('admin.viewusers');
    }

    private function checkSwitch(Request $req, int $id)
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

            if (
                $req->Switch1 != null && $req->Switch2 != null ||
                $req->Switch1 != null && $req->Switch3 != null ||
                $req->Switch2 != null && $req->Switch3 != null
            ) {
                $switch = 'off';
            }
        }
        $this->slider->UpdateSwitchForSlider($id, $switch, $action);
    }
}
