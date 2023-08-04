<?php

namespace App\Http\Controllers\Main\Post;

use App\Http\Controllers\Controller;
use App\Models\Post;

class PostController extends Controller
{
    public function index(){
        $posts=Post::paginate(4);
        return view('main.posts.index',['posts'=>$posts]);
    }

    public function show(Post $post){
        return view('main.posts.show',['post'=>$post]);
    }
}
