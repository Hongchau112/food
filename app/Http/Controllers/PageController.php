<?php

namespace App\Http\Controllers;

use App\Models\Admin;
use App\Models\Food;
use App\Models\FoodCategory;
use App\Models\Image;
use App\Models\Product;
use App\Models\ProductCategory;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class PageController extends Controller
{
    public function index()
    {
        $images = Image::all();
        $food_categories = FoodCategory::all();
        $foods = Food::paginate(8);
        $user = Auth::guard('admin')->user();
        if ($user)
        {
            return view('user.pages.index', compact('user','foods', 'food_categories' , 'images'));
        }
        else{
            return view('guest.pages.index', compact('foods', 'food_categories' , 'images'));
        }

    }

    public function show()
    {
        $food_categories = FoodCategory::all();
        $foods=Food::all();
        $images = Image::all();
        $user = Auth::guard('admin')->user();
        if ($user)
        {
            return view('user.pages.show', compact('user','foods', 'food_categories' , 'images'));
        }
        else{
            return view('guest.pages.show', compact('foods', 'food_categories', 'images'));
        }


    }

    public function detail($id)
    {
        $food = Food::find($id);
        $food_categories = FoodCategory::all();
        $images = Image::where('food_id', $id)->get();
        $user = Auth::guard('admin')->user();
        if ($user)
        {
            return view('user.pages.detail', compact('user','food', 'food_categories' , 'images'));
        }
        else{
            return view('guest.pages.detail', compact('food','food_categories', 'images'));
        }

    }

    public function show_category($id)
    {
        $food_selected = DB::select(
            'SELECT * FROM foods WHERE foods.food_category_id IN
            (SELECT category.id FROM food_categories as category WHERE (category.parent_category_id = ? ) OR (category.id=?))',[$id, $id]);

        for($i = 0 ; $i <count($food_selected);$i++){
            $food_selected[$i] = [$food_selected[$i]->id];
            // dd($test);
        }

        $foods = Food::whereIn('id',$food_selected)->paginate(8);

        $category = FoodCategory::find($id);
        $food_categories = FoodCategory::all();
        $images = Image::all();

        $user = Auth::guard('admin')->user();
        if ($user)
        {
            return view('user.pages.show_category', compact('user','foods', 'food_categories' , 'images', 'food_selected'));
        }
        else{
            return view(
                'guest.pages.show_category', compact('foods', 'food_selected', 'food_categories', 'images'));
        }

    }

    public function search(Request $request)
    {
        $key_search = $request->get('key_search');
        $food_categories = FoodCategory::all();
        $images = Image::all();

        $foods = Food::select('foods.*')
            ->join('food_categories', 'food_categories.id', '=', 'foods.food_category_id')
            ->where('food_categories.name','like','%'.$key_search.'%')->orWhere('foods.name','like','%'.$key_search.'%')
            ->paginate(12);
        $foods->appends(['$key_search' => $key_search]);
//        dd($foods);
        $user = Auth::guard('admin')->user();
        if($user){
            if($foods->count()==0)
                return view('user.pages.not_found',compact('user','foods','food_categories', 'images') );
            else
                return view('user.pages.show_category',compact('user','foods','food_categories', 'images'));
        }
        else{
            if($foods->count()==0)
                return view('guest.pages.not_found',compact('foods','food_categories', 'images') );
            else
                return view('guest.pages.show_category',compact('foods','food_categories', 'images'));
        }
    }

}
