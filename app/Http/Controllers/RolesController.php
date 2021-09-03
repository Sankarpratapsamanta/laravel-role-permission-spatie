<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use App\PermissionGroup;

class RolesController extends Controller
{
    public function index()
    {
        $roles = Role::all();
        return view('layouts.Roles.index',compact('roles'));
    }

    public function create()
    {
        return view('layouts.Roles.create');
    }


    public function store(Request $request)
    {
        $role = new Role;
        $role->name = strtolower($request->name);
        $role->guard_name = 'web';

        $role->save();

        return redirect('/roles');
    }

    public function edit($id)
    {
        $role = Role::find($id);
        return view('layouts.Roles.edit',compact('role'));
        
    }

    public function update(Request $request,$id)
    {
        $role = Role::find($id);
        $role->name = $request->name;

        $role->save();
        return redirect('/roles');
    }

    public function delete(Request $request,$id)
    {
        // dd($request);
        $role = Role::find($id);
        $role->delete();
        return redirect('/roles');
    }

    public function assignPermissionView($id)
    {
        $role = Role::find($id);
        $permissions = PermissionGroup::with('permission')->get();
        // dd($permissions);
       
        return view('layouts.Roles.assignPermission',compact('permissions','role'));
    }

    public function assignPermissionStore(Request $request,$id)
    {
        // dd($request) ;
        $role = Role::find($id);
        $role->syncPermissions($request->permission);
        return redirect('/roles');
        // $permissions = Permission::all();
        // return view('layouts.Roles.assignPermission',compact('permissions','role'));
    }
}
