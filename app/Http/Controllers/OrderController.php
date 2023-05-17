<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\Category;
use App\Models\Product;
use App\Models\Cart;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $categories=Category::all();
        $category = Category::whereName('pollo')->first();
        //dd($categories->find($id));
        $products = Product::where('store_id',1)->where('category_id',8)->paginate(20);
        return view('products.list',compact('products','categories','category'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return('A vender se ha dicho');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $order = Order::create($request->all());
        //dd($request);
        $order->reference = $order->idxtra($order->id,$order->user_id);
        return redirect()->route('order.edit',compact('order',));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function show(Order $order)
    {
        $cart=Cart::where('order_id',$order->id)->get();
        //dd($cart->first()->product);
        return view('orders.shop-cart', compact('order','cart'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Order  $order
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function edit(Order $order)
    {
        $category = Category::whereName('pollo')->first();
        $products = Product::with('category')->where('store_id',1)->get();
        $categories = Category::all();
        return view('products.list', compact('order','products','categories'));//
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Order $order)
    {
        //dd($request->all());
        $cart = Cart::create($request->all());
        $cart->total($cart->quantity);
        $cart->update();
        $order->price = $order->carts->sum('total');
        $order->update();
        return redirect()->route('order.show',compact('order',));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function destroy(Order $order)
    {
        //
    }
}
