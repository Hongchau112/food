<?php

namespace App\Http\Controllers;

use App\Models\Admin;
use App\Models\Food;
use App\Models\FoodCategory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;
use App\Models\ProductCategory;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class FoodCategoryController extends Controller
{
    public function index()
    {
        $user = Auth::guard('admin')->user();
        $food_category = FoodCategory::paginate(10);
        return view('admin.food_categories.index', compact('user','food_category'));
    }

    public function create()
    {
        $user = Auth::guard('admin')->user();
        $food_category = FoodCategory::all();
        return view('admin.food_categories.create', compact('user', 'food_category'));
    }

    public function store(Request $request)
    {
        $user = Auth::guard('admin')->user();
        $validated_data = $request->validate([
            'name' => 'required',
            'description' => 'required',
            'parent_category_id' => 'required',
        ]);
//        var_dump($validated_data);exit();
        $food_category = new FoodCategory();
        $food_category->name = $validated_data['name'];
        $food_category->description = $validated_data['description'];
        $food_category->parent_category_id = $validated_data['parent_category_id'];
        $food_category->save();

        return redirect()->route('admin.food_categories.index')->with('success', 'Thêm danh mục thành công!');
    }

    public function edit($id)
    {
        $user = Auth::guard('admin')->user();
        $food_category = FoodCategory::find($id);
        $categories = FoodCategory::all();
        return view('admin.food_categories.edit', compact('user', 'food_category', 'categories'));
    }

    public function update(Request $request, $id)
    {
        $user = Auth::guard('admin')->user();
        $validated_data = $request->validate([
            'name' => 'required',
            'description' => 'required',
            'parent_category_id' => 'required',
        ]);

        $food_category = FoodCategory::find($id);
        $food_category->name = $validated_data['name'];
        $food_category->description = $validated_data['description'];
        $food_category->parent_category_id = $validated_data['parent_category_id'];
        $food_category->save();

        return redirect()->route('admin.food_categories.index')->with('success', 'Sửa danh mục thành công!');
    }

    public function delete($id)
    {
        FoodCategory::where('id', $id)->delete();
        return redirect()->route('admin.food_categories.index')->with('success', 'Xóa danh mục thành công!');
    }

}
