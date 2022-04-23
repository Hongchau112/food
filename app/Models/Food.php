<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Food extends Model
{
    use HasFactory;
    protected $table='foods';
    protected $fillable = [
        'name',
        'description',
        'food_category_id'
    ];

    public function comment(){
        return $this->hasMany('App\Models\Comment');
    }
}
