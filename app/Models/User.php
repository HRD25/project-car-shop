<?php

namespace App\Models;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'email',
        'password',
        'role'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    // Related
    public function offers()
    {
       return $this->belongsTo(offer::class, 'id', 'id_user');
    }

    public function messages()
    {
        return $this->belongsTo(messages::class,'id','idFromUser');
    }

    // SCOPE FUNCTION

    //Admin

    public function scopeGetRegisteredUsers()
    {
        return User::where('role', '!=', 'admin')->get();
    }

    public function scopeGetUserForShow(Builder $builder, int $id)
    {
        return User::where('id', $id)->get()->first();
    }

    //USER
    public function scopeSettingsUser()
    {
        return User::select(['id', 'name', 'email', 'avatar'])->where('id', Auth::id())->get()->first();
    }

    public function scopeChangeAvatar(Builder $builder, Request $req, int $id)
    {
        return User::where('id', $id)->update([
            'avatar' => $req->photo->store('avatar/' . $id, 'public')
        ]);
    }

    public function scopeUserPasswordGet(Builder $builder, int $id)
    {
        return User::where('id', $id)->get('password')->first();
    }

    public function scopeChangeSettings(Builder $builder, Request $req, int $id)
    {
        return User::where('id', $id)->update([
            'email' => $req->email,
            'password' => Hash::make($req->newpassword)
        ]);
    }
}
