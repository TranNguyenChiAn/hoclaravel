<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PaymentMethod extends Model
{
    use HasFactory;
    public $timestamps = false;
    protected $table = 'payment_method';
    protected $primaryKey = 'id';

    protected $fillable = ['name'];

    public function order(){
        return $this->hasMany(Order::class);
    }
}
