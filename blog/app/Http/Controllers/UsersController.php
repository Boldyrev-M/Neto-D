<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use Auth;

class UsersController extends Controller
{
    //
    public function store(Request $request)
    {
        $user = new User();
//        unique:table,column,except,idColumn
        $this->validate($request, [
            'login' => 'required|unique:users,name|max:20|alpha_dash',//.\Auth::user()->name,
            'email' => 'required|unique:users,email',//.\Auth::user()->id,
            'password' => 'required|min:8|alpha_num'
        ]);

        $user->create([
            'name' => $request->get('login'),
            'email' => $request->get('email'),
            'password' => bcrypt($request->get('password')),
        ]);
        return redirect()->action('HomeController@index');
    }

    public function change($id)
    {
       $u = new User();
       return view('changeuser',['data' => $u->getUser($id)]);
    }

    public function updateUser(Request $request)
    {
        $user = new User();
        $user->updateUser($request->get('id'),
            $request->get('login'),
            $request->get('email'),
            strlen($request->get('password')) ? $request->get('password') : '');
        return redirect()->action('HomeController@index');

    }
}
