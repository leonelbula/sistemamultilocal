<div class="container">
    
  <section class="content-header">
      
    <h1>
      Gestor Usuarios
    </h1>
 
    <ol class="breadcrumb">

      <li><a href="<?=URL_BASE?>frontend/principal"><i class="fa fa-dashboard"></i> Inicio</a></li>

      <li class="active">Gestor Usuarios</li>
      
    </ol>

  </section>

  <section class="content">

    <div class="box">

      <div class="box-header with-border">
           <?php if ($_SESSION["identity"]->tipo == "maestro"): ?>
            <a href="<?= URL_BASE ?>administracion/">
               <button class="btn btn-primary">

                  Inicio

               </button>
            </a>

            <?php else: ?>

            <a href="<?= URL_BASE ?>frontend/principal">
               <button class="btn btn-primary">

                  inicio

               </button>
            </a>
            <?php endif; ?>

		  
          <button class="btn btn-primary" data-toggle="modal" data-target="#modalAgregarUsuario">

            Nuevo Usuario

          </button>
		
      </div>
		

      <div class="box-body">
         
        <table class="table table-bordered table-striped dt-responsive" width="100%">

          <thead>
            
            <tr>
              
              <th style="width:10px">Codigo</th>
              <th>Nombre</th>
			  <th>Tipo</th> 
			  <th>Estado</th>			  
               <th>Acciones</th>

            </tr>

          </thead>
		  <tbody>
			  <?php 
			  $listaUsuario = usuarioController::listaUsuario($id_sucursal);
			  while ($row = $listaUsuario->fetch_object()) :
				  
			   ?>
			  <tr>
				  <td><?= $row->id_usuario?></td>
				   <td><?= $row->nombre?></td>
				   <td><?= $row->tipo?></td>
				   <td><?php
						if($row->estado == 1){
							echo 'activado';							
						} else {
							echo 'Desactivado';
						}
						?></td>
				    <td><?php if ($_SESSION["identity"]->tipo == "admin" || $_SESSION["identity"]->tipo == "maestro") {

								echo '<a href="'.URL_BASE.'usuario/editar&id='.$row->id_usuario.'"><button class="btn btn-warning "><i class="fa fa-pencil"></i></button></a>

                      <a href="'.URL_BASE.'usuario/eliminar&id='.$row->id_usuario.'"><button class="btn btn-danger "><i class="fa fa-times"></i></button></a>';
							}?></td>
			  </tr>
			  <?php endwhile; ?>
		  </tbody>
		 

        </table> 

      </div>
		
        
    </div>
	  <div class="box-footer">
          Usuarios
        </div>

  </section>

</div>

<div id="modalAgregarUsuario" class="modal fade" role="dialog">
  
  <div class="modal-dialog">
    
    <div class="modal-content">

		<form method="post" action="<?=URL_BASE?>usuario/guardar" enctype="multipart/form-data">
		    <input type="hidden" class="idsucursal" name="idsucursal" id="idsucursal" value="<?=$id_sucursal?>">

        <!--=====================================
        CABEZA DEL MODAL
        ======================================-->
        
        <div class="modal-header" style="background:#3c8dbc; color:white">
          
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          
          <h4 class="modal-title">Agregar Usuario</h4>

        </div>

        <!--=====================================
        CUERPO DEL MODAL
        ======================================-->

        <div class="modal-body">
          
          <div class="box-body">

            <!--=====================================
            ENTRADA DEL TITULO DE LA CATEGORÍA
            ======================================-->

            <div class="form-group">
              
              <div class="input-group">
                
                <span class="input-group-addon"><i class="fa fa-user"></i></span>

                <input type="text" class="form-control" name="nombre" id="nombre" placeholder="Ingrese nombre de usuario" required> 

              </div> 

            </div> 
			<div class="form-group">
              
              <div class="input-group">
                
                <span class="input-group-addon"><i class="fa fa-th"></i></span>

                <input type="password" name="password" placeholder="Password" placeholder="Ingrese Contraseña" class="form-control" required />

              </div> 

            </div>     
			<div class="form-group">
              
              <div class="input-group">
                
                <span class="input-group-addon"><i class="fa fa-th"></i></span>

               <select class="form-control"  name="tipo" required>
							<option value="">Selecione una opcion</option>
							<option value="usuario">Usuario</option>
							<option value="admin">Administrador</option>									

						</select>

              </div> 

            </div>  
			<div class="form-group">
              
              <div class="input-group">
                
                <span class="input-group-addon"><i class="fa fa-th"></i></span>

                <select class="form-control" name="estado" required>
							<option value="">Seleccione una opcion</option>
							<option value="1">Activado</option>
							<option value="0">Desactivado</option>									

						</select>

              </div> 

            </div>     
          
          </div>

        </div>

        <!--=====================================
        PIE DEL MODAL
        ======================================-->

        <div class="modal-footer">
          
          <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Salir</button>

          <button type="submit" class="btn btn-primary">Guardar</button>

        </div>

      </form>

    
    </div>

  </div>

</div>

