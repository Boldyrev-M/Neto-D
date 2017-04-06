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
    {   // отображение представления для авторизованного пользователя
        // со списком пользователей и статистикой по вопросам
        $user = new User();
        $category = new Category();
        $question = new Question();
        return view('home',['users'=>$user->showAll(),'categories'=>$category->TakeAllCat(),
            'stats'=>$question->getStats($category->TakeAllCat())]);
    }
}
