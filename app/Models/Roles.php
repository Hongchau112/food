<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Roles extends Model
{
    protected $fillable = [
        'name'
];
    protected $table='roles';

    use HasFactory;

    public function admin(){
        return $this->belongsToMany('App\Admin');
    }
}
