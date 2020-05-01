@extends('layouts.app')

@section('content')

<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.0.0-beta1/jquery.js"></script>

        <script>
            
            $(function(){
                // Clona la fila oculta que tiene los campos base, y la agrega al final de la tabla
                $("#adicional").on('click', function(){
                    $("#tabla:eq(0)").clone().removeClass('fila-fija').appendTo("#tabla");
                });
             
                // Evento que selecciona la fila y la elimina 
                $(document).on("click",".eliminar",function(){
                    var parent = $(this).parents().get(0);
                    $(parent).remove();
                });
            });
        </script>

        <script type="text/javascript">
          
          $(function(){
          $("#agrega").click(function(){
          var item = `
                 <tr>
                               <td><input type="text" name="nombre[]" placeholder="Nombre"/></td>
                   <td><input type="text" name="cedula[]" placeholder="Cédula"/></td>
                  </tr>
               `;
                $("#lista").append(item)
              })
            })
        </script>

        <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>

        <link rel="stylesheet" href="assets/js/jquery-ui/jquery-ui.min.css" />
        <link rel="stylesheet" href="assets/js/jquery-ui/jquery-ui.theme.min.css" />
<script src="http://code.jquery.com/jquery-1.11.2.min.js"></script>

<script>
    $(document).ready(function(){
        
        // El formulario que queremos replicar
        var formulario_alumno = $("#lo-que-vamos-a-copiar").html();
        
// El encargado de agregar más formularios
$("#btn-alumno-agregar").click(function(){
    // Agregamos el formulario
    $("#alumnos").prepend(formulario_alumno);

    // Agregamos un boton para retirar el formulario
    $("#alumnos .col-xs-4:first .well").append('<button class="btn-danger btn btn-block btn-retirar-alumno" type="button">Retirar</button>');

    // Hacemos focus en el primer input del formulario
    $("#alumnos .col-xs-4:first .well input:first").focus();

    // Volvemos a cargar todo los plugins que teníamos, dentro de esta función esta el del datepicker assets/js/ini.js
    Plugins();
});
        
        // Cuando hacemos click en el boton de retirar
        $("#alumnos").on('click', '.btn-retirar-alumno', function(){
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


       <div id="alumnos" class="row">
          <div id="lo-que-vamos-a-copiar">
            <div class="col-xs-4">
              <div class="well well-sm">
                  <label>Imagen secundaria</label>
                  <input type="file" name="file2[]" >  
              </div>
            </div>            
          </div>
        <div class="col-xs-4">
          <div class="well">
            <button id="btn-alumno-agregar" class="btn btn-lg btn-block btn-default" type="button">Agregar</button>                
          </div>
        </div>
      </div> 
              
        
        <!--        
                  <div id="tabla">
                <div class="form-group" id="fila-fija" >
                  <label>Imagen secundaria</label>
                  <input type="file" name="file2" >  
                 <div class="eliminar">
                 <input type="button"   value="Menos -"/>
                   
                 </div> 
                </div>
               </div>
               <div class="btn-der">
          
          <button id="adicional" name="adicional" type="button" class="btn btn-warning"> Más + </button>

        </div>
               -->

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
                  <label>Flag *</label>
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


