<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Category;

class CategoriesController extends Controller
{
    //
    public function store(Request $request)
    {   // добавление новой категории
        $cat = new Category();
        $this->validate($request, [
            'title' => 'required|unique:categories,category|max:20|alpha_dash'
        ]);
        $cat->add($request->get('title'));
        return back();
    }
    public function delete($id)
    {   // удаление категории
        $cat = new Category();
        $cat->remove($id);
        return back();
    }
    public function edit($id)
    {   // вызов представления для редактирования названия категории
        $cat = new Category();
        return view('categoryedit', ['id'=>$id,'name'=>$cat->getName($id)]);
    }
    public function updateCatName(Request $request)
    {   // сохранение измененной категории
        $cat = new Category();
        $cat->updateCat($request->get('id'),$request->get('newname'));
        return redirect()->action('HomeController@index');
    }
}
