<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
<<<<<<< HEAD
use App\Models\Product;  
use App\Models\Customer;
=======

>>>>>>> 715f2269e080ba6d207564aabab742cda01e5e38
class CartItem extends Model
{
    use HasFactory;

    protected $fillable = [
        'customer_id',
        'product_id',
        'quantity',
        'variant',
        'is_selected',
        'note',
    ];

    protected $casts = [
        'is_selected' => 'boolean',
    ];

    public function product()
    {
        return $this->belongsTo(Product::class);
    }

    public function customer()
    {
<<<<<<< HEAD
        return $this->belongsTo(Customer::class, 'customer_id');
=======
        return $this->belongsTo(User::class, 'customer_id');
>>>>>>> 715f2269e080ba6d207564aabab742cda01e5e38
    }
}
?>
