<?php

namespace App;
use DB;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    protected $table = 'categories';
    protected $fillable = ['category'];
    public function TakeAllCat()
    {
        // получаем массив записей из таблицы
        return $this::all();
    }
    public function add($catname)
    {
        DB::table($this->table)->insert(
            ['category' => $catname]
        );
    }
    public function remove($catid)
    {
        DB::table($this->table)->where('id','=',$catid)->delete();
    }
    public function getName($id)
    {
        $cat = Category::find($id);
        return $cat->category;
        //DB::table($this->table)->where('id','=',$id)->pluck('category');//нигадицца, возвращает юникод
    }
    public function updateCat($id,$catname)
    {
//        DB::table($this->table)
//            ->where('id','=',$id)
//            ->update(['category' => $catname]);
//
        $ca = Category::find($id);
        $ca->category = $catname;
        $ca->updated_at = date('Y-m-d H:i:s');
        $ca->save();
    }
}