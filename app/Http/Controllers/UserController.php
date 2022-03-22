<?php

namespace App\Http\Controllers;

use App\Models\Admin;
use App\Models\Roles;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    public function index()
    {
        $user = Auth::guard('admin')->user();
        $user_list = Admin::with('roles')->orderBy('admin_id', 'DESC')->paginate(5);
        return view('admin.users.index', compact('user_list', 'user'));
    }

    public function assign_roles(Request $request)
    {
//        dd($request->all());
        $user = Admin::where('email', $request->email)->first();
//        dd($request->email);
        $user->roles()->detach();


        if ($request->admin_role){
            $user->roles()->attach(Roles::where('name', 'admin')->first());
        }
        if ($request->user_role){
            $user->roles()->attach(Roles::where('name', 'user')->first());
        }
        return redirect()->back()->with('success', 'Cấp quyền thành công!');
    }

}
