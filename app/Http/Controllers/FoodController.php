<?php

namespace App\Http\Controllers;

use App\Models\Food;
use App\Models\FoodCategory;
use App\Models\Image;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class FoodController extends Controller
{
    public function index ()
    {
        $user = Auth::guard('admin')->user();
        $food_category = FoodCategory::all();
        $foods = Food::paginate(10);
        return view ('admin.foods.index', compact('user', 'foods', 'food_category'));
    }

    public function create()
    {
        $user = Auth::guard('admin')->user();
        $food_category = FoodCategory::all();
        return view('admin.foods.create', compact('user', 'food_category'));
    }

    public function store(Request $request)
    {
        $user = Auth::guard('admin')->user();
        $food_category = FoodCategory::all();

        $data = $request->validate([
            'name' => 'required',
            'description' => 'required',
            'food_category_id' => 'required',
            'price' => 'required',
            'number' => 'required',
            'file' => 'required'
        ]);

        $food = new Food();
        $food->name = $data['name'];
        $food->description = $data['description'];
        $food->food_category_id = $data['food_category_id'];
        $food->number = $data['number'];
        $food->price = $data['price'];
        $food->save();

        //Lay id cua san pham
        $insertedId = $food->id;

        //Luu hinh anh vao bang images
        $get_image = $request->file('file');
        if($get_image){
            foreach($get_image as $image) {
                $food_image = new Image();
                $food_image->food_id = $insertedId;
                $food_image->image_path = $image->move('storage', $image->getClientOriginalName());
                $food_image->save();

            }
        }

        return redirect()->route('admin.foods.index', ['foods'])->with('success', 'Thêm món thành công!');
    }

    public function show($id)
    {
        $user = Auth::guard('admin')->user();
        $categories = FoodCategory::all();
        $food = Food::find($id);
        $images = Image::all();

        return view('admin.foods.show', compact('user', 'categories', 'food', 'images'));
    }

    public function edit($id)
    {
        $user = Auth::guard('admin')->user();
        $categories = FoodCategory::all();
        $food = Food::find($id);
        return view('admin.foods.edit', compact('user', 'categories', 'food'));
    }

    public function update(Request $request, $id)
    {
        $user = Auth::guard('admin')->user();
        $food_category = FoodCategory::all();
        $validated_data = $request->validate([
            'name' => 'required',
            'description' => 'required',
            'food_category_id' => 'required',
            'price' => 'required'
        ]);


        $product = Food::find($id);

        $product->name = $validated_data['name'];
        $product->description = $validated_data['description'];
        $product->price = $validated_data['price'];
        $product->food_category_id = $validated_data['food_category_id'];
        $product->save();
        return redirect()->route('admin.foods.index', compact('user', 'food_category'))->with('success', 'Sửa thông tin món ăn thành công!');
    }

    public function delete($id)
    {
        $food = Food::find($id);
        Food::where('id', $id)->delete();
        return redirect()->route('admin.foods.index')->with('success', 'Xóa sản phẩm thành công!');
    }
}
