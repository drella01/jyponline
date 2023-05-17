<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreProductRequest;
use App\Http\Requests\UpdateProductRequest;
use App\Models\Product;
use App\Models\Photo;
use App\Models\Store;
use Storage;
use File;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $products = Product::where('store_id',1)->paginate(20);
        return view('products.list',compact('products'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('products.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreProductRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreProductRequest $request)
    {
        //dd($request->all());
        $product = Product::create($request->all());
        $x = collect();
        if ($request->photo){
            foreach ($request->photo as $key => $photo) {
                $filename = $photo->getClientOriginalName();
                $url = Storage::putFileAs('public', $photo, $filename);
                $url = str_replace('public','storage',$url);
                $photo = Photo::create(['url'=>$url]);
                $product->photos()->save($photo);
            }
        }
        return redirect()->route('product.create')->with('info','Producto dado de alta');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function show(Product $product)
    {
        $products = Product::where('category_id',$product->category_id)->get()->random(5);
        return view('products.show',compact('product','products'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function edit(Product $product)
    {
        return view('products.edit',compact('product'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateProductRequest  $request
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateProductRequest $request, Product $product)
    {

        //dd($request->all());
        $product->update($request->all());
        if ($request->photo){
            foreach ($request->photo as $key => $photo) {
                $filename = $photo->getClientOriginalName();
                $url = Storage::putFileAs('public', $photo, $filename);
                $url = str_replace('public','storage',$url);
                $photo = Photo::create(['url'=>$url]);
                $product->photos()->save($photo);
            }
        }
        return redirect()->route('product.create')->with('info','Producto actualizado');
        //return $request;//
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function destroy(Product $product)
    {
        //
    }
}
