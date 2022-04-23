<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    use HasFactory;
    public $timestamps=false;
    protected $table='comments';
    protected $fillable = [
        'name',
        'content',
        'date',
        'food_id',
        'comment_parent_id',
        'status'
    ];
    public function food(){
        return $this->belongsTo('App\Models\Food', 'food_id');
    }
}
