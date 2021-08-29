<div class="content-wrapper">
    
  <section class="content-header">
      
    <h1>
      Gestor de cuenta Proveedor
    </h1>
 
    <ol class="breadcrumb">

      <li><a href="<?=URL_BASE?>frontend/principal"><i class="fa fa-dashboard"></i> Inicio</a></li>

      <li class="active">Gestor estado de cuenta</li>
      
    </ol>

  </section>

  <section class="content">

    <div class="box">
		<div class="box-header with-border">
		  <a href="<?=URL_BASE?>proveedor/estadocuentaproveedor">
          <button class="btn btn-primary">

           Cancelar

          </button>
		  </a>
      </div>
		<div class="row invoice-info">
				
				<div class="col-sm-4 invoice-col">	
					<?php 				  
					
						  
					 $id_proveedor = $_GET['id'];
					 $datosProveedor = proveedorController::MostrarproveedorId($id_proveedor);
					
					 foreach ($datosProveedor as $key => $value) {
						 $nombreProveedor = $value['nombre'];
						 $nit = $value['nit'];
					 }
					
					 ?>   
					<h3>&nbsp;&nbsp;&nbsp;<strong>Nombre:</strong> <?= $nombreProveedor ?></h3>
				  <address>					 
					  <h4>&nbsp;&nbsp;&nbsp;&nbsp;<strong>Nit: </strong> <?= $nit ?> <br></h4>
					 				
				  </address>
				</div>
			 </div>
		

      <div class="box-body">
         
         <table id="comprasRealizadas" class="table table-bordered table-striped dt-responsive comprasRealizadas" width="100%">

          <thead>
            
            <tr>
              
              <th style="width:10px">Codigo</th>			 
              <th>N° factura</th>
			  <th>Fecha</th>
			  <th>A 30 días</th>
			  <th>A 45 días</th>
			  <th>A 60 días</th>
			  <th>mas de 61 días</th>
			  <th>Valor</th>
			  <th>Saldo</th> 			  
               <th>Acciones</th>

            </tr>

          </thead>
		   <tbody>
			   <tr>   		   
			   <?php 
			   $i = 0;
			   while ($row =  $listaEstado ->fetch_object()) :
				  ?>
				  <td><?= $i++?></td>
				  <td>Factura N°<?= $row->numero_factura?></td>
				  <td><?= $row->fecha?></td>				  
				   <?php
				 $fechaAct = date('Y-m-d');
				 $fecha = $row->fecha;
				 $fechaActual = strtotime('+30 day', strtotime($fecha));
				 $fechaNueva = date('Y-m-d', $fechaActual);
				 $fechaActual2 = strtotime('+45 day', strtotime($fecha));
				 $fechaNueva2 = date('Y-m-d', $fechaActual2);
				 $fechaActual3 = strtotime('+60 day', strtotime($fecha));
				 $fechaNueva3 = date('Y-m-d', $fechaActual3);
				 $fechaActual4 = strtotime('+61 day', strtotime($fecha));
				 $fechaNueva4 = date('Y-m-d', $fechaActual4);
				 
				 
				 
				 if ($fechaNueva >= $fechaAct) {
					 echo '<td>'.number_format($row->saldo).'</td>'; 
				 } else{
					 echo '<td>0</td>';
				 }if ($fechaNueva2 >= $fechaAct && $fechaNueva < $fechaAct) {
					  echo '<td>'.number_format($row->saldo).'</td>'; 
				 } else{
					 echo '<td>0</td>';
				 }if ($fechaNueva3 >= $fechaAct && $fechaNueva < $fechaAct && $fechaNueva2 < $fechaAct) {
					  echo '<td>'.number_format($row->saldo).'</td>'; 
				 } else{
					 echo '<td>0</td>';
				 }if ($fechaNueva4 <= $fechaAct) {
					  echo '<td>'.number_format($row->saldo).'</td>'; 
				 } else {
					echo '<td>0</td>';
				 }
			 				
			   
				 ?>
               
				  <td><?= number_format($row->total) ?></td>
				  <td><?= number_format($row->saldo) ?></td>

				  		  
                  <td>
					  <div class="btn-group">
						  <a href="<?=URL_BASE?>proveedor/abonosfactura&id=<?= $row->id?>">
							  <button class="btn btn-warning btnEditarCategoria">
								  <i class="fa fa-eye"></i> Ver Abonos
							  </button>
						  </a>
						  <?php if($row->saldo > 0):?>
						  <a href="<?=URL_BASE?>proveedor/abonarfactura&id=<?= $row->id ?>">
							  <button class="btn btn-primary btnEditarCategoria">
								  <i class="fa fa-edit"></i> Abonar
							  </button>
						  </a>
						 <?php endif; ?>
					  </div>
				  </td>
                </tr>
				<?php endwhile; ?>
		   </tbody>

        </table> 

      </div>
		
        
    </div>
	  <div class="box-footer">
          Cuentas Proveedores
        </div>

  </section>

</div>

<script>
      $(function () {
         $('#comprasRealizadas').DataTable()

      })
   </script>