<div class="content-wrapper">

  <section class="content-header">
    
    <h1>
      
      Administrar Eventos 
    
    </h1>

    <ol class="breadcrumb">
      
      <li><a href="inicio"><i class="fa fa-dashboard"></i> Inicio</a></li>
      
      <li class="active">Administrar Eventos</li>
    
    </ol>

  </section>

  <section class="content">

    <div class="box">

      <div class="box-header with-border">
  
        <button class="btn btn-primary" data-toggle="modal" data-target="#modalAgregarEventos">
          
          Agregar Evento

        </button>

      </div>

      <div class="box-body">
        
       <table class="table table-bordered table-striped dt-responsive tablas" width="100%">
         
        <thead>
         
         <tr>
           
           <th style="width:10px">#</th>
           <th>Nombre Evento</th>
           <th>Direccion</th>
           <th>Foto</th>
           <th>Fecha Evento</th>
           <th>Acciones</th>

         </tr> 

        </thead>

        <tbody>

        <?php

        $item = null;
        $valor = null;

        $eventos = ControladorEventos::ctrMostrarEventos($item, $valor);

       foreach ($eventos as $key => $value){
         
          echo ' <tr>
                  <td>'.($key+1).'</td>
                  <td>'.$value["evento"].'</td>
                  <td>'.$value["direccion"].'</td>';

                  if($value["foto"] != ""){

                    echo '<td><img src="'.$value["foto"].'" class="img-thumbnail" width="40px"></td>';

                  }else{

                    echo '<td><img src="vistas/img/eventos/default/anonymous.png" class="img-thumbnail" width="40px"></td>';

                  }

                  echo '<td>'.$value["fecha"].'</td>';

                  
                  echo '  <div class="btn-group">
                  <td>
                      <button class="btn btn-warning btnEditarEvento" idEvento="'.$value["id"].'" data-toggle="modal" data-target="#modalEditarEvento"><i class="fa fa-pencil"></i></button>

                      <button class="btn btn-danger btnEliminarEvento" idEvento="'.$value["id"].'" fotoEvento="'.$value["foto"].'" evento="'.$value["evento"].'"><i class="fa fa-times"></i></button>

                    </div>  

                  </td>


              </tr>';
        }


        ?> 

        </tbody>

       </table>

      </div>

    </div>

  </section>

</div>

<!--=====================================trb
MODAL AGREGAR EVENTO
======================================-->

<div id="modalAgregarEventos" class="modal fade" role="dialog">
  
  <div class="modal-dialog">

    <div class="modal-content">

      <form role="form" method="post" enctype="multipart/form-data">

        <!--=====================================
        CABEZA DEL MODAL
        ======================================-->

        <div class="modal-header" style="background:#3c8dbc; color:white">

          <button type="button" class="close" data-dismiss="modal">&times;</button>

          <h4 class="modal-title">Agregar evento</h4>

        </div>

        <!--=====================================
        CUERPO DEL MODAL
        ======================================-->

        <div class="modal-body">

          <div class="box-body">

            <!-- ENTRADA PARA EL NOMBRE -->
            
            <div class="form-group">
              
              <div class="input-group">
              
                <span class="input-group-addon"><i class="fa fa-user"></i></span> 

                <input type="text" class="form-control input-lg" name="nuevoEvento" placeholder="Ingresar nombre Evento" required>

              </div>

            </div>

            <!-- ENTRADA PARA LA DIRECCION DE EVENTO-->

             <div class="form-group">
              
              <div class="input-group">
              
                <span class="input-group-addon"><i class="fa fa-map-marker"></i></span> 

                <input type="text" class="form-control input-lg" name="direccion" placeholder="Ingresar direccion"  required>

              </div>

            </div>
 
            <!-- ENTRADA PARA FECHA DE EVENTO-->

            <div class="form-group">
              
              <div class="input-group">
              
                <span class="input-group-addon"><i class="fa fa-calendar-o"></i></span> 

                <input type="date" class="form-control input-lg" name="fecha" placeholder="Ingresar fecha"  required>

              </div>

            </div>
            <!-- ENTRADA PARA SUBIR FOTO -->

             <div class="form-group">
              
              <div class="panel">SUBIR FOTO</div>

              <input type="file" class="nuevaFoto" name="nuevaFoto">

              <p class="help-block">Peso máximo de la foto 2MB</p>

              <img src="vistas/img/eventos/default/anonymous.png" class="img-thumbnail previsualizar" width="100px">

            </div>

          </div>

        </div>

        <!--=====================================
        PIE DEL MODAL
        ======================================-->

        <div class="modal-footer">

          <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Salir</button>

          <button type="submit" class="btn btn-primary">Guardar evento</button>

        </div>

        <?php

          $crearEventos = new ControladorEventos();
          $crearEventos -> ctrCrearEventos();

        ?>

      </form>

    </div>

  </div>

</div>

<!--=====================================
MODAL EDITAR USUARIO
======================================-->

<div id="modalEditarEvento" class="modal fade" role="dialog">
  
  <div class="modal-dialog">

    <div class="modal-content">

      <form role="form" method="post" enctype="multipart/form-data">

        <!--=====================================
        CABEZA DEL MODAL
        ======================================-->

        <div class="modal-header" style="background:#3c8dbc; color:white">

          <button type="button" class="close" data-dismiss="modal">&times;</button>

          <h4 class="modal-title">Editar Evento</h4>

        </div>

        <!--=====================================
        CUERPO DEL MODAL
        ======================================-->

        <div class="modal-body">

          <div class="box-body">

            <!-- ENTRADA PARA EL NOMBRE -->
            
            <div class="form-group">
              
              <div class="input-group">
              
                <span class="input-group-addon"><i class="fa fa-user"></i></span> 

                <input type="text" class="form-control input-lg" id="editarEvento" name="editarEvento" value="" required>

              </div>

            </div>

            <!-- ENTRADA PARA LA DIRECCION -->

             <div class="form-group">
              
              <div class="input-group">
              
                <span class="input-group-addon"><i class="fa fa-key"></i></span> 

                <input type="text" class="form-control input-lg" id="editarDireccion" name="editarDireccion" value="" required>

              </div>

            </div>


            <!-- ENTRADA PARA LA FECHA -->

            <div class="form-group">
              
              <div class="input-group">
              
                <span class="input-group-addon"><i class="fa fa-key"></i></span> 

                <input type="date" class="form-control input-lg" id="editarFecha" name="editarFecha" value="" required>

              </div>

            </div>
            <!-- ENTRADA PARA SUBIR FOTO -->

             <div class="form-group">
              
              <div class="panel">SUBIR FOTO</div>

              <input type="file" class="nuevaFoto" name="editarFoto">

              <p class="help-block">Peso máximo de la foto 2MB</p>

              <img src="vistas/img/eventos/default/anonymous.png" class="img-thumbnail previsualizar" width="100px">

              <input type="hidden" name="fotoActual" id="fotoActual">

            </div>

          </div>

        </div>

        <!--=====================================
        PIE DEL MODAL
        ======================================-->

        <div class="modal-footer">

          <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Salir</button>

          <button type="submit" class="btn btn-primary">Modificar evento</button>

        </div>

     <?php

          $editarEvento= new ControladorEventos();
          $editarEvento -> ctrEditarEventos();

        ?> 

      </form>

    </div>

  </div>

</div>

<?php

  $borrarEvento = new ControladorEvento();
  $borrarEvento -> ctrBorrarEvento();

?> 


