<?php

namespace App\Http\Controllers\Admin\Category;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Category\StoreRequest;
use App\Http\Requests\Admin\Category\UpdateRequest;
use App\Models\Category;

class ADMCategoryController extends Controller
{
    public function index(){
        $categories=Category::all();
        return view('admin.categories.index',['categories'=>$categories]);
    }

    public function create(){
        return view('admin.categories.create');
    }

    public function store(StoreRequest $request){
        $data=$request->validated();
        Category::create($data);
        return redirect()->route('admin.category.index');
    }

    public function show(Category $category){
        return view('admin.categories.show' ,['category'=>$category]);
    }

    public function edit(Category $category){
        return view('admin.categories.edit',['category'=>$category]);
    }

    public function update(Category $category , UpdateRequest $request){
        $data=$request->validated();
        $category->update($data);
        return redirect()->route('admin.category.show',['category'=>$category]);
    }

    public function delete(Category $category){

        $category->delete();
        return redirect()->route('admin.category.index');
    }

}
