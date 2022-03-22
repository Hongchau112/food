<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Product extends Model
{
    use HasFactory;
    protected $table='products';
    protected $fillable = [
        'name',
        'description',
        'product_type_id'
    ];

//    public function size() {
//        return $this->belongsToMany('App\Models\Size','product_prices','product_id','size_id')->withPivot('price', 'price_id')->as('product_prices');
//    }

    public function color() {
        return $this->belongsToMany('App\Models\Color','product_prices','product_id','color_id')->withPivot('price', 'price_id')->as('product_prices');
    }

    public function products()
    {
        return $this->belongsToMany(Product::class);
    }
}
