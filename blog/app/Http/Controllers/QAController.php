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
    public function showAll()
    {
        $categories = new Category();
        $questions = new Question();
        $status = new Status();
        return view('questionsList',
            ['categories' => $categories->TakeAllCat(),
                'questions' => $questions->TakeAllQs(),
                'stat' => $status->TakeAllStat(),
                'title' => 'Список вопросов по категориям']);
    }

    public function showNoAnswered()
    {
        $categories = new Category();
        $questions = new Question();
        $status = new Status();

        return view('questionsList', ['categories' => $categories->TakeAllCat(),
            'questions' => $questions->TakeNoAnswer(), 'stat' => $status->TakeAllStat(), 'title' => 'Список вопросов без ответов']);
    }

    public function showPublished()
    {
        $categories = new Category();
        $questions = new Question();

        return view('FAQ/faq', ['categories' => $categories->TakeAllCat()],
            ['faq' => $questions->TakePublished()]);
    }

    /**
     * @return mixed
     */
//    public function getCategories()
//    {
//        $categories = new Category();
//        return $categories->TakeAllCat();
//    }

    /**
     * @return mixed
     */
//    public function getQuestions()
//    {
//        return $this->questions;
//    }

    public function addQuestion()
    {
        $questions = new Question();
        $data = Input::all();
        $questions->addQuestion($data);
        return back();
    }

    public function change($id)
    {
        $question = new Question();
        $categories = new Category();
        $status = new Status();

        $data = $question->getQuestion($id);
        return view('changequestion', ['question' => $data, 'categories' => $categories->TakeAllCat(), 'status' => $status->TakeAllStat()]);
    }
}
