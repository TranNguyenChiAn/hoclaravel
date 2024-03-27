<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;
    public $timestamps = false;

    protected $primaryKey = 'id';
    protected $fillable = ['date_buy','status','customer_id','receiver_name','receiver_phone','receiver_address', 'payment_method'];
    protected $table = 'orders';

    public function order_detail()
    {
        return $this->belongsTo(OrderDetail::class);
    }
    public function admin()
    {
        return $this->belongsTo(Admin::class);
    }

    public function customer()
    {
        return $this->belongsTo(Customer::class);
    }
}
