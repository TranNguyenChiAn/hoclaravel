<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Age extends Model
{
    use HasFactory;

    protected $fillable = ['name'];
    protected $table = 'ages';

    public function product(){
        return $this->hasMany(Product::class);
    }

}
