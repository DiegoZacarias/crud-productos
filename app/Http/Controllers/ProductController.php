<?php

namespace App\Http\Controllers;

use App\Product;
use App\Image;

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
       // $image = new Image(); //nuevo

       if ($request->file('file')) {
            $product->image = $request->file('file')->store('products', 'public');
            $product->save();
        }


//nuevo
        $image = Image::create([
            'product_code' => $product->item_code,//Funciona para capturar el id del user actual
            'src_img' => $request->file('file2')->store('images', 'public')

        ]);

       /* if ($request->file('file2')) {
            $image->src_img = $request->file('file2')->store('images', 'public');

            $image->save();
        }*///nuevo

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
        $images = Image::where('product_code','=',$product->item_code)->get();
        return view ('products.show', compact('product','images'));
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

             $image = Image::create([
            'product_code' => $product->item_code,//Funciona para capturar el id del user actual
            'src_img' => $request->file('file2')->store('images', 'public')

        ]);

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
        $image = Image::where('product_code','=',$product->item_code)->get();

       // dd($image);

        //eliminar imagen
       /* Storage::disk('public')->delete($image->src_img);*/
        Storage::disk('public')->delete($product->image);

        /*$image->delete(); */
        $product->delete();

        return back()->with('status','Producto eliminado');
    }
}
