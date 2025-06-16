<?php

namespace App\Http\Controllers\Backoffice\Usermanagement;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use App\Models\User;
use DB;

class RolePermissionController extends Controller
{
    public function index()
    {
        $roles = Role::all();
        return view('backoffice.usermanagement.rolesetup.index', compact('roles'));
    } // End Method

    public function create()
    {
        $roles = Role::all();
        $permissions = Permission::all();
        $permission_groups = User::getPermissionGroups();

        return view('backoffice.usermanagement.rolesetup.create', compact('roles', 'permission_groups', 'permissions'));
    } // End Method

    public function store(Request $request)
    {
        $data = array();
        $permissions = $request->permission;

        foreach ($permissions as $key => $item) {
            $data['role_id'] = $request->role_id;
            $data['permission_id'] = $item;

            DB::table('role_has_permissions')->insert($data);
        } // end foreach


        $notification = array(
            'message' => 'Role Permission Added Successfully',
            'alert-type' => 'success'
        );
        return redirect()->route('roles.permission.index')->with($notification);
    } // End Method

    public function edit($id)
    {
        $role = Role::find($id);
        $permissions = Permission::all();
        $permission_groups = User::getpermissionGroups();

        return view('backoffice.usermanagement.rolesetup.update', compact('role', 'permission_groups', 'permissions'));
    } // End Method

    public function update(Request $request, $id)
    {
        $role = Role::find($id);
        $permissions = $request->permission;

        if (!empty($permissions)) {
            //$role->syncPermissions($permissions);
            $role->syncPermissions(array_map(fn($val) => (int)$val, $permissions));
        }

        $notification = array(
            'message' => 'Role Permission Updated Successfully',
            'alert-type' => 'success'
        );
        return redirect()->route('roles.permission.index')->with($notification);
    } // End Method

    public function destroy($id)
    {
        $role = Role::find($id);
        if (!is_null($role)) {
            $role->delete();
        }

        $notification = array(
            'message' => 'Role Permission Deleted Successfully',
            'alert-type' => 'success'
        );
        return redirect()->back()->with($notification);
    } // End Method
}
