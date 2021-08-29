<div class="content-wrapper">
    
  <section class="content-header">
      
    <h1>
      Gestor Retenciones
    </h1>
 
    <ol class="breadcrumb">

      <li><a href="inicio"><i class="fa fa-dashboard"></i> Inicio</a></li>

      <li class="active">Gestor Retenciones</li>
      
    </ol>

  </section>

  <section class="content">

    <div class="box">

      <div class="box-header with-border">
		 
          <button class="btn btn-primary" data-toggle="modal" data-target="#modalAgregarRetencion">

            Nuevo Retencion

          </button>
		 
      </div>
		

      <div class="box-body">
         
        <table class="table table-bordered table-striped dt-responsive tablaCategorias" width="100%">

          <thead>
            
            <tr>
              
              <th style="width:10px">Codigo</th>
			  <th>Descripcion</th> 
              <th>Porcentaje</th>			  
               <th>Acciones</th>

            </tr>

          </thead>
		   <tbody>
			   <?php 
				while ($row = $listaReten -> fetch_object()):
				 ?>
                <tr>
                  <td><?=$row->id?></td>
                  <td><?=$row->nombre?></td>
				  <td><?=$row->porcentaje?>%</td>				
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
  <section class="content">

    <div class="box">

      <div class="box-header with-border">
		 
          <button class="btn btn-primary" data-toggle="modal" data-target="#modalAgregarInteres">

            Nuevo Interes

          </button>
		 
      </div>
		

      <div class="box-body">
         
        <table class="table table-bordered table-striped dt-responsive tablaCategorias" width="100%">

          <thead>
            
            <tr>
              
              <th style="width:10px">Codigo</th>
			  <th>Descripcion</th> 
              <th>Porcentaje</th>			  
               <th>Acciones</th>

            </tr>

          </thead>
		   <tbody>
			   <?php 
				while ($row2 = $listaIntereses-> fetch_object()):
				 ?>
                <tr>
                  <td><?=$row2->id?></td>
                  <td><?=$row2->descripcion?></td>
				  <td><?=$row2->porcentaje?>%</td>				
                  <td>
					  <div class="btn-group">
						  <a href="<?=URL_BASE?>extras/index&idi=<?=$row2->id?>">
							  <button class="btn btn-warning btnEditarCategoria">
								  <i class="fa fa-pencil"></i>
							  </button>
						  </a>
						  <a href="<?=URL_BASE?>extras/eliminarinteres&idi=<?=$row2->id?>">
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
<div id="modalAgregarRetencion" class="modal fade" role="dialog">
  
  <div class="modal-dialog">
    
    <div class="modal-content">

		<form method="post" action="<?=URL_BASE?>estras/registrarretnecion" enctype="multipart/form-data">

        <!--=====================================
        CABEZA DEL MODAL
        ======================================-->
        
        <div class="modal-header" style="background:#3c8dbc; color:white">
          
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          
          <h4 class="modal-title">Agregar Nueva Retencion</h4>

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

                <input type="number" step="0.1" class="form-control input-lg " placeholder="Ingresar Porcentaje a retener" name="porcentaje" required> 

              </div> 

            </div>
			<div class="form-group">
              
              <div class="input-group">
                
                <span class="input-group-addon"><i class="fa fa-th"></i></span>

                <input type="text" class="form-control input-lg " placeholder="Ingresar Nombre de a retencion" name="nombreRetencion" required> 

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
<div id="modalAgregarInteres" class="modal fade" role="dialog">
  
  <div class="modal-dialog">
    
    <div class="modal-content">

		<form method="post" action="<?=URL_BASE?>extras/guardarinteres" enctype="multipart/form-data">

        <!--=====================================
        CABEZA DEL MODAL
        ======================================-->
        
        <div class="modal-header" style="background:#3c8dbc; color:white">
          
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          
          <h4 class="modal-title">Agregar Nuevos Intereses</h4>

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

                <input type="number" step="0.1" class="form-control input-lg " placeholder="Ingresar Porcentaje de Interes a cobrar" name="porcentaje" required> 

              </div> 

            </div>
			<div class="form-group">
              
              <div class="input-group">
                
                <span class="input-group-addon"><i class="fa fa-th"></i></span>

                <input type="text" class="form-control input-lg " placeholder="Ingresar Nombre del Interes" name="nombreInteres" required> 

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

