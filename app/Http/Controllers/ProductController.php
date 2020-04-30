<?php

namespace App\Http\Controllers;

use App\Product;

use App\Http\Requests\ProductRequest;
use Illuminate\Support\Facades\Storage; //para trabajos con los archivos dentro de storage

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $products = Product::latest()->get();
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
    public function store(ProductRequest $request)
    {
       // dd($request);
        $product = Product::create($request->all());

       if ($request->file('file')) {
            $product->image = $request->file('file')->store('products', 'public');
            $product->save();
        }

        return back()->with('status','Creado con exito');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function show(Product $product)
    {
        return view ('products.show', compact('product'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function edit(Product $product)
    {
       return view('products.edit', compact('product'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function update(ProductRequest $request, Product $product)
    {
        $product->update($request->all());

        if ($request->file('file')) {
            //Eliminar imagen
                Storage::disk('public')->delete($product->image);
            $product->image = $request->file('file')->store('products', 'public');
            $product->save();
        }

        return back()->with('status','Actualizado con exito');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function destroy(Product $product)
    {
        //eliminar imagen
        Storage::disk('public')->delete($product->image);
        $product->delete();

        return back()->with('status','Producto eliminado');
    }
}
