<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Order;
use App\Models\Category;
use App\Models\Photo;
use App\Models\Store;

class Product extends Model
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
        'idxtra',
    ];

    /* Relations */

    public function category()
    {
        return $this->belongsTo(Category::class, 'category_id');
    }

    public function photos()
    {
        return $this->hasMany(Photo::class);
    }

    public function store()
    {
        return $this->belongsTo(Store::class, 'store_id');
    }

    public function orders()
    {
        return $this->belongsToMany(Order::class, 'orders_products','order_id','product_id');
    }

    public function carts()
    {
        return $this->belongsToMany(Cart::class, 'carts_products','cart_id','product_id');
    }


}
