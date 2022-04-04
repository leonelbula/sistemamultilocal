<div class="container">
   <!-- Content Header (Page header) -->
   
   <!-- Main content -->
   <section class="content">

      <!-- Default box -->
      <div class="box">
         <div class="box-header with-border">
            <h3 class="box-title">lista de Ventas</h3>

         </div>
         
        
         <div class="box-body">
            
            <div class="box-header with-border">
               <?php if($_SESSION["identity"]->tipo == "maestro"):?>
            <a href="<?= URL_BASE ?>administracion/">
                  <button class="btn btn-primary">

                     Inicio

                  </button>
            </a>
               <a href="<?= URL_BASE ?>administracion/listacierre&id=<?=$id_sucursal?>">
                  <button class="btn btn-primary">

                     Ver Cierres

                  </button>
            </a>
                <?php else:?>
               <a href="<?= URL_BASE ?>frontend/principal">
                  <button class="btn btn-primary">

                     Inicio

                  </button>
               </a>
               <a href="<?= URL_BASE ?>ventas/nuevaventa">
                  <button class="btn btn-primary">

                     Nueva venta

                  </button>
               </a>
               <a href="<?= URL_BASE ?>ventas/iniciarventa">
                  <button class="btn btn-primary">

                     Iniciar Ventas

                  </button>
               </a>
               <a href="<?= URL_BASE ?>ventas/listarventas">
                  <button class="btn btn-primary">

                     Ver Todas

                  </button>
               </a>
               <button class="btn  btn-primary " data-toggle="modal" data-target="#modalProdventas">

				Venta por Productos 

			</button>
               <button type="button" class="btn btn-default pull-right" id="daterange-btn">

                  <span>
                     <i class="fa fa-calendar"></i> Rango de fecha
                  </span>

                  <i class="fa fa-caret-down"></i>

               </button>
               <button class="btn  btn-primary" data-toggle="modal" data-target="#modalVentasPeriodo">

				Ventas por Periodo

			    </button>
                     <?php endif; ?>
               <a href="<?= URL_BASE ?>extensiones/tcpdf/pdf/productos_ticket.php" target="_blank">
                  <button class="btn btn-primary">

                     Productos

                  </button>
               </a>
            </div>
  
         </div>
         <div class="box-body">
            <table id="ventasRealizadas" class=" table table-bordered table-striped dt-responsive ventasRealizadas" style="width:100%">
               <thead>
                  <tr>
                     <th>#</th>
                     <th>Codigo</th>
                     <th>Cliente</th>
                     <th>fecha</th>
                     <th>fecha Vencimiento</th>
                     <th>valor</th> 
                     <th>Tipo</th>
                     <th>acciones</th>							
                  </tr>
               </thead>
               <tbody>
                  <?php
                  
                   $detalleVentasSucursal = ventasController::ventasSucursal($id_sucursal);
                               
              
                  $i = 1;
                 
                  if($detalleVentasSucursal):
                  while ($row = $detalleVentasSucursal->fetch_object()):
                     ?>
                     <tr>

                        <td><?= $i++ ?></td>

                        <td><?= $row->codigo ?></td>
                        <?php
                        $id = $row->id_cliente;
                        $detallesCliente = clienteController::MostrarClienteId($id);
                        while ($row1 = $detallesCliente->fetch_object()) {
                           $Nomclientes = $row1->nombre;
                        }
                        echo '<td>' . $Nomclientes . '</td>';


                        echo '<td>' . $row->fecha . '</td>
							 <td>' . $row->fecha_vencimiento . '</td>
							 <td>$ ' . number_format($row->total) . '</td>';
                        ;
                        if ($row->tipo == 1) {

                           $tipo = "<button class='btn btn-primary btn-xs'>Credito</button>";
                        } elseif ($row->tipo == 2) {

                           $tipo = "<button class='btn btn-primary btn-xs'>Otros</button>";
                        } else {

                           $tipo = "<button class='btn btn-info btn-xs'>Contado</button>";
                        }
                        ?>
                        <td><?= $tipo ?></td>                              

                        <td>

                           <div class="btn-group">

                              <button class="btn btn-info btnImprimirFactura" codigoVenta="<?= $row->codigo ?>">

                                 <i class="fa fa-print"></i>

                              </button>
                               <button class="btn btn-primary btnverfacturaVenta" idVenta="<?=$row->id ?>">
                                  <i class="fa fa-eye"></i>
                                </button>
                              <?php
                              if ($_SESSION["identity"]->tipo == "admin" || $_SESSION["identity"]->tipo == "maestro" ) {

                                 echo '<button class="btn btn-warning btnEditarVenta" idVenta="' . $row->id . '"><i class="fa fa-pencil"></i></button>

                      <button class="btn btn-danger btnEliminarVenta" idVenta="' . $row->id . '"><i class="fa fa-times"></i></button>';
                              }
                              ?>
                           </div>  

                        </td>				  

                     </tr>

                  <?php endwhile;                  endif;?>
               </tbody>
            </table>
         </div>
         <!-- /.box-body -->
         <div class="box-footer">
            lista ventas

         </div>
         <!-- /.box-footer-->
      </div>
      <!-- /.box -->

   </section>
   <!-- /.content -->


   <script>
      $(function () {
         $('#ventasRealizadas').DataTable()

      })
   </script>
</div>

<div id="modalProdventas" class="modal fade" role="dialog">

	<div class="modal-dialog">

		<div class="modal-content">

			<form role="form" action="<?= URL_BASE ?>extensiones/tcpdf/pdf/productosventas.php" method="GET" target="_blank" >
                           <input  type="hidden" value="<?=$id_sucursal?>" name="idsucursal">
				<!--=====================================
				CABEZA DEL MODAL
				======================================-->

				<div class="modal-header" style="background:#3c8dbc; color:white">

					<button type="button" class="close" data-dismiss="modal">&times;</button>

					<h4 class="modal-title">Ventas por Productos</h4>

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


<div id="modalVentasPeriodo" class="modal fade" role="dialog">

	<div class="modal-dialog">

		<div class="modal-content">

			<form role="form" action="<?= URL_BASE ?>extensiones/tcpdf/pdf/ventasporperiodousuario.php" method="GET" target="_blank" >
                              <input  type="hidden" value="<?=$id_sucursal?>" name="idsucursal">
				<!--=====================================
				CABEZA DEL MODAL
				======================================-->

				<div class="modal-header" style="background:#3c8dbc; color:white">

					<button type="button" class="close" data-dismiss="modal">&times;</button>

					<h4 class="modal-title">Ventas por periodo</h4>

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
