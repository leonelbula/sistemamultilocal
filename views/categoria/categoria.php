<div class="container">
    
  <section class="content-header">
      
    <h1>
      Gestor categorías
    </h1>
 
    <ol class="breadcrumb">

      <li><a href="inicio"><i class="fa fa-dashboard"></i> Inicio</a></li>

      <li class="active">Gestor categorías</li>
      
    </ol>

  </section>

  <section class="content">

    <div class="box">

      <div class="box-header with-border">
          <a href="<?= URL_BASE ?>frontend/principal">
                  <button class="btn btn-primary">

                     Inicio

                  </button>
               </a>
               <a href="<?= URL_BASE ?>inventario/">
                  <button class="btn btn-primary">

                     Productos

                  </button>
               </a>
         
          <button class="btn btn-primary" data-toggle="modal" data-target="#modalAgregarCategoria">

            Agregar categoría

          </button>

      </div>
		<div class="box-header with-border">
			<?php if(isset($_GET['id'])): 				
					
				?>
			
			<div class="col-xs-6">
				<form method="post" action="<?=URL_BASE?>categoria/actulizar" enctype="multipart/form-data">
					<?php 
						$id = $_GET['id'];
				
						$datos = CategoriaController::MostarCategoria($id);
						while ($row1 = $datos -> fetch_object()) :
					?>
					<div class="form-group">

						<div class="input-group">

							<span class="input-group-addon"><i class="fa fa-th"></i></span>

							<input type="text" class="form-control input-lg" value="<?=$row1->nombre?>" placeholder="Ingresar Categoria" name="nombreCategoria" required> 

							<input type="hidden" class="editarIdCategoria" value="<?=$row1->id?>" name="IdCategoria">               

						</div> 

					</div>
					<a href="<?=URL_BASE?>categoria/index">
					<button type="button" class="btn btn-default " data-dismiss="modal">Cancelar</button>
					</a>
					<button type="submit" class="btn btn-primary">Guardar cambios categoría</button>        
					<?php endwhile;?>
				</form>
			</div>
			<?php endif;?>
		</div>

      <div class="box-body">
         
        <table class="table table-bordered table-striped dt-responsive tablaCategorias" width="100%">

          <thead>
            
            <tr>
              
              <th style="width:10px">Codigo</th>
              <th>Categoría</th>          
               <th>Acciones</th>

            </tr>

          </thead>
		   <tbody>
			   <?php 
			   $listCategoria = categoriaController::ListaMostrarCategoria($id_sucursal);
				while ($row = $listCategoria -> fetch_object()):
				 ?>
                <tr>
                  <td><?=$row->id?></td>
                  <td><?=$row->nombre?></td>                 
                  <td>
					  <div class="btn-group">
						  <a href="<?=URL_BASE?>categoria/index&id=<?=$row->id?>">
							  <button class="btn btn-warning btnEditarCategoria">
								  <i class="fa fa-pencil"></i>
							  </button>
						  </a>
						  <a href="<?=URL_BASE?>categoria/eliminar&id=<?=$row->id?>">
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

<!--=====================================
MODAL AGREGAR CATEGORÍA
======================================-->

<div id="modalAgregarCategoria" class="modal fade" role="dialog">
  
  <div class="modal-dialog">
    
    <div class="modal-content">

		<form method="post" action="<?=URL_BASE?>categoria/registrarcategoria" enctype="multipart/form-data">
             <input type="hidden" name="idSucursal" id="idSucursal" value="<?= $_SESSION['identity']->id_sucursal ?>">
        <!--=====================================
        CABEZA DEL MODAL
        ======================================-->
        
        <div class="modal-header" style="background:#3c8dbc; color:white">
          
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          
          <h4 class="modal-title">Agregar categoría</h4>

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

                <input type="text" class="form-control input-lg validarCategoria tituloCategoria" placeholder="Ingresar Nombre Categoria" name="nombreCategoria" required> 

              </div> 

            </div>       
          
          </div>

        </div>

        <!--=====================================
        PIE DEL MODAL
        ======================================-->

        <div class="modal-footer">
          
          <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Salir</button>

          <button type="submit" class="btn btn-primary">Guardar categoría</button>

        </div>

      </form>

    
    </div>

  </div>

</div>
