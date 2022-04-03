<?php

namespace App\Http\Controllers;

use App\Models\Admin;
use App\Models\Food;
use App\Models\FoodCategory;
use App\Models\Image;
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

    public function all_foods()
    {
        $user = Auth::guard('admin')->user();
        $foods = Food::paginate(8);
        $food_categories = FoodCategory::all();
        $images = Image::all();
        return view('user.pages.index', compact('foods', 'user', 'images', 'food_categories'));
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
