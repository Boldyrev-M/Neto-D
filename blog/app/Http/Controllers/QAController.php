<?php

namespace App\Http\Controllers;
use App\Category;
use App\Question;

use Illuminate\Http\Request;
use DB;

class QAController extends Controller
{
    //
    public $categories;
    public $questions;

    public function showAll()
    {
        return view('FAQ/faq',['categories'=>$this->showCategory()],['faq'=>$this->showQuestions()]);
    }
    function showCategory()
    {
        $this->categories = new Category();
        return $this->categories->TakeAllCat();
    }

    function showQuestions()
    {
        $this->questions = new Question();
        return $this->questions->TakeAllQs();
    }
}
