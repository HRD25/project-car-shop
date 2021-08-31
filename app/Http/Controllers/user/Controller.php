<?php

namespace App\Http\Controllers\user;

use App\Http\Controllers\Controller as HttpController;
use App\Models\bodytype;
use App\Models\carmodel;
use App\Models\country;
use App\Models\drive;
use App\Models\engine;
use App\Models\equipment;
use App\Models\favorite;
use App\Models\fueltype;
use App\Models\messages;
use App\Models\offer;
use App\Models\steeringwheel;
use App\Models\User;
use App\Models\vehiclestatu;
use Illuminate\Database\Events\DatabaseRefreshed;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
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

    public function sendOffer(Request $req)
    {
        $this->offer->AddNewOffer($req);
        return redirect()->route('user.myoffers');
    }

    public function addOffer()
    {
        return view('user.AddOffer', [
            'fueltype' => fueltype::get(['id', 'name']),
            'vehiclestatu' =>  vehiclestatu::get(['id', 'name']),
            'steeringwheel' => steeringwheel::get(['id', 'name']),
            'carmodels' => carmodel::get(['id', 'name']),
            'bodytypes' =>  bodytype::get(['id', 'name']),
            'equipments' =>  equipment::get(['id', 'name']),
            'engines' => engine::get(['id', 'name']),
            'countrys' => country::get(['id', 'name']),
            'drives' =>  drive::get(['id', 'name'])
        ]);
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


    public function ShowMessages()
    {
        $messagesFromUsers = [];
        foreach (messages::where('idToUser', Auth::id())->get() as  $messages) {
            $messagesFromUsers[] = $messages->idFromUser;
        }
        $users = array_unique($messagesFromUsers);

        return view('user.messages.messages', [
            'users' => User::whereIn('id', $users)->get()
        ]);
    }

    public function MessagesOffer(int $idOffer, int $toUser)
    {
        // dd(messages::where('id_offer', $idOffer)
        //     ->when('idToUser' == $toUser, function ($query, $toUser) {
        //         $query->where('idToUser', $toUser);
        //     })
        //     ->when('idToUser' ==  Auth::id(), function ($query) {
        //         $query->where('idToUser',  Auth::id());
        //     })
        //     ->when('idFromUser' ==  $toUser, function ($query, $toUser) {
        //         $query->where('idFromUser',  $toUser);
        //     })
        //     ->when('idFromUser' ==  Auth::id(), function ($query) {
        //         $query->where('idFromUser',  Auth::id());
        //     })
        //     ->get());

        return view('user.messages.messages', [
            'Offer' => offer::where('id', $idOffer)->first(),
            'ToUser' => User::where('id', $toUser)->first(),
            'FromUser' => Auth::id(),
            'messagesTo' =>
            messages::where('id_offer', $idOffer)
                ->when('idToUser' == $toUser, function ($query, $toUser) {
                    $query->where('idToUser', $toUser);
                })
                ->when('idToUser' ==  Auth::id(), function ($query) {
                    $query->where('idToUser',  Auth::id());
                })
                ->when('idFromUser' ==  $toUser, function ($query, $toUser) {
                    $query->where('idFromUser',  $toUser);
                })
                ->when('idFromUser' ==  Auth::id(), function ($query) {
                    $query->where('idFromUser',  Auth::id());
                })
                ->get(),
        ]);
    }

    public function sendMessage(Request $req, int $id_offer, int $idToUser)
    {
        messages::insert([
            'id_offer' => $id_offer,
            'idToUser' => $idToUser,
            'idFromUser' => Auth::id(),
            'messages' => $req->message
        ]);
        return redirect()->route('user.MessagesOffer', ['idOffer' => $id_offer, 'ToUser' => $idToUser]);
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
