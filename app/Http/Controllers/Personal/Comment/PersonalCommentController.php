<?php

namespace App\Http\Controllers\Personal\Comment;

use App\Http\Controllers\Controller;
use App\Http\Requests\Personal\Comment\StoreRequest;
use App\Models\Comment;


class PersonalCommentController extends Controller
{
    public function index(){
        $comments=auth()->user()->comments;
        return view('personal.comments.index',['comments'=>$comments]);
    }
    public function edit(Comment $comment){
        return view('personal.comments.edit',['comment'=>$comment]);
    }
    public function update(Comment $comment, StoreRequest $request){
        $data=$request->validated();
        $comment->update($data);
        return redirect()->route('personal.comment.index');
    }
    public function delete(Comment $comment){
        $comment->delete();
        return redirect()->route('personal.comment.index');

    }
}
