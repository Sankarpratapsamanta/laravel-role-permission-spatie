<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Spatie\Permission\Models\Permission;
use App\PermissionGroup;

class PermissionController extends Controller
{
    public function index()
    {
        $permissionsGroup = PermissionGroup::all();
        return view('layouts.permissions.index',compact('permissionsGroup'));
    }

    public function create()
    {
        $permissionGroups = PermissionGroup::all();
        return view('layouts.permissions.create',compact('permissionGroups'));
    }

    public function getCleanSlug($string, $delimiter = '-'){
        // Remove special characters
        $string = preg_replace("/[~`{}.'\"\!\@\#\$\%\^\&\*\(\)\_\=\+\/\?\>\<\,\[\]\:\;\|\\\]/", "", $string);
        // Replace blank space with delimeter
        $string = preg_replace("/[\/_|+ -]+/", $delimiter, $string);
        // Remove the last -, if there is one
        if (substr($string, -1) === '-') {
            $string = substr($string, 0, -1); // Remove last char
        }
        return mb_strtolower($string);
        
    }

    public function store(Request $request)
    {
       
        // $permission = new Permission;
        // $permission->permission_group_id = $request->permission_group_id;
        // $permission->name = "Create";
        // $permission->slug = $slug_."create";
        // $permission->guard_name = 'web';
        // $permission->save();

        // $permission = new Permission;
        // $permission->permission_group_id = $request->permission_group_id;
        // $permission->name = "Read";
        // $permission->slug = $slug_."read";
        // $permission->guard_name = 'web';
        // $permission->save();

        // $permission = new Permission;
        // $permission->permission_group_id = $request->permission_group_id;
        // $permission->name = "Update";
        // $permission->slug = $slug_."update";
        // $permission->guard_name = 'web';
        // $permission->save();

        // $permission = new Permission;
        // $permission->permission_group_id = $request->permission_group_id;
        // $permission->name = "Delete";
        // $permission->slug = $slug_."delete";
        // $permission->guard_name = 'web';
        // $permission->save();
        // return redirect('/permissions');
    }

    public function edit($id)
    {
        $permission = Permission::find($id);
        return view('layouts.permissions.edit',compact('permission'));
        
    }

    public function update(Request $request,$id)
    {
        $permission = Permission::find($id);
        $permission->name = $request->name;

        $permission->save();
        return redirect('/permissions');
    }

    public function delete(Request $request,$id)
    {
        $permissionGroup = PermissionGroup::find($id);
        $permission = Permission::where('permission_group_id',$permissionGroup->name)->get();
        $permission->each->delete();
        $permissionGroup->delete();

        return redirect('/permissions');
    }

    public function createPermissionGroup(Request $request)
    {
        return view('layouts.Permissions.create');
    }

    public function storePermissionGroup(Request $request)
    {
        $slug= $this->getCleanSlug($request->name);
        $permissiongroup = new PermissionGroup();
        $permissiongroup->name = $request->name;
        $permissiongroup->slug = $slug;

        if($permissiongroup->save()){
        $permission = new Permission;
        $permission->permission_group_id = $request->name;
        $permission->name = $slug."_create";
        $permission->slug = "Create";
        $permission->guard_name = 'web';
        $permission->save();

        $permission = new Permission;
        $permission->permission_group_id = $request->name;
        $permission->name = $slug."_read";
        $permission->slug = "Read";
        $permission->guard_name = 'web';
        $permission->save();

        $permission = new Permission;
        $permission->permission_group_id = $request->name;
        $permission->name = $slug."_update";
        $permission->slug = "Update";
        $permission->guard_name = 'web';
        $permission->save();

        $permission = new Permission;
        $permission->permission_group_id = $request->name;
        $permission->name = $slug."_delete";
        $permission->slug = "Delete";
        $permission->guard_name = 'web';
        $permission->save();
        
        }
        return redirect('/permissions');
    }
}
