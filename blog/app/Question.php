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

    public function add($data)
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
//            ->orWhere(function ($query) {
//                $query->where('votes', '>', 100)
//                    ->where('title', '<>', 'Админ'); })
            ->get();
        return $result;
    }

    public function remove($questId)
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

    public function getStats($categ_arr)
    {// select count(id) from questions where category_id=$categ
        // select count(id) from questions where category_id=$categ and status = published
        // select count(id) from questions where category_id=$categ and (answer = '' or answer is null)
        $res = array();
        foreach ($categ_arr as $cat) {
            if (sizeof($categ_arr)) {
                $currentCat = $cat->id;
                $res[$currentCat]['all'] = DB::table($this->table)->where('category_id', '=', $currentCat)->count();
                $res[$currentCat]['published'] = DB::table($this->table)
                    ->where('category_id', '=', $currentCat)
                    ->where('status', '=', 3)
                    ->count();
                $res[$currentCat]['noanswer'] = DB::table($this->table)
                    ->where('category_id', '=', $currentCat)
                    ->where('answer', '=', '')
                    ->count();
            }
        }
        return $res;
    }

    public function noAnswer()
    {
        // SELECT * FROM questions WHERE answer = '' ORDER BY created_at DESC

        return DB::table($this->table)
            ->where('answer', '=', '')
            ->orderBy('created_at', 'desc')
            ->get();;
    }
}