<?php

namespace App\Http\Controllers;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;
use App\Models\Admin;
use App\Models\Roles;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    public function register()
    {
        return view('admin.custom_auth.register');
    }

    public function login_auth()
    {
        return view('admin.custom_auth.login_auth');
    }

    public function register_auth(Request $request)
    {
        $validated_data = $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:admins',
            'password' => 'required',
            'phone' => 'required'

        ]);

        $validated_data['password'] = Hash::make($request->password);
        $user = new Admin();
        $user->name = $validated_data['name'];
        $user->email = $validated_data['email'];
        $user->password = $validated_data['password'];
        $user->phone = $validated_data['phone'];
        $user->save();

        return view('admin.users.login')->with('message', 'Đăng ký thanghf công');

    }

//    public function validation(Request $request){
//        return $this->validate($request,[
//            'name' => 'required',
//            'email' => 'required|email|unique:admins',
//            'password' => 'required',
//            'phone' => 'required'
//        ]);
//
//
//    }



}
