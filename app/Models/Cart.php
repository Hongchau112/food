<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cart extends Model
{
    use HasFactory;
    public $foods = null;
    public $total_price = 0;
    public $total_quanty = 0;

    public function __construct($cart){
        if($cart){
            $this->foods = $cart->foods;
            $this->total_price = $cart->total_price;
            $this->total_quanty = $cart->total_quanty;
        }else{
            $foods = [];
        }
    }

    public function AddCart($food, $id, $food_id, $price)
    {
        $new_food = ['price_id' => $id , 'id' => $food_id, 'quanty' => 0, 'price' => $price,'food' => $food];
        if ($this->foods)
        {
            if(array_key_exists($id, $this->foods)){
                $new_food = $this->foods[$id];
            }
        }
        $new_food['quanty']++;
        $new_food['price'] = $new_food['quanty']*$price;

        $this->foods[$id] = $new_food;
        $this->total_price += $price;
        $this->total_quanty++;

    }

    public function DeleteItemCart($id)
    {
        $this->total_quanty -= $this->foods[$id]['quanty'];
        $this->total_price -= $this->foods[$id]['price'];
        unset($this->foods[$id]);

    }
//
//    public function UpdateItemCart($id, $quanty, $price){
//        $this->total_quanty -= $this->products[$id]['quanty'];
//        $this->total_price -=$this->products[$id]['price'];
//
//        $this->products[$id]['quanty'] = $quanty;
//        $this->products[$id]['price'] = $quanty * $price;
//
//        $this->total_quanty += $this->products[$id]['quanty'];
//        $this->total_price +=$this->products[$id]['price'];
//
//    }

}
