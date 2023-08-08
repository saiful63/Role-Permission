<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;

class UserController extends Controller
{
    public function index(){
        $users = User::all();
        return view('admin.users.index',compact('users'));
    }

    public function edit(User $user){
        //return $user->id;
        $roles = Role::all();
        return view('admin.users.edit',compact('user','roles'));
    }

    public function assignRole(Request $request,User $user){

        $role = Role::findByName($request->assignRole);

        if($user->hasRole($role)){
          return 'Role already exists for user';
        }else{

            $user->assignRole($role);
            return back();
        }

    }
}
