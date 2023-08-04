<?php

namespace App\Http\Controllers\Admin\Post;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Post\StoreRequest;
use App\Http\Requests\Admin\Post\UpdateRequest;
use App\Models\Category;
use App\Models\Post;
use App\Models\Tag;
use Illuminate\Support\Facades\Storage;
use mysql_xdevapi\Exception;

class ADMPostController extends Controller
{
    public function index(){
        $posts=Post::all();
        return view('admin.posts.index',['posts'=>$posts]);
    }

    public function create(){
        $categories=Category::all();
        $tags=Tag::all();
        return view('admin.posts.create',['categories'=>$categories,'tags'=>$tags]);
    }

    public function store(StoreRequest $request){

        try {
            $data=$request->validated();
            $tagIds=$data['tag_ids'];
            unset($data['tag_ids']);
            $data['preview_image']=Storage::disk('public')->put('/images',$data['preview_image']);
            $data['main_image']=Storage::disk('public')->put('/images',$data['main_image']);
            $post=Post::create($data);
            $post->tags()->attach($tagIds);
        }catch (Exception $exception){
            abort(404);
        }


        return redirect()->route('admin.post.index');
    }

    public function show(Post $post){
        return view('admin.posts.show' ,['post'=>$post]);
    }

    public function edit(Post $post){
        $categories=Category::all();
        $tags=Tag::all();
        return view('admin.posts.edit',['post'=>$post,'categories'=>$categories,'tags'=>$tags]);
    }

    public function update(Post $post , UpdateRequest $request){
        $data=$request->validated();
        $tagIds=$data['tag_ids'];
        unset($data['tag_ids']);

        $data['preview_image']=Storage::disk('public')->put('/images',$data['preview_image']);
        $data['main_image']=Storage::disk('public')->put('/images',$data['main_image']);
        $post->tags()->sync($tagIds);
        $post->update($data);
        return redirect()->route('admin.post.show',['post'=>$post]);
    }

    public function delete(Post $post){

        $post->delete();
        return redirect()->route('admin.post.index');
    }

}
