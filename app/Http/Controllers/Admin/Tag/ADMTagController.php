<?php

namespace App\Http\Controllers\Admin\Tag;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Tag\StoreRequest;
use App\Http\Requests\Admin\Tag\UpdateRequest;
use App\Models\Tag;


class ADMTagController extends Controller
{
    public function index(){
        $tags=Tag::all();
        return view('admin.tags.index',['tags'=>$tags]);
    }

    public function create(){
        return view('admin.tags.create');
    }

    public function store(StoreRequest $request){
        $data=$request->validated();
        Tag::create($data);
        return redirect()->route('admin.tag.index');
    }

    public function show(Tag $tag){
        return view('admin.tags.show' ,['tag'=>$tag]);
    }

    public function edit(Tag $tag){
        return view('admin.tags.edit',['tag'=>$tag]);
    }

    public function update(Tag $tag , UpdateRequest $request){
        $data=$request->validated();
        $tag->update($data);
        return redirect()->route('admin.tag.show',['tag'=>$tag]);
    }

    public function delete(Tag $tag){

        $tag->delete();
        return redirect()->route('admin.tag.index');
    }

}
