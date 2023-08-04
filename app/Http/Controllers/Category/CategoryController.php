<?php

namespace App\Http\Controllers\Category;

use App\Http\Controllers\Controller;
use App\Http\Requests\Main\Comment\StoreRequest;
use App\Models\Category;
use App\Models\Comment;
use App\Models\Post;


class CategoryController extends Controller
{
    public function index(){
        $categories=Category::all();
        return view('categories.index',['categories'=>$categories]);
    }

}
