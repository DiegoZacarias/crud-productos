@extends('layouts.app')

@section('content')
<div class="container">
  <div class="row justify-content-center">
    <div class="col-md-12">
        <div class="card" style="overflow: auto;">
            <div class="card-header" style="display: flex; justify-content: space-around; align-items: center; border: 2px solid rgba(0,0,0,.2);">
             <h1> Productos </h1> 
                <a href=" {{ route('products.create') }}  " class="btn btn-lg btn-primary" >Agregar nuevo producto</a>
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
                                    <th>Creado</th>
                                    <th>Modificado</th>
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
                            <td> 
                            @if($product->specifications)
                              {{$product->specifications}} 
                              @else
                              No records
                              @endif
                            </td>
                            <td>
                            @if($product->dimensions)
                              {{$product->dimensions}} 
                              @else
                              No records
                              @endif 
                               
                            </td>
                            <td>${{$product->price}} </td>
                            <td> {{$product->stock}} </td>
                            <td> {{$product->flag}} </td>
                            <td> {{$product->created_at->format('d M Y H:i:s')}} </td>
                            <td> {{$product->updated_at->format('d M Y H:i:s')}} </td>
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