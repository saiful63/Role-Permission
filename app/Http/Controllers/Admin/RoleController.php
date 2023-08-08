<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class RoleController extends Controller
{
    public function index(){
        $roles = Role::whereNotIn('name',['admin'])->get();
        return view('admin.roles.index',compact('roles'));
    }

    public function create(){
        return view('admin.roles.create');
    }

    public function store(Request $request){
       $request->validate([
        'name'=>['required','min:3']
       ]);

       Role::create([
        'name'=>$request->name
       ]);

       return to_route('admin.roles.index');
    }

    public function edit(Role $role){
       $permissions = Permission::all();
       return view('admin.roles.edit',compact('role','permissions'));
    }

    public function update(Request $request,Role $role){
       $request->validate([
        'name'=>['required','min:3']
       ]);

       $role->update([
       'name'=>$request->name
       ]);

       return redirect()->route('admin.roles.index');
    }

    public function destroy(Role $role){
      $role->delete();
      return back();
    }

    public function givePermission(Request $request,Role $role){
      //return $request->permission;
      if($role->hasPermissionTo($request->permission)){
        return back();
      }else{
        $role->givePermissionTo($request->permission);
      }

    }

    public function revokePermission(Role $role,Permission $permission){
        if($role->hasPermissionTo($permission)){
          $role->revokePermissionTo($permission);
          return back();
        }
    }
}
