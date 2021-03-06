<div class="container">
    
  <section class="content-header">
      
    <h1>
      Editar Abono Ventas
    </h1>
 
    <ol class="breadcrumb">

      <li><a href="<?=URL_BASE?>frontend/principal"><i class="fa fa-dashboard"></i> Inicio</a></li>

      <li class="active">Editar Abono Ventas</li>
      
    </ol>

  </section>

  <section class="content">

    <div class="box">
		<?php 
		foreach ($DatosAbono as $key => $value):
		
		?>
      <div class="box-header with-border">
		  <a href="<?=URL_BASE?>cliente/abonosfactura&id=<?=$value['id_factura']?>">
          <button class="btn btn-primary">

           Cancelar

          </button>
		  </a>
      </div>
		

      <div class="box-body">
         
      
      <div class="row">
		  <form action="<?=URL_BASE?>cliente/actualizarabono" method="POST" >
		<?php   
		
			
				
				$id = $value['id_factura'];
				
				$compra = ventasController::VerVentaId($id);
				
				while ($row = $compra -> fetch_object()) {
					$id_cliente= $row->id_cliente;
					$num_factura = $row->codigo;
					$saldo = (int)$row->saldo;
				}
				$totalsaldo = $saldo + (int)$value['valor'];
				
				$cliente = ClienteController::MostrarClienteId($id_cliente);
                   foreach ($cliente as $key => $valueP) {
					    $nombre = $valueP['nombre'];
							
                   }
		
			?>
			  
        <div class="col-md-8">
			<input type="hidden" name="id" value="<?=$value['id']?>"/> 		
          <div class="box box-danger">
            <div class="box-header">
              <h3 class="box-title">Informacion de Cliente</h3>
            </div>
            <div class="box-body">
				<div class="col-md-6">
              <!-- Date dd/mm/yyyy -->
              <div class="form-group">
                <label>Cliente:</label>

                <div class="input-group">
                  <div class="input-group-addon">
                    <i class="fa fa-user"></i>
                  </div>
					<input type="text" class="form-control" value="<?= $nombre ?>" name="nombre" disabled>
                </div>
                <!-- /.input group -->
              </div>
			   <div class="form-group">
                <label>Fecha del Abono:</label>

                <div class="input-group">
                  <div class="input-group-addon">
                    <i class="fa fa-calendar"></i>
                  </div>
					<input type="date" class="form-control" value="<?= $value['fecha']?>" name="fecha" required>
                </div>
                <!-- /.input group -->
              </div>
			</div>
			  <div class="col-md-6">
				  <div class="form-group">
                <label>Numero  de factura:</label>

                <div class="input-group">
                  <div class="input-group-addon">
                    <i class="fa fa-tag"></i>
                  </div>
					<input type="text" class="form-control" value="<?= $num_factura?>" name="numerofactura" disabled>
					
                </div>
                <!-- /.input group -->
              </div>
			  </div>
			  <div class="col-md-6">
				  <div class="form-group">
                <label>Saldo factura</label>

                <div class="input-group">
                  <div class="input-group-addon">
                    <i class="fa fa-tag"></i>
                  </div>
					<input type="number" class="form-control" value="<?= $totalsaldo ?>" disabled>
                </div>
                <!-- /.input group -->
              </div>
			  </div>
			  
              <!-- /.form group -->
			  <?php endforeach; ?>
              <!-- Date mm/dd/yyyy -->
              <div class="form-group">
				  <label>Valor abono:</label>
                <div class="input-group">
                  <div class="input-group-addon">
                    <i class="fa fa-tag"></i>
                  </div>
					<input type="number" class="form-control" value="<?= $value['valor'] ?>" name="valor" required>
                </div>
                <!-- /.input group -->
              </div>
              <!-- /.form group -->

              <!-- phone mask -->
              <div class="form-group">
                <label>Descripcion:</label>

                <div class="input-group">
                  <div class="input-group-addon">
                    <i class="fa fa-bookmark-o"></i>
                  </div>
					<textarea class="form-control" rows="3"  name="descripcion" placeholder="Descripcion ..."><?= $value['descripcion'] ?></textarea>
                </div>
                <!-- /.input group -->
              </div>
			      
			
            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->

          <button class="btn btn-primary" type="submit">

            Editar
          </button>
          <!-- /.box -->

        </div>
        <!-- /.col (left) -->
      
        <!-- /.col (right) -->
		  </form>
      </div>
      <!-- /.row -->

      </div>
        
    </div>

  </section>

</div>