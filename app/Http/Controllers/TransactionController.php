<?php

namespace App\Http\Controllers;

use App\Jobs\SendEmail;
use App\Models\Food;
use App\Models\Order;
use App\Models\Product;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class TransactionController extends Controller
{
    public function index()
    {
        $user = Auth::guard('admin')->user();
        $orders = Order::paginate(10);
        return view('admin.transactions.index',compact('user', 'orders'));
    }


    public function store(Request $request){
        $foods = Food::all();
        $data = $request->validate([
            'name' => 'required',
            'address' => 'required',
            'phone_number' => 'required',
            'email' => 'required',
            'payment' => 'required',
            'total' => 'required',
            'note' => 'nullable'
        ]);

        $order = new Order();
        $order->name=$data['name'];
        $order->address=$data['address'];
        $order->phone_number=$data['phone_number'];
        $order->total=$data['total'];
        $order->email=$data['email'];
        $order->note=$request->note;
        $order->payment='Thanh toán khi nhận hàng';
        $order->status=0;

        $order->save();

        //cap nhat so luong san co
        $order_id=$order->id;
        $i=0;

        foreach(session('cart')->foods as  $food){
            $food_order[$i]=([
                'order_id' => $order_id,
                'number_item' => $food['quanty'],
                'food_id' => $food['id'],
                'food_name' => $food['food']->name
            ]);
            $i++;
            $food_item = Food::find($food['id']);
            $old_number = $food_item->number;
            $food_item->foods_sold = $food['foods_sold'];
            $food_item->number = $old_number - ($food_item->foods_sold);
            $food_item->save();
        }
        $order->orders()->attach($food_order);
        $request->session()->forget('cart');
        SendEmail::dispatch($order)->delay(now()->addMinute(1));
        return redirect()->route('guest.index');
    }

}
