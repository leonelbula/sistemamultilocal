<div class="content-wrapper">
    
  <section class="content-header">
      
    <h1>
      Gestor de abono a factura 
	</h1>
    <ol class="breadcrumb">

      <li><a href="<?=URL_BASE?>frontend/principal"><i class="fa fa-dashboard"></i> Inicio</a></li>

      <li class="active">Gestor estado de abonos</li>
      
    </ol>

  </section>

  <section class="content">

    <div class="box">  
		<div class="box-header with-border">
			<?php 
			while ($row = $valorSald->fetch_object()):
					
					$id = $row->id_cliente;
					 $datosCliente = ClienteController::MostrarClienteId($id);
					
					 foreach ($datosCliente as $key => $value) {
						 $nombre = $value['nombre'];
					 }
			
			?>
		  <a href="<?=URL_BASE?>cliente/verestadocuentacliente&id=<?=$id?>">
          <button class="btn btn-primary">

           Cancelar

          </button>
		  </a>
			<?php if($row->saldo > 0):?>		
			 
			<a href="<?= URL_BASE ?>cliente/abonarfactura&id=<?= $_GET['id'] ?>">
				<button class="btn btn-primary ">
					<i class="fa fa-dollar"></i> Abonar
				</button>
			</a>
			<?php endif; ?>
		</div>
		<div class="box-header with-border">
			 <div class="row invoice-info">
				
				<div class="col-sm-4 invoice-col">	
					<h3><strong>Nombre:</strong> <?= $nombre ?></h3>
										
				  <address>
					  <h4><strong>Fecha Factura: </strong> <?= $row->fecha?> <br></h4>
					  <h4><strong>Fecha Vencimiento: </strong> <?= $row->fecha_vencimiento?> <br></h4>
					  <h4><strong>N° Factura: </strong><?= $row->codigo?> <br></h4>
					  <h4><strong>Valor Factura: </strong> <?= number_format($row->total) ?><br></h4>
					  <h4><strong>Saldo Factura: </strong> <?= number_format($row->saldo) ?> <br></h4>					
				  </address>
				</div>
			 </div>
			<?php 				  
					
			endwhile;
					 
			 ?>   
		</div>
		

      <div class="box-body">
         
        <table class="table table-bordered table-striped dt-responsive tablaestadocuentaprovedor" width="100%">

          <thead>
            
            <tr>
              
              <th style="width:10px">N°</th>			 
              <th>descripcion</th>
			  <th>Fecha</th> 			  		
			  <th>Valor</th>			  
               <th>Acciones</th>

            </tr>

          </thead>
		   <tbody>
			   <?php 
			  $i = 1;
			  
			   foreach ($listaAbono as $key => $value):			  
			   
				
				 ?>
                <tr>
                  <td><?= $i++ ?></td>				 
				  <td><?= $value['descripcion']?></td>
				   <td><?= $value['fecha']?></td>				                
				  <td><?= $value['valor']?></td>
				 

				  		  
                  <td>
					  <div class="btn-group">
						  <a href="<?=URL_BASE?>cliente/editarabono&id=<?= $value['id']?>">
							  <button class="btn btn-warning btnEditarCategoria">
								  <i class="fa fa-pencil"></i> Editar
							  </button>
						  </a>	
						  <a href="<?=URL_BASE?>cliente/eliminarabono&id=<?= $value['id']?>">
							  <button class="btn btn-danger btnEditarCategoria">
								  <i class="fa fa-times"></i> Eliminar
							  </button>
						  </a>	
						 
					  </div>
				  </td>
                </tr>
				<?php endforeach; ?>
		   </tbody>

        </table> 

      </div>
		
        
    </div>
	  <div class="box-footer">
          Abono a factura 
        </div>

  </section>

</div>

