<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\Food;
use App\Models\FoodCategory;
use App\Models\Image;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CartController extends Controller
{

    public function add_cart(Request $request, $id)
    {
        $food = Food::find($id);
        if ($food != null)
        {
            $old_cart = Session('cart') ? Session('cart'):null;
            $new_cart = new Cart($old_cart);
            $new_cart->AddCart($food, $request->id, $id, $request->price, $request->foods_sold);
            $request->session()->put('cart', $new_cart);
        }
//        dd(Session('cart'));
        return redirect()->route('guest.detail', ['id' => $food->id]);

    }

    public function show_cart()
    {
        $food_categories = FoodCategory::all();
        $images = Image::all();

        $user = Auth::guard('admin')->user();
        if ($user)
        {
            return view('user.pages.show_cart', compact('user', 'food_categories' , 'images'));
        }
        else{
            return view ('guest.pages.show_cart', compact('images', 'food_categories'));
        }


    }

    public function delete_cart(Request $request, $id)
    {
//        dd($id);
        $old_cart = Session('cart') ? Session('cart'): null;
        $new_cart = new Cart($old_cart);
        $new_cart->DeleteItemCart($id);
        if(Count($new_cart->foods) > 0)
        {
            $request->Session()->put('cart', $new_cart);
        }
        else{
            $request->Session()->forget('cart');
        }
        redirect()->route('guest.show_cart');
    }

    public function order()
    {
        $food_categories = FoodCategory::all();
        $user = Auth::guard('admin')->user();
        if ($user)
        {
            return view('user.pages.order_item', compact('user', 'food_categories' ));
        }
        else{
            return view('guest.pages.order_item', compact('food_categories'));
        }

    }
}
