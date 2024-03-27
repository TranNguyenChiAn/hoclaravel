<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Support\Facades\Hash;


class Customer extends Authenticatable
{
    use HasFactory;

    //disable created_at updated_at
    public $timestamps = false;

    protected $primaryKey = 'id';

    public function setPasswordAttributes($password)
    {
        $this->attributes['password'] = Hash::make($password);
    }

    protected $fillable = ['name','email', 'password', 'phone', 'address', 'gender'];
    protected $table = 'customers';

    public function order()
    {
        return $this->hasMany(Order::class);
    }
}
