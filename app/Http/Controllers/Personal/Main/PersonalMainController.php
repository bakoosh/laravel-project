<?php

namespace App\Http\Controllers\Personal\Main;

use App\Http\Controllers\Controller;

class PersonalMainController extends Controller
{
    public function index(){
        $commentsCount=auth()->user()->comments->count();
        return view('personal.main.index',['comCount'=>$commentsCount]);
    }
}
