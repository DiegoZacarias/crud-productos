@extends('layouts.app')

@section('content')
<div class="container">
  <div class="row justify-content-center">
    <div class="col-md-8">
        <div class="card">
            <div class="card-header">Productos
                <a href=" {{ route('products.create') }}  " class="btn btn-sm btn-primary" >Crear</a>
            </div>

            <div class="card-body">
                @if (session('status'))
                    <div class="alert alert-success" role="alert">
                        {{ session('status') }}
                    </div>
                 @endif

          <table class="table">
                            
                  <thead>
                       <tr>
                              <th>Cod_articulo</th>
                                    <th>Titulo</th>
                                    <th>Imagen</th>
                                    <th>Descripcion</th>
                                    <th>Especificaciones</th>
                                    <th>Dimensiones</th>
                                    <th>Precio</th>
                                    <th>Stock</th>
                                    <th>Flag</th>
                              <th colspan="2" >Opciones</th>
                                </tr>
                       </thead>
                      <tbody>
                               @foreach( $products as $product)
                          <tr>
                              <td> {{$product->item_code}} </td>
                            <td> <a href=" {{route('products.show',$product->item_code)}} ">{{$product->title}}</a>  </td>
                            <td> {{$product->get_excerptimg}}... </td>
                            <td> {{$product->get_excerpt}}... </td>
                            <td> {{$product->specifications}} </td>
                            <td> {{$product->dimensions}} </td>
                            <td> {{$product->price}} </td>
                            <td> {{$product->stock}} </td>
                            <td> {{$product->flag}} </td>
                                 <td> 
                                       <a href=" {{ route('products.edit', $product->item_code )}} " class="btn btn-sm btn-primary">Editar</a>

                             </td>
                            <td>
                                       <form action=" {{ route('products.destroy', $product->item_code )}} " method="post">
                                        @csrf
                                              @method('DELETE')

                                              <input type="submit" value="Eliminar" class="btn btn-sm btn-danger" onclick=" return confirm('Desea eliminar?')">
                                                    

                                        </form>
                                    </td>
                               </tr>
                         @endforeach
                       </tbody>


                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection