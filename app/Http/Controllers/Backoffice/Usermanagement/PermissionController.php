<?php

namespace App\Http\Controllers\Backoffice\Usermanagement;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Permission;

class PermissionController extends Controller
{
    public function index()
    {
        $permissions = Permission::latest()->get();
        return view('backoffice.usermanagement.permission.index', compact('permissions'));
    } // End Method

    public function create()
    {
        return view('backoffice.usermanagement.permission.create');
    } // End Method

    public function store(Request $request)
    {
        $permission = Permission::create([
            'name' => $request->name,
            'group_name' => $request->group_name,
        ]);
        $notification = array(
            'message' => 'Permission Created Successfully',
            'alert-type' => 'success'
        );
        return redirect()->route('permission.index')->with($notification);
    } // End Method

    public function edit($id)
    {
        $permission = Permission::find($id);
        return view('backoffice.usermanagement.permission.update', compact('permission'));
    } // End Method

    public function update(Request $request)
    {
        $per_id = $request->id;
        Permission::find($per_id)->update([
            'name' => $request->name,
            'group_name' => $request->group_name,
        ]);
        $notification = array(
            'message' => 'Permission Updated Successfully',
            'alert-type' => 'success'
        );
        return redirect()->route('permission.index')->with($notification);
    } // End Method

    public function destroy($id)
    {
        Permission::find($id)->delete();
        $notification = array(
            'message' => 'Permission Deleted Successfully',
            'alert-type' => 'success'
        );
        return redirect()->back()->with($notification);
    } // End Method
}
