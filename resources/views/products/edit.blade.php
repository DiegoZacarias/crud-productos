@extends('layouts.app')

@section('content')
<div class="container">
  <div class="row justify-content-center">
      <div class="col-md-8">
          <div class="card">
            <div class="card-header">Editar Producto
                    
            </div>

            <div class="card-body">
                @if (session('status'))
                    <div class="alert alert-success" role="alert">
                        {{ session('status') }}
                    </div>
                @endif
              <form action=" {{route('products.update',$product->item_code)}} " method="POST" enctype="multipart/form-data" autocomplete="off"> <!-- ENCTYPE SIRVE PARA QUE EL FORMULARIO ACEPTE ARCHIVOS, CON UN IMPUT TIPO FILE -->
                  

                <div class="form-group">
                  <label>Titulo *</label>
                  <input type="text" name="title" class="form-control" value="{{old('title',$product->title)}} " required>  
                </div>



                <div class="form-group">
                  <label>Imagen</label>
                  <input type="file" name="file" >  
                </div>

                <div class="form-group">
                  <label>Imagen secundaria</label>
                  <input type="file" name="file2" >  
                </div>


                <div class="form-group">
                  <label>Descripcion *</label>
                  <textarea name="description" rows="6" class="form-control"  required>{{old('description',$product->description)}}</textarea>  
                </div>

                <div class="form-group">
                  <label>Especificaciones</label>
                  <input type="text" name="specifications" value="{{old('specifications',$product->specifications)}}" class="form-control">  
                </div>

                <div class="form-group">
                  <label>Dimensiones</label>
                  <input type="text" name="dimensions" value="{{old('dimensions',$product->dimensions)}}" class="form-control">  
                </div>

                 <div class="form-group">
                  <label>Precio *</label>
                  <input type="text" name="price" class="form-control" value="{{old('price',$product->price)}}"  required>  
                </div>

                 <div class="form-group">
                  <label>Stock *</label>
                  <input type="text" name="stock" value="{{old('stock',$product->stock)}}" class="form-control" required>  
                </div>

                <div class="form-group">
                  <label>Flag *</label>
                  <input type="text" name="flag" class="form-control" value="{{old('flag',$product->flag)}}" class="form-control"  required>  
                </div>

                <div class="form-group">
                  @csrf
                  @method('PUT')
                  <input type="submit" value="Guardar cambios" class="btn btn-sm btn-primary">  
                </div>



              </form>




            </div>
         </div>
     </div>
 </div>
</div>
@endsection