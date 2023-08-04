<?php

namespace App\Http\Controllers\Admin\Main;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Post;
use App\Models\Tag;
use App\Models\User;

class ADMMainController extends Controller
{
    public function index(){
        $data=[];
        $data['userCount']=User::all()->count();
        $data['postCount']=Post::all()->count();
        $data['categoriesCount']=Category::all()->count();
        $data['tagCount']=Tag::all()->count();
        return view('admin.main.index',['data'=>$data]);
    }
}
