<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use DB;
use App\Http\Controllers\Auth;

class Question extends Model
{
    //
    protected $table = 'questions';
    protected $fillable = [
        'category', 'text', 'name', 'email', 'status'
    ];

    public function TakeAllQs()
    {
        // получаем массив записей из таблицы
        return $this::all();
    }

    public function addQuestion($data)
    {
        DB::table($this->table)->insert(
            ['name' => $data['name'],
                'email' => $data['email'],
                'category_id' => $data['category'],
                'text' => $data['text'],
                'created_at' => date('Y-m-d h:i:s'),
                'status' => 1, //'1 - awaiting','2 - hidden','3 - published'
                'answer' => '',
                'user_id' => NULL,
                'resolved' => NULL]
        );
    }

    public function takePublished()
    {
        $result = DB::table($this->table)
            ->where('status', '=', 3)
            ->get();
        return $result;
    }

    public function takeNoAnswer()
    {
        $result = DB::table($this->table)
            ->where('answer', '=', '')
            ->get();
        return $result;
    }

    public function removeQuestion($questId)
    {
        DB::table($this->table)->where('id', '=', $questId)->delete();
    }

    public function getQuestion($id)
    {
        return $this->find($id);
    }

    public function updateQuestion($id, $text, $answer, $status, $category)
    {
        $qu = $this->find($id);
        $qu->text = $text;
        $qu->answer = $answer;
        $qu->status = $status;
        $qu->category_id = $category;
        $qu->user_id = \Auth::user()->id;
        $qu->updated_at = date('Y-m-d H:i:s');
        $qu->save();
    }

    public function getStats($categoryList)
    {
        foreach ($categoryList as $category) {
            //$currentCat = $category->id;
            $result[$category->id]['all'] = $this->getStatAll($category->id);
            $result[$category->id]['published'] = $this->getStatPublished($category->id);
            $result[$category->id]['noanswer'] = $this->getStatNoAnswer($category->id);
        }
        return $result;
    }

    public function getStatAll($categoryId)
    {
        return DB::table($this->table)
            ->where('category_id', '=', $categoryId)
            ->count();
    }

    public function getStatPublished($categoryId)
    {
        return DB::table($this->table)
            ->where('category_id', '=', $categoryId)
            ->where('status', '=', 3)
            ->count();
    }

    public function getStatNoAnswer($categoryId)
    {
        return DB::table($this->table)
            ->where('category_id', '=', $categoryId)
            ->where('answer', '=', '')
            ->count();
    }
}