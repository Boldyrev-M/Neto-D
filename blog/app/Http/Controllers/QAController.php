<?php

namespace App\Http\Controllers;

use App\Category;
use App\Question;
use App\Status;

use Illuminate\Http\Request;
use DB;
use Illuminate\Support\Facades\Input;

class QAController extends Controller
{ // обработчики главной страницы админки
    public function showAll()
    { // вызов отображения списка вопросов
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
    { // вызов отображения списка вопросов _без ответов_
        $categories = new Category();
        $questions = new Question();
        $status = new Status();
        return view('questionsList', ['categories' => $categories->TakeAllCat(),
            'questions' => $questions->TakeNoAnswer(), 'stat' => $status->TakeAllStat(), 'title' => 'Список вопросов без ответов']);
    }

    public function showPublished()
    { // вызов основной страницы со списком разрешенных вопросов
        $categories = new Category();
        $questions = new Question();
        return view('FAQ/faq', ['categories' => $categories->TakeAllCat(),
            'faq' => $questions->TakePublished(),
            'categoriesNotEmpty'=>$categories->TakeNotEmpty()]);
    }

    public function addQuestion()
    {   // сохранение нового вопроса при добавлении на главной странице
        $questions = new Question();
        $data = Input::all();
        $questions->addQuestion($data);
        return back();
    }

    public function change($id)
    {   // вызов представления с формой для изменения свойств вопроса
        $question = new Question();
        $categories = new Category();
        $status = new Status();
        $data = $question->getQuestion($id);
        return view('changequestion', ['question' => $data, 'categories' => $categories->TakeAllCat(), 'status' => $status->TakeAllStat()]);
    }
}
