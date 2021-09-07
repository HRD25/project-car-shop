<?php

namespace App\Http\Controllers\user;

use Pusher\Pusher;
use App\Models\User;
use App\Models\offer;
use App\Models\favorite;
use App\Models\messages;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Http\Controllers\Controller as HttpController;

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
        $req->validate([
            'photo' => 'nullable|max:2048',
            'carname' => 'required|max:50',
            'price' => 'required|numeric|max:3000000',
            'yearproduction' => 'required|date',
            "course" => 'required|numeric|max:6',
            "steeringwheel" => 'required',
            "vehiclestatu" => 'required',
            "fueltype" => 'required',
            "description" => 'required',
            "carmodel" => 'required',
            "bodytype" => 'required',
            "equipment" => 'required',
            "engine" => 'required',
            "location" => 'required|max:50',
            "country" => 'required',
            "drive" => 'required',
        ]);



        $this->offer->AddNewOffer($req);
        return redirect()->route('user.myoffers');
    }

    public function addOffer()
    {
        return view('user.AddOffer', [
            'additives' => $this->offer->AdditivesForNewOffer()
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

    ///////////
    public function MessageTest($idOffer = null, $ToUser = null)
    {
        if ($idOffer != null && $ToUser != null) {
            $users = User::where('id', $ToUser)->get();
        } else {
            $users = User::where('id', '!=', Auth::id())->get();
        }
        //$users = DB::select("select users.id,users.name,users.email,users.avatar,count(is_read) as unread From users LEFT JOIN messages ON users.id = messages.idFromUser and is_read = 0 and messages.idToUser = " . Auth::id() . " where users.id !=" . Auth::id() . " group by users.id,users.name,users.avatar");

        return view('user.test.testMessages', ['users' => $users, 'idoffer' => $idOffer]);
    }

    public function getMessage($user_id)
    {
        $my_id = Auth::id();
        $messages = messages::where(function ($query) use ($user_id, $my_id) {
            $query->where('idFromUser', $my_id)->where('idToUser',  $user_id);
        })
            ->orwhere(function ($query) use ($user_id, $my_id) {
                $query->where('idFromUser', $user_id)->where('idToUser',  $my_id);
            })
            ->get();

        return view('user.test.messages.input-message', ['messages' =>  $messages]);
    }

    public function testSendMessage(Request $req)
    {
        $idFrom = Auth::id();
        $to = $req->receiver_id;
        $message = $req->message;

        $data = new messages();
        $data->idFromUser = $idFrom;
        $data->idToUser = $to;
        $data->messages = $message;
        $data->is_read = 0;
        $data->save();

        ////
        $options = [
            'cluster' => 'eu',
            'useTLS' => true
        ];

        $pusher = new Pusher(
            env('PUSHER_APP_KEY'),
            env('PUSHER_APP_SECRET'),
            env('PUSHER_APP_ID'),
            $options
        );

        $data = ['from' => $idFrom, 'to' => $to];

        $pusher->trigger('my-channel', 'my-event', $data);

        return response($message);
    }
    /////////

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
