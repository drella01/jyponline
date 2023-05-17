<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Product;
use App\Models\Order;


class Cart extends Model
{
    use HasFactory;

    /**
    * The attributes that are mass assignable.
    *
    * @var array<int, string>
    */

    protected $fillable = [
       'name',
       'description',
       'price',
       'category_id',
       'store_id',
       'order_id',
       'product_id',
       'quantity',
       'total',
   ];

    /* Relations */

    public function product()
    {
        return $this->belongsTo(Product::class, 'product_id');
    }


    public function order()
    {
        return $this->belongsTo(Order::class,'order_id');
    }

    public function total($units)
    {
        return $this->total = $this->product->price*$units;
    }

}

