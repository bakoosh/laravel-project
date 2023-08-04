<?php

namespace App\Http\Controllers\Admin\User;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\User\StoreRequest;
use App\Http\Requests\Admin\User\UpdateRequest;
use App\Models\User;
use Illuminate\Support\Facades\Hash;


class ADMUserController extends Controller
{
    public function index(){
        $users=User::all();
        return view('admin.users.index',['users'=>$users]);
    }

    public function create(){
        $roles=User::getRoles();
        return view('admin.users.create',['roles'=>$roles]);
    }

    public function store(StoreRequest $request){
        $data=$request->validated();
        $data['password']=Hash::make($data['password']);
        User::create($data);
        return redirect()->route('admin.user.index');
    }

    public function show(User $user){
        return view('admin.users.show' ,['user'=>$user]);
    }

    public function edit(User $user){
        $roles=User::getRoles();
        return view('admin.users.edit',['user'=>$user,'roles'=>$roles]);
    }

    public function update(User $user , UpdateRequest $request){
        $data=$request->validated();
        $user->update($data);
        return redirect()->route('admin.user.show',['user'=>$user]);
    }

    public function delete(User $user){

        $user->delete();
        return redirect()->route('admin.user.index');
    }

}
