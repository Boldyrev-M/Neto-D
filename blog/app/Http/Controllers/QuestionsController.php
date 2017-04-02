<?php

namespace App\Http\Controllers;

use App\Question;
use Illuminate\Http\Request;

class QuestionsController extends Controller
{
    //
    protected $table = 'questions';

    public function delete($id)
    {
        $qu = new Question();
        $qu->remove($id);
        return back();
    }

    public function updateQuestion(Request $request)
    {
        $question = new Question();
        $question->updateQuestion($request->get('id'),
            $request->get('text'),
            $request->get('answer'),
            $request->get('status'),
            $request->get('category'));
        return redirect()->action('QAController@showAll');
    }


}
