<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProductPrice extends Model
{
    use HasFactory;
    protected $table = 'product_prices';
    protected $fillable = [
        'price_id',
        'product_id',
        'color_id',
        'size_id',
        'price',
        'date_apply'
    ];

}
