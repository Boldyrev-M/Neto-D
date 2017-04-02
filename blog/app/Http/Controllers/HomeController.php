<?php

namespace App\Http\Controllers;

use App\Category;
use App\Question;
use Illuminate\Http\Request;
use DB;
use  App\User;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user = new User();
        $ctg = new Category();
        $quest = new Question();
        return view('home',['users'=>$user->showAll(),'categories'=>$ctg->TakeAllCat(),
            'stats'=>$quest->getStats($ctg->TakeAllCat())]);
    }
}
