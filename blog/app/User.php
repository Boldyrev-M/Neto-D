<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Auth;
use DB;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $table = 'users';
    protected $fillable = [
        'name', 'email', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];
    public function showAll()
    {
        return $this::all();
    }
    public function remove($whom)
    {
        $who =  Auth::user()->id;
        if ($who != $whom) {
            DB::table($this->table)->where('id','=',$whom)->delete();
        }
        return back();
    }

    public function getUser($id)
    {
        return $this->find($id);
    }

    public function updateUser($id,$login,$email,$password='')
    {
        $u = $this->find($id);
        $u->name = $login;
        $u->email = $email;
        if ($password) {
            $u->password = bcrypt($password);
        }
        $u->remember_token = null;
        $u->updated_at = date('Y-m-d H:i:s');
        $u->save();
    }

}
