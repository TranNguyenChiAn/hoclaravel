<?php

namespace App\Models;

use Illuminate\Auth\Authenticatable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Customer extends Model implements \Illuminate\Contracts\Auth\Authenticatable
{
    use HasFactory;
    use Authenticatable;

    //disable created_at updated_at
    public $timestamps = false;

    protected $fillable = ['name','email', 'password', 'phone', 'address', 'gender'];
    protected $table = 'customers';
}
