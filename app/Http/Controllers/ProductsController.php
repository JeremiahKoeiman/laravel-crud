<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProductsUpdateRequest;
use App\Product;
use App\Http\Requests\ProductsStoreRequest;

class ProductsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //get all products
        $products = Product::all();

        //return a view and send the variable $products with it.
        return view('products.index', compact('products'));
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
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ProductsStoreRequest $request)
    {
        //create new Product
        $product = new Product();
        //attributes00000000
        $product->productname = $request->productname;
        $product->description = $request->description;
        $product->price = $request->price;
        //save product in Database (execute inserts)
        $product->save();

        return redirect()->route('products.index')->with('message', 'Product aangemaakt.');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function show(Product $product)
    {
        //
        return view('products.show', compact('product'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function edit(Product $product)
    {
        //
        return view('products.edit', compact('product'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function update(ProductsUpdateRequest $request, Product $product)
    {
        //
        $product->productname = $request->productname;
        $product->description = $request->description;
        $product->price = $request->price;
        //save product in database (execute update)
        $product->save();

        return redirect()->route('products.index')->with('message', 'Product gewijzigd.');
    }

    /**
     * Show the form for deleting the specified resource.
     *
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function delete(Product $product)
    {
        return view('products.delete', compact('product'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param \App\Product $product
     * @return \Illuminate\Http\Response
     * @throws \Exception
     */
    public function destroy(Product $product)
    {
        $product->delete();
        return redirect()->route('products.index')->with('message', 'Product verwijderd.');
    }
}
