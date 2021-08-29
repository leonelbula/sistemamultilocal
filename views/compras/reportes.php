<div class="container">

	<section class="content-header">

		<h1>

			Reportes de Compras
		</h1>

		<ol class="breadcrumb">

			<li><a href="inicio"><i class="fa fa-dashboard"></i> Inicio</a></li>

			<li class="active">Reportes de Compras</li>

		</ol>

	</section>

	<section class="content">

		<div class="box">

			<div class="box-header with-border">

				<div class="input-group">

					<a href="<?= URL_BASE ?>reporte/">
               <button class="btn btn-primary">

                  inicio

               </button>
            </a>

				</div>


			</div>

			<div class="box-body">

				<div class="row">

					<div class="col-xs-12">
					

						
					</div>
				

					<div class="col-md-6 col-xs-12">

						<button class="btn  btn-primary  btn-lg " data-toggle="modal" data-target="#modalComprasPeriodo">

							Compras por Periodo

						</button>
						&nbsp;&nbsp;&nbsp;
						<button class="btn  btn-primary  btn-lg " data-toggle="modal" data-target="#modalComprasProveedor">

							Compras por Proveedor

						</button>	


					</div>

					<div class="col-md-6 col-xs-12">

<!--						<button class="btn  btn-primary  btn-lg " data-toggle="modal" data-target="#modalProdCompra">

							Compras por Productos 

						</button>-->

					</div>
					
						<br><br>
	<br><br>
	<br><br>


				
				</div>

			</div>

		</div>
			<br><br>
	<br><br>
	<br><br>


	</section>
		<br><br>
	<br><br>
	<br><br>


</div>




<div id="modalComprasPeriodo" class="modal fade" role="dialog">

	<div class="modal-dialog">

		<div class="modal-content">

			<form role="form" action="<?= URL_BASE ?>extensiones/tcpdf/pdf/comprasporperiodo.php" method="GET" target="_blank" >
			     <input type="hidden" class="idsucursal" name="idsucursal" id="idsucursal" value="<?=$id_sucursal?>">

				<!--=====================================
				CABEZA DEL MODAL
				======================================-->

				<div class="modal-header" style="background:#3c8dbc; color:white">

					<button type="button" class="close" data-dismiss="modal">&times;</button>

					<h4 class="modal-title">Compras por periodo</h4>

				</div>

				<!--=====================================
				CUERPO DEL MODAL
				======================================-->

				<div class="modal-body">

					<div class="box-body">


						<div class="form-group">
							<label>Fecha Inicial:</label>

							<div class="input-group date">
								<div class="input-group-addon">
									<i class="fa fa-calendar"></i>
								</div>
								<input type="date" class="form-control" name="fechaInicial">
							</div>
							<!-- /.input group -->
						</div>  
						<div class="form-group">
							<label>Fecha Final:</label>

							<div class="input-group date">
								<div class="input-group-addon">
									<i class="fa fa-calendar"></i>
								</div>
								<input type="date" class="form-control" name="fechaFinal" >
							</div>
							<!-- /.input group -->
						</div>

					</div>

				</div>

				<!--=====================================
				PIE DEL MODAL
				======================================-->

				<div class="modal-footer">

					<button type="button" class="btn btn-default pull-left" data-dismiss="modal">Salir</button>

					<button type="submit" class="btn btn-primary">Mostrar</button>

				</div>

			</form>     

		</div>

	</div>

</div>

<div id="modalProdCompra" class="modal fade" role="dialog">

	<div class="modal-dialog">

		<div class="modal-content">

			<form role="form" action="<?= URL_BASE ?>extensiones/tcpdf/pdf/productoscompra.php" method="GET" target="_blank" >
			     <input type="hidden" class="idsucursal" name="idsucursal" id="idsucursal" value="<?=$id_sucursal?>">

				<!--=====================================
				CABEZA DEL MODAL
				======================================-->

				<div class="modal-header" style="background:#3c8dbc; color:white">

					<button type="button" class="close" data-dismiss="modal">&times;</button>

					<h4 class="modal-title">Compras por Productos</h4>

				</div>

				<!--=====================================
				CUERPO DEL MODAL
				======================================-->

				<div class="modal-body">

					<div class="box-body">


						<div class="form-group">
							<label>Fecha Inicial:</label>

							<div class="input-group date">
								<div class="input-group-addon">
									<i class="fa fa-calendar"></i>
								</div>
								<input type="date" class="form-control" name="fechaInicial">
							</div>
							<!-- /.input group -->
						</div>  
						<div class="form-group">
							<label>Fecha Final:</label>

							<div class="input-group date">
								<div class="input-group-addon">
									<i class="fa fa-calendar"></i>
								</div>
								<input type="date" class="form-control" name="fechaFinal" >
							</div>
							<!-- /.input group -->
						</div>

					</div>

				</div>

				<!--=====================================
				PIE DEL MODAL
				======================================-->

				<div class="modal-footer">

					<button type="button" class="btn btn-default pull-left" data-dismiss="modal">Salir</button>

					<button type="submit" class="btn btn-primary">Mostrar</button>

				</div>

			</form>     

		</div>

	</div>

</div>

<div id="modalComprasProveedor" class="modal fade" role="dialog">

	<div class="modal-dialog">

		<div class="modal-content">

			<form role="form" action="<?= URL_BASE ?>extensiones/tcpdf/pdf/comprasproveedor.php" method="GET" target="_blank" >
			     <input type="hidden" class="idsucursal" name="idsucursal" id="idsucursal" value="<?=$id_sucursal?>">

				<!--=====================================
				CABEZA DEL MODAL
				======================================-->

				<div class="modal-header" style="background:#3c8dbc; color:white">

					<button type="button" class="close" data-dismiss="modal">&times;</button>

					<h4 class="modal-title">Compras por Proveedor</h4>

				</div>

				<!--=====================================
				CUERPO DEL MODAL
				======================================-->

				<div class="modal-body">

					<div class="box-body">


						<div class="form-group">
							<label>Fecha Inicial:</label>

							<div class="input-group date">
								<div class="input-group-addon">
									<i class="fa fa-calendar"></i>
								</div>
								<input type="date" class="form-control" name="fechaInicial">
							</div>
							<!-- /.input group -->
						</div>  
						<div class="form-group">
							<label>Fecha Final:</label>

							<div class="input-group date">
								<div class="input-group-addon">
									<i class="fa fa-calendar"></i>
								</div>
								<input type="date" class="form-control" name="fechaFinal" >
							</div>
							<!-- /.input group -->
						</div>

					</div>

				</div>

				<!--=====================================
				PIE DEL MODAL
				======================================-->

				<div class="modal-footer">

					<button type="button" class="btn btn-default pull-left" data-dismiss="modal">Salir</button>

					<button type="submit" class="btn btn-primary">Mostrar</button>

				</div>

			</form>     

		</div>

	</div>

</div>