



<!-- Content Wrapper. Contains page content -->
<div class="container">
    <!-- Content Header (Page header) -->
    <section class="content-header">
		<h1>
			Pago de factura
			
		</h1>
		<ol class="breadcrumb">
			<li><a href="<?= URL_BASE ?>frontend/principal"><i class="fa fa-dashboard"></i> Pincipal</a></li>
			<li><a>Ventas</a></li>

		</ol>
    </section>

    <!-- Main content -->
    <section class="content">

		<!-- Default box -->
		<div class="box">
			<div class="box-header with-border">
				<h3 class="box-title">Cobro de  venta de contado</h3>

			</div>
			<div class="box-body">
				<div class="row">
					<div class="col-xs-6">
						<form method="post" class="formularioCobro" action="<?= URL_BASE ?>ventas/pagarFactura" enctype="multipart/form-data">

						<?php 
						
							$id = $_GET['id'];
							$detalles = VentasController::valorventa($id);
							
							while ($row = $detalles->fetch_object()) {
								$valor = $row->total;
							}
							
							?>
							<div class="modal-header" style="background:#3c8dbc; color:white">								

								<h4 class="modal-title">COBRAR VENTA</h4>

							</div>							
							<div class="modal-body">

								<div class="box-body">
									
									<div class="form-group">

										<div class="input-group">

											<span class="input-group-addon"><i class="fa fa-th"></i></span>
											<input type="hidden" name="id" value="<?= $id?>" />
											<input type="text" class="form-control input-lg" id="valor" style="width:350px;height:60px;font-size: 40px;" value="<?= $valor ?>" disabled> 

										</div> 

									</div> 
									<div class="form-group">

										<div class="input-group">

											<span class="input-group-addon"><i class="fa fa-th"></i></span>

											<input type="number" class="form-control input-lg" id="nuevoValorEfectivo" style="width:350px;height:60px;font-size: 40px;" placeholder="Pago en efectivo" name="valor" required> 

										</div> 

									</div>      
									<div class="form-group">

										<div class="input-group">

											<span class="input-group-addon"><i class="fa fa-th"></i></span>

											<input type="number" class="form-control input-lg" id="cambio" style="width:350px;height:60px;font-size: 40px;" placeholder="vuelto a cliente" disabled> 

										</div> 

									</div>      

								</div>

							</div>

							
							<div class="modal-footer">
								<button type="submit" class="btn btn-primary">Guardar</button>

							</div>

						</form>
					</div>

				</div>

			</div>
			<!-- /.box-body -->
			<div class="box-footer">
				
			</div>
			<!-- /.box-footer-->
		</div>
		<!-- /.box -->

    </section>
    <!-- /.content -->
</div>
<!-- /.content-wrapper -->
