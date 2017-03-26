<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    protected $table = 'category';

    //
    public function TakeAllCat()
    {
        // получаем массив записей из таблицы
        return $this::all();
    }

    public function Add($catname)
    {

    }
}