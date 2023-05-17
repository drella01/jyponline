<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Product;
use App\Models\User;
use App\Models\Cart;

class Order extends Model
{
    use HasFactory;


    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'quantity',
        'product_id',
        'cart_id',
        'price',
    ];

    /* Relations */

    public function cart()
    {
        return $this->belongsTo(Cart::class, 'cart_id');
    }


    public function carts()
    {
        return $this->hasMany(Cart::class);
    }

    public function products()
    {
        return $this->hasMany(Product::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

     /* Decorators */

     public function idxtra($id,$user_id)
     {
         $idXtra = '2023'.$id.'-'.$user_id;
         return $this->reference = $idXtra;
     }

}
