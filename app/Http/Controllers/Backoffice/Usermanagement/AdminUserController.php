<?php

namespace App\Http\Controllers\Backoffice\Usermanagement;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Spatie\Permission\Models\Role;
use App\Models\User;

class AdminUserController extends Controller
{
    public function index()
    {
        $alladmin = User::where('role', 'admin')->get();
        return view('backoffice.usermanagement.admin.index', compact('alladmin'));
    } // End Method

    public function create()
    {
        $roles = Role::all();
        return view('backoffice.usermanagement.admin.create', compact('roles'));
    } // End Method

    public function store(Request $request)
    {
        $user = new User();
        $user->username = $request->username;
        $user->name = $request->name;
        $user->email = $request->email;
        $user->phone = $request->phone;
        $user->address = $request->address;
        $user->password = Hash::make($request->password);
        $user->role = 'admin';
        $user->status = '1';
        $user->save();

        if ($request->roles) {
            $user->assignRole(collect($request->roles)->map(fn($val) => (int)$val));
        }

        $notification = array(
            'message' => 'New Admin Inserted Successfully',
            'alert-type' => 'success'
        );
        return redirect()->route('adminuser.index')->with($notification);
    } // End Method

    public function edit($id)
    {
        $user = User::find($id);
        $roles = Role::all();
        return view('backoffice.usermanagement.admin.update', compact('user', 'roles'));
    } // End Method

    public function update(Request $request, $id)
    {
        $user = User::find($id);
        $user->username = $request->username;
        $user->name = $request->name;
        $user->email = $request->email;
        $user->phone = $request->phone;
        $user->address = $request->address;
        $user->role = 'admin';
        $user->status = '1';
        $user->save();

        $user->roles()->detach();
        if ($request->roles) {
            $user->assignRole(collect($request->roles)->map(fn($val) => (int)$val));
        }

        $notification = array(
            'message' => 'Admin Updated Successfully',
            'alert-type' => 'success'
        );
        return redirect()->route('adminuser.index')->with($notification);
    } // End Method

    public function destroy($id)
    {
        $user = User::find($id);
        if (!is_null($user)) {
            $user->delete();
        }

        $notification = array(
            'message' => 'Backoffice User Deleted Successfully',
            'alert-type' => 'success'
        );
        return redirect()->back()->with($notification);
    } // End Method
}
