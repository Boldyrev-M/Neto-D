<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Category;

class CategoriesController extends Controller
{
    //
    public function store(Request $request)
    {
        $cat = new Category();
        $this->validate($request, [
            'title' => 'required|unique:categories,category|max:20|alpha_dash'
        ]);
        $cat->add($request->get('title'));
        return back();
    }
    public function delete($id)
    {
        $cat = new Category();
        $cat->remove($id);
        return back();
    }
    public function edit($id)
    {
        $cat = new Category();
        return view('categoryedit', ['id'=>$id,'name'=>$cat->getName($id)]);
    }
    public function updateCatName(Request $request)
    {
        $cat = new Category();
        $cat->updateCat($request->get('id'),$request->get('newname'));
        return redirect()->action('HomeController@index');
    }
}
