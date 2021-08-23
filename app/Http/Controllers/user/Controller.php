<?php

namespace App\Http\Controllers\user;

use App\Http\Controllers\Controller as HttpController;
use App\Models\favorite;
use App\Models\offer;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class Controller extends HttpController
{
    protected $offer;
    protected $favorite;
    protected $user;

    public function __construct(favorite $favorite, User $user, offer $offer)
    {
        $this->offer = $offer;
        $this->user = $user;
        $this->favorite = $favorite;
    }

    public function showfavorites()
    {
        return view('user.favorite', ['favorites' => $this->favorite->FavoritesGet()]);
    }

    public function settingschange(int $id, Request $req)
    {
        $this->change($req, $id);
        return redirect()->route('user.settingsuser');
    }

    public function settingsuser()
    {
        return view('user.user', ['user' => $this->user->SettingsUser()]);
    }

    public function myoffers()
    {
        return view('user.MyOffers', ['offers' => $this->offer->MyOffers()]);
    }

    public function addfavorite(int $id)
    {
        $this->favorite->AddFavorite($id);
        return redirect()->route('home');
    }

    public function deletefavorite(int $id)
    {
        $this->favorite->DestroyFavorite($id);
        return redirect()->route('home');
    }

    private function change($req, $id)
    {
        $passwordUser = $this->user->UserPasswordGet($id);
        if ($req->photo) {
            $this->user->ChangeAvatar($req, $id);
        }
        if (Hash::check($req->activepassword, $passwordUser->password)) {
            $this->user->ChangeSettings($req, $id);
        }
    }
}
