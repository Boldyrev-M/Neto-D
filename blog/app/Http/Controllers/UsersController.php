<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;

class UsersController extends Controller
{
    //
    public function store(Request $request)
    {
        $user = new User();
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
