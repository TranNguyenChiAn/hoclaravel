<?php /** @noinspection PhpMultipleClassDeclarationsInspection */

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;
    public $timestamps = false;

    protected $table = 'products';
    protected $fillable = ['name','size', 'pieces', 'insiders_points',
        'items', 'description', 'category_id', 'age_id', 'quantity', 'price', 'image'];

    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function age()
    {
        return $this->belongsTo(Age::class);
    }

    public function order_detail()
    {
        return $this->belongsTo(Order::class);
    }
}
