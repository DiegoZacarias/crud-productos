@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">  
           
            <div class="card">
                     
                    @if($product->image)
                        <img src=" {{$product->get_image}} " class="card-img-top">
                        <br>

                    @endif
                <div class="card-body">
                    <h5 class="card-title"> {{ $product->title }} </h5>
                    

                    <p class="card-text"> 
                        {{$product->description}}
                    </p>
                    <p class="card-text"> 
                        @if( $product->specifications )
                            {{$product->specifications}}
                        @else
                            No tiene especificaciones
                        @endif


                    </p>
                    <p class="card-text"> 
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
                       {{$product->flag}} 

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
