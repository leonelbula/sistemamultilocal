<div class="content-wrapper">
    
  <section class="content-header">
      
    <h1>
      Gestor cuentas
    </h1>
 
    <ol class="breadcrumb">

      <li><a href="inicio"><i class="fa fa-dashboard"></i> Inicio</a></li>

      <li class="active">Gestor cuentas</li>
      
    </ol>

  </section>

  <section class="content">

    <div class="box">

      <div class="box-header with-border">
		 
          <button class="btn btn-primary" data-toggle="modal" data-target="#modalAgregarCuenta">

            Nuevo Cuenta

          </button>
		 
      </div>
		

      <div class="box-body">
         
        <table class="table table-bordered table-striped dt-responsive tablaCategorias" width="100%">

          <thead>
            
            <tr>
              
              <th style="width:10px">Codigo</th>
			  <th>Num. Cuentas</th> 
              <th>Descripcion</th>			  
               <th>Acciones</th>

            </tr>

          </thead>
		   <tbody>
			   <?php 
				while ($row = $listacuenta -> fetch_object()):
				 ?>
                <tr>
                  <td><?=$row->id?></td>
                  <td><?=$row->num_cuenta?></td>
				  <td><?=$row->descripcion?></td>				
                  <td>
					  <div class="btn-group">
						  <a href="<?=URL_BASE?>cuentascontable/index&id=<?=$row->id?>">
							  <button class="btn btn-warning btnEditarCategoria">
								  <i class="fa fa-pencil"></i>
							  </button>
						  </a>
						  <a href="<?=URL_BASE?>cuentascontable/index&id=<?=$row->id?>">
							<button class="btn btn-danger">
								<i class="fa fa-times"></i>
							</button>
						  </a>
					  </div>
				  </td>
                </tr>
				<?php endwhile; ?>
		   </tbody>

        </table> 

      </div>
        
    </div>

  </section>

</div>
<div id="modalAgregarCuenta" class="modal fade" role="dialog">
  
  <div class="modal-dialog">
    
    <div class="modal-content">

		<form method="post" action="<?=URL_BASE?>cuentascontable/registrarcuenta" enctype="multipart/form-data">

        <!--=====================================
        CABEZA DEL MODAL
        ======================================-->
        
        <div class="modal-header" style="background:#3c8dbc; color:white">
          
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          
          <h4 class="modal-title">Agregar cuenta</h4>

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
                
                <span class="input-group-addon"><i class="fa fa-th"></i></span>

                <input type="number" class="form-control input-lg " placeholder="Ingresar Numero Cuenta" name="numeroCuenta" required> 

              </div> 

            </div>
			<div class="form-group">
              
              <div class="input-group">
                
                <span class="input-group-addon"><i class="fa fa-th"></i></span>

                <input type="text" class="form-control input-lg " placeholder="Ingresar Nombre Cuenta" name="nombreCuenta" required> 

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

