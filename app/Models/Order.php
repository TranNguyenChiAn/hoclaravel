<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;

    protected $fillable = ['date_buy','status','customer_id','receiver_name','receiver_phone','receiver_address'];
    protected $table = 'orders';

    public function scopeFilter($query, array $filters)
    {

    }
}
