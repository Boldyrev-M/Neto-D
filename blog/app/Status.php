<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Status extends Model
{
    //
    protected $table = 'status';

    //
    protected $fillable = [
        'status'
    ];


    public function TakeAllStat()
    {
        // получаем массив записей из таблицы
        return $this::all();
    }

}
