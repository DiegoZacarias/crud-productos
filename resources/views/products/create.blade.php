@extends('layouts.app')

@section('content')

        <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>

        <link rel="stylesheet" href="assets/js/jquery-ui/jquery-ui.min.css" />
        <link rel="stylesheet" href="assets/js/jquery-ui/jquery-ui.theme.min.css" />
<script src="http://code.jquery.com/jquery-1.11.2.min.js"></script>

<script>
    $(document).ready(function(){
        
        // El formulario que queremos replicar
        var formulario = $("#copy").html();
        
// El encargado de agregar más formularios
$("#btn-agregar").click(function(){
    // Agregamos el formulario
    $("#imagenes").prepend(formulario);

    // Agregamos un boton para retirar el formulario
    $("#imagenes .col-xs-4:first .well").append('<button class="btn-danger btn btn-sm btn-retirar" type="button">Retirar</button>');

    // Hacemos focus en el primer input del formulario
    $("#imagenes .col-xs-4:first .well input:first").focus();

    // Volvemos a cargar todo los plugins que teníamos, dentro de esta función esta el del datepicker assets/js/ini.js
    Plugins();
});
        
        // Cuando hacemos click en el boton de retirar
        $("#imagenes").on('click', '.btn-retirar', function(){
            $(this).closest('.col-xs-4').remove();
        })
            
        $("#frm-alumno").submit(function(){
            return $(this).validate();
        });
    })
</script>



<div class="container">
  <div class="row justify-content-center">
      <div class="col-md-8">
          <div class="card">
            <div class="card-header">Crear Producto
                    
            </div>

            <div class="card-body">
                @if (session('status'))
                    <div class="alert alert-success" role="alert">
                        {{ session('status') }}
                    </div>
                @endif
              <form action=" {{route('products.store')}} " method="POST" enctype="multipart/form-data" autocomplete="off"> <!-- ENCTYPE SIRVE PARA QUE EL FORMULARIO ACEPTE ARCHIVOS, CON UN IMPUT TIPO FILE -->
                  

                <div class="form-group">
                  <label>Titulo *</label>
                  <input type="text" name="title" class="form-control" required>  
                </div>



                <div class="form-group">
                  <label>Imagen</label>
                  <input type="file" name="file" >  
                </div>

<div class="form-group">
       <div id="imagenes" class="row">
          <div id="copy">
            <div class="col-xs-4">
              <div class="well well-sm" style="margin-left: 15px;">
                  <label>Imagen secundaria</label>
                  <input type="file" name="file2[]" >  
              </div>
            </div>            
          </div>
        <div class="col-xs-4">
          <div class="well">
            <button id="btn-agregar" class="btn btn-sm btn-success btn-default" type="button">Agregar otra imagen</button>                
          </div>
        </div>
      </div>
</div>

                <div class="form-group">
                  <label>Descripcion *</label>
                  <textarea name="description" rows="6" class="form-control" required></textarea>  
                </div>

                <div class="form-group">
                  <label>Especificaciones</label>
                  <input type="text" name="specifications" class="form-control">  
                </div>

                <div class="form-group">
                  <label>Dimensiones</label>
                  <input type="text" name="dimensions" class="form-control">  
                </div>

                 <div class="form-group">
                  <label>Precio *</label>
                  <input type="text" name="price" class="form-control" required>  
                </div>

                 <div class="form-group">
                  <label>Stock *</label>
                  <input type="text" name="stock" class="form-control" required>  
                </div>

                <div class="form-group">
                  <label>Flag * (Si pones <span style="font-weight: bold;">0</span> el producto no se mostrara en la tabla, si pones <span style="font-weight: bold;">1</span> se mostrara)</label>
                  <input type="text" name="flag" class="form-control" required>  
                </div>

                <div class="form-group">
                  @csrf
                  <input type="submit" value="Guardar" class="btn btn-sm btn-primary">  
                </div>



              </form>




            </div>
         </div>
     </div>
 </div>
</div>



@endsection


