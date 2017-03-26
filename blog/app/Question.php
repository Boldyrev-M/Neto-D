<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Question extends Model
{
    //
    protected $table = 'questions';

    //


    public function TakeAllQs()
    {
        // получаем массив записей из таблицы
        return $this::all();
    }
}
