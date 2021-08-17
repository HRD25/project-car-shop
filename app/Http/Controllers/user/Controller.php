<?php

namespace App\Http\Controllers\user;

use App\Http\Controllers\Controller as HttpController;
use App\Models\favorite;
use App\Models\offer;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

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
