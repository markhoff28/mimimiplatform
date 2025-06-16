<?php

namespace App\Http\Controllers\Backoffice\Usermanagement;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;

class RoleController extends Controller
{
    public function index()
    {
        $roles = Role::latest()->get();
        return view('backoffice.usermanagement.roles.index', compact('roles'));
    } // End Method

    public function create()
    {
        return view('backoffice.usermanagement.roles.create');
    } // End Method

    public function store(Request $request)
    {

        Role::create([
            'name' => $request->name,
        ]);
        $notification = array(
            'message' => 'Role Created Successfully',
            'alert-type' => 'success'
        );
        return redirect()->route('roles.index')->with($notification);
    } // End Method

    public function edit($id)
    {
        $roles = Role::find($id);
        return view('backoffice.usermanagement.roles.update', compact('roles'));
    } // End Method

    public function update(Request $request)
    {
        $role_id = $request->id;

        Role::find($role_id)->update([
            'name' => $request->name,
        ]);

        $notification = array(
            'message' => 'Role Updated Successfully',
            'alert-type' => 'success'
        );
        return redirect()->route('roles.index')->with($notification);
    } // End Method

    public function destroy($id)
    {
        Role::find($id)->delete();
        $notification = array(
            'message' => 'Role Deleted Successfully',
            'alert-type' => 'success'
        );
        return redirect()->back()->with($notification);
    } // End Method
}
