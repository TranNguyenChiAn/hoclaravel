<?php

namespace App\Models;

use App\Http\Middleware\Authenticate;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Hash;
use Illuminate\Foundation\Auth\User as Authenticatable;

class Admin extends Authenticatable
{
    use HasFactory;
    public $timestamps = false;
    protected $fillable = ['name','email','password'];
    protected $table = 'admins';

    public function setPasswordAttributes($password)
    {
        $this->attributes['password'] = Hash::make($password);
    }

}
