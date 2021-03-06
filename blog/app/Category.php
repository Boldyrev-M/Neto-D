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
    public function add($categoryName)
    {
        DB::table($this->table)->insert(
            ['category' => $categoryName]
        );
    }
    public function remove($categoryId)
    {
        DB::table($this->table)->where('id','=',$categoryId)->delete();
    }
    public function getName($categoryId)
    {
        $category = Category::find($categoryId);
        return $category->category;
    }
    public function updateCat($categoryId,$categoryName)
    {
        $category = Category::find($categoryId);
        $category->category = $categoryName;
        $category->updated_at = date('Y-m-d H:i:s');
        $category->save();
    }
    public function TakeNotEmpty()
    {   // выбор категорий, для которых есть опубликованные записи в таблице вопросов
        // select distinct categories.* from categories join questions on categories.id = questions.category_id where questions.status=3

        return DB::table($this->table)
            ->join('questions', $this->table.'.id', '=', 'questions.category_id')
            ->where('questions.status','=',3)
            ->select($this->table.'.*')->distinct()->get();

    }
}