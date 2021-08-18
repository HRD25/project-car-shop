<?php

namespace App\Http\Controllers\user;

use App\Http\Controllers\Controller as HttpController;
use App\Models\favorite;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;


class Controller extends HttpController
{
    protected $favorite;
    protected $user;

    public function __construct(favorite $favorite, User $user)
    {
        $this->user = $user;
        $this->favorite = $favorite;
    }

    public function showfavorites()
    {
        return view('user.favorite', ['favorites' => $this->favorite->where('id_user', Auth::id())->with('offers')->get()]);
    }

    public function settingschange(int $id, Request $req)
    {
        $passwordUser = $this->user->where('id', $id)->get('password')->first();

        if ($req->photo) {
            $this->user->where('id', $id)->update(['avatar' => $req->photo->store('avatar/' . $id, 'public')]);
        }

        if (Hash::check($req->activepassword, $passwordUser->password)) {
            $this->user->where('id', $id)->update([
                'email' => $req->email,
                'password' => Hash::make($req->newpassword)
            ]);
        }

        return redirect()->route('user.settingsuser', ['id' => $id]);
    }

    public function settingsuser(int $id)
    {
        return view('user.user', ['user' => $this->user->where('id', $id)->get()->first()]);
    }

    public function addfavorite(int $id)
    {
        $this->favorite->insert([
            'id_user' => Auth::id(),
            'id_offer' => $id
        ]);

        return redirect()->route('home');
    }

    public function deletefavorite(int $id)
    {
        $this->favorite->destroy($id);

        return redirect()->route('user.showfavorites');
    }
}
