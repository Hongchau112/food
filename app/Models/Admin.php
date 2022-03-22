<?php

namespace App\Models;
use Illuminate\Auth\Authenticatable;
use Illuminate\Contracts\Auth\Authenticatable as AuthenticatableContract;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Admin extends Model implements AuthenticatableContract
{
    use HasFactory;
    use Authenticatable;
    protected $fillable = [
      'name', 'phone', 'email', 'password'
    ];
    protected $table='admins';

    public function roles(){
        return $this->belongsToMany('App\Models\Roles');

    }

    public function has_role($role)
    {
        return null != $this->roles()->where('name', $role)->first();
    }

}
