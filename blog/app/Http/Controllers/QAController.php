<?php

namespace App\Http\Controllers;

use App\Category;
use App\Question;
use App\Status;

use Illuminate\Http\Request;
use DB;
use Illuminate\Support\Facades\Input;

class QAController extends Controller
{
    //
    public $categories;
    public $questions;
    public $status;

    public function showAll()
    {
        $this->categories = new Category();
        $this->questions = new Question();
        $this->status = new Status();

        return view('questionsList', ['categories' => $this->categories->TakeAllCat(),
            'questions' => $this->questions->TakeAllQs(), 'stat' => $this->status->TakeAllStat(),'title'=>'Список вопросов по категориям']);
    }

    public function showAllNoAnswer()
    {
        $this->categories = new Category();
        $this->questions = new Question();
        $this->status = new Status();

        return view('questionsList', ['categories' => $this->categories->TakeAllCat(),
            'questions' => $this->questions->noAnswer(), 'stat' => $this->status->TakeAllStat(),'title'=>'Список вопросов без ответов']);
    }

    public function showPublished()
    {
        $this->categories = new Category();
        $this->questions = new Question();

        return view('FAQ/faq', ['categories' => $this->categories->TakeAllCat()],
            ['faq' => $this->questions->TakePublished()]);
    }

    /**
     * @return mixed
     */
    public function getCategories()
    {
        return $this->categories;
    }

    /**
     * @return mixed
     */
    public function getQuestions()
    {
        return $this->questions;
    }

    public function addQuestion()
    {
        $questions = new Question();
        $data = Input::all();
        $questions->add($data);
        return back();
    }

    public function change($id)
    {
        $question = new Question();
        $this->categories = new Category();
        $this->status = new Status();

        $data = $question->getQuestion($id);
        return view('changequestion',['question'=>$data, 'categories' => $this->categories->TakeAllCat(), 'status'=>$this->status->TakeAllStat()]);
    }
}
