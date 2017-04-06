<?php

namespace App\Http\Controllers;

use App\Question;
use Illuminate\Http\Request;

class QuestionsController extends Controller
{
    //
    protected $table = 'questions';

    public function deleteQuestion($id)
    {
        $qu = new Question();
        $qu->removeQuestion($id);
        return back();
    }

    public function updateQuestion(Request $request)
    {
        $question = new Question();
        $question->updateQuestion($request->get('id'),
            $request->get('text'),
            $request->get('name'),
            $request->get('answer'),
            $request->get('status'),
            $request->get('category'));
        return redirect()->action('QAController@showAll');
    }


}
