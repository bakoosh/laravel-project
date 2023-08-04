<?php

namespace App\Http\Controllers\Category;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Post;

class CategoryPostController extends Controller
{
    public function index(Category $category){
        $posts=$category->posts;
        return view('categories.posts.index',['posts'=>$posts]);
    }

}
