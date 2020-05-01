@extends('layouts.app')

@section('content')


<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">  
           
            <div class="card">
                     
                   <div>
                       <h4>Imagen principal del producto</h4>
                    
                    @if($product->image)
                        <img src=" {{$product->get_image}} " class="card-img-top">
                        <br>

                    @endif
                </div> 

                <div >
                <h4>Imagenes secundarias</h4>

                    @foreach($images as $image)
                        <img src="{{$image->get_image}}" class="card-img-top">
                        <br>
                    @endforeach
                </div> 

                <div class="card-body">
                    <h5 class="card-title"> <span style="font-weight: bold;">Titulo: </span> {{ $product->title }} </h5>
                    

                    <p class="card-text"> 
                      <span style="font-weight: bold;">Descripcion: </span>  {{$product->description}}
                    </p>
                    <p class="card-text"> 
                        <span style="font-weight: bold;">Especificaciones: </span>
                        @if( $product->specifications )
                            {{$product->specifications}}
                        @else
                            No tiene especificaciones
                        @endif


                    </p>
                    <p class="card-text"> 
                            <span style="font-weight: bold;">Dimensiones: </span>
                        @if( $product->dimensions )

                        {{$product->dimensions}}
                        @else
                            No hay datos de dimensiones
                        @endif
                        

                    </p>

                    <p class="card-text"> 
                        <span style="font-weight: bold;">Precio: </span>
                        $ {{$product->price}}
                    </p>

                    <p class="card-text"> 
                        <span style="font-weight: bold;">Stock disponible: </span>
                       {{$product->stock}} unidades.

                    </p>

                    <p class="card-text"> 
                        <span style="font-weight: bold;">Flag: </span>
                      @if($product->flag = 1)
                        true
                        @else
                        false
                        @endif

                    </p>

                    <p class="text-muted mb-0">
                        
                        <em>
                           <span style="font-weight: bold" >Creado el:</span> {{$product->created_at->format('d M Y H:i:s')}} <br>
                            <span style="font-weight: bold" >Modificado el:</span> {{$product->updated_at->format('d M Y H:i:s')}}
                        </em>

                    </p>

               
                </div>
            </div>

       


        </div>
    </div>
</div>
@endsection
