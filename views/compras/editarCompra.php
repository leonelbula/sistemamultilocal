<!-- Content Wrapper. Contains page content -->
<input type="hidden" id="tipoIva" value="1" />
<div class="container">
   <!-- Content Header (Page header) -->

   <div class="box-body">
      <div class="box-header with-border">

         <button class="btn btn-primary agregarCliente" data-toggle="modal" data-target="#modalAgregarProveedor">

            Seleccionar Proveedor

         </button>
        

         <a href="<?= URL_BASE ?>compras/compras">
            <button class="btn btn-success" >

               Cancelar

            </button>
         </a>

      </div>
   </div>

   <!-- Main content -->
   <section class="invoice">
      <form role="form" method="post" action="<?= URL_BASE ?>compras/actulizarcompra" class="formularioCompra">
         <!-- title row -->
         <div class="row">
            <div class="col-xs-12">
               <h2 class="page-header">
                  <i class="fa fa-globe"></i>Sacv.
                  <small class="pull-right">Fecha: <?= date('y-m-d') ?></small>
               </h2>
            </div>
            <!-- /.col -->
         </div>
         <!-- info row -->

         <div class="row invoice-info">
            <div class="cabeceraCompra">		
               <div class="cabeceraVenta">
                  <?php
                  while ($row2 = $destallesCompra->fetch_object()) {
                     $idcompra = $row2->id;
                     $numero_factura = $row2->numero_factura;
                     $idproveedor = $row2->id_proveedor;
                     $productos = $row2->detalle_compra;
                     $sub_total = $row2->sub_total;
                     $iva = $row2->iva;
                     $total = $row2->total;
                     $tipo = $row2->tipo;
                     $plazo = $row2->plazo;
                     $fecha = $row2->fecha;
                  }

                  $detallesProveedor = proveedorController::MostrarproveedorId($idproveedor);
                  while ($row3 = $detallesProveedor->fetch_object()):
                     ?>
                      	
                     <div class="form-group col-lg-8 col-md-8 col-sm-8 col-xs-12">
                        <label>Proveedor(*):</label>
                        <input type="hidden" class="idCompra" name="idCompra" value="<?= $idcompra ?>"/>
                        <input type="hidden" name="idSucursal" id="idSucursal" value="<?= $_SESSION['identity']->id_sucursal ?>">

                        <input type="hidden" class="idproveedorcompra" value="<?= $row3->id ?>"/>					
                        <input type="hidden" class="proveedor" value="<?= $row3->id ?>'" />
                        
                        <input type="text" class="form-control" name="nombre" id="nombre" value="<?= $row3->nombre ?>" disabled>
                     </div>
                     <div class="form-group col-lg-4 col-md-4 col-sm-4 col-xs-12">
                        <label>Fecha(*):</label>
                        <input type="date" class="form-control" name="fecha" id="fecha" value="<?= $fecha ?>">
                     </div>
                     <div class="form-group col-lg-3 col-md-3 col-sm-3 col-xs-12">
                        <label>Nit:</label>
                        <input type="text" class="form-control" name="nit" id="nit" value="<?= $row3->nit ?>" disabled>
                     </div>
                     <div class="form-group col-lg-4 col-md-4 col-sm-6 col-xs-12">
                        <label>Direccion:</label>
                        <input type="text" class="form-control"  id="direccion" value="<?= $row3->direccion ?>" disabled>
                     </div>
                     <div class="form-group col-lg-3 col-md-3 col-sm-6 col-xs-12">
                        <label>Ciudad:</label>
                        <input type="text" class="form-control" id="ciudad" value="<?= $row3->ciudad ?>" disabled>
                     </div>
                     <div class="form-group col-lg-2 col-md-2 col-sm-6 col-xs-12">
                        <label>Numero Fact:</label>
                        <input type="text" class="form-control" id="numFactura" name="numFactura" value="<?= $numero_factura ?>" required>
                     </div>
                  




               <?php endwhile; ?>

            </div>
         </div>

         
         </div>
         <!-- /.row -->
         <div class="box-body">
            <div class="box-header with-border">

               <button class="btn btn-primary" data-toggle="modal" data-target="#modalAgregarProductos">

                  Agregar productos

               </button>


            </div>
         </div>
         <!-- Table row -->
         <div class="row">
            <div class="col-xs-12 table-responsive">
               <table class="table table-striped">
                  <thead>
                     <tr>
                        <th>codigo</th>
                        <th>Producto detalle</th>
                        <th>cantidad</th>							
                        <th>precio</th>							
                        <th>% Descuento</th>
                        
                        <th>Subtotal</th>
                        <th>Accion</th>
                     </tr>
                  </thead>

                  <tbody class="nuevoProducto">
                     <?php
                     $listaProducto = json_decode($productos, TRUE);


                     foreach ($listaProducto as $key => $value) {



                        echo '<tr>
										<td class="valorivap">' . $value['codigo'] . '<input  class="valoriva" type="hidden" name="valoriva"  value="' . $value['impuesto'] . '"/></td>
										<td class="costop">' . $value['descripcion'] . '<input  class="costo" type="hidden" name="costo"  value="' . $value['precio'] . '"/></td>							
										<td class="ingresoCantidad"><input type="number" class="CantidadProd" name="CantidadProd" stock="" value="' . $value['cantidad'] . '" /></td>
										
										<td class="precio"><input type="number" class="costoProducto" name="costoProducto" value="' . $value['precio'] . '"/></td>							
										<td class="descuentop"><input type="number" class="descuento" id="descuentoProduC" name="descuento" value="' . $value['descuento'] . '"/></td>										
										<td class="nuevototalp"><input type="text" class="nuevototalC"  name="nuevototalC"  value="' . $value['subtotal'] . '" readonly></td>
										<td><button class="btn btn-danger quitarProducto" idProducto="' . $value['id'] . '"><i class="fa fa-times"></i></button></td>
										<input  class="nombreProduc" type="hidden" name="nombreProduc" value="' . $value['descripcion'] . '"/>
										<input  class="idProductoVenta" type="hidden" name="idProductoVenta" value="' . $value['id'] . '"/>
										<input  class="codigo" type="hidden" name="codigo" value="' . $value['codigo'] . '"/>
									</tr>';
                     }
                     ?>
                          <!--<tr>
                                  <td>1</td>
                                  <td>Call of Duty</td>
                                  <td><input type="number" name="cantidad" value="1" /></td>
                                  <td><input type="number" name="precio" value=""/></td>
                                  <td><input type="number" name="descuento" value="0"/></td>
                                  <td>$64.50</td>
                                  <td><a href="eliminar&id="><button class="btn btn-danger btnEliminarProducto"><i class="fa fa-times"></i></button></a></td>
                          </tr>-->

                  </tbody>
               </table>
               <input type="hidden" id="listaProductos" name="listaProductos">
               <input type="hidden" id="proveedorCompraN" name="proveedorCompraN">
            </div>
            <!-- /.col -->
         </div>
         <!-- /.row -->

         <div class="row">
            <!-- accepted payments column -->
            <div class="col-xs-6">
               <p class="lead"></p>


               <p class="text-muted well well-sm no-shadow" style="margin-top: 10px;"></p>
               <div class="col-xs-6">
                  <div class="form-group">
                     <label for="estado">Tipo de ventas</label>						
                     <select class="chosen-select form-control seleccionarTipoventa" name="tipoventa" id="form-field-select-3" required="">
                        <option value="">Seleciones el Tipo</option>
                        <option value="1" <?= $tipo == 1 ? 'selected' : '' ?>>Credito</option>
                        <option value="0">Contado</option>

                     </select>
                  </div>
                  <div class="form-group">
                     <label for="estado">Plazo en Dias</label>					
                     <select class="chosen-select form-control plazoVenta" name="plazos" id="form-field-select-3">
                        <option value="">Seleciones el Tipo</option>
                        <?php
                        $plazos = ExtrasController::MostrarPlazos();
                        while ($row1 = $plazos->fetch_object()):
                           ?>
                           <option value="<?= $row1->id ?>" <?= $row1->id == $plazo ? 'selected' : '' ?> ><?= $row1->decripcion ?></option>
                        <?php endwhile; ?>

                     </select>
                  </div>
               </div>



            </div>
            <!-- /.col -->
            <div class="col-xs-6">


               <div class="table-responsive">
                  <table class="table">
                     <tr class="l-subtotal">
                        <th class="descuento-v" style="width:50%">Subtotal:</th>
                        <td class="descuento-v">								
                           <input type="text" class="form-control input-lg nuevoSubtotalCompra" id="nuevoSubtotalCompra" name="nuevoSubtotalCompra" value="<?= $sub_total ?>" readonly/>
                           <input type="hidden" name="SubCompra" id="SubCompra" value="<?= $sub_total ?>">
                        </td>
                     </tr>
                     <tr class="l-iva">
                        <th class="iva-t">IVA:</th>
                        <td class="iva-v">
                           <input type="text" class="form-control input-lg nuevoImpuestoVenta" id="nuevoImpuestoVenta" name="nuevoImpuestoVenta" value="<?= $iva ?>" placeholder="0" readonly/>
                           <input type="hidden" name="ivaVenta" id="ivaVenta" value="<?= $iva ?>">
                        </td>
                     </tr>						
                     <tr class="l-total">
                        <th class="total-t">TOTAL:</th>
                        <td class="total-v">
                           <input type="hidden" name="totalCompra" id="totalCompra" value="<?= $total ?>">
                           <input type="text" class="form-control input-lg nuevoTotalCompra" id="nuevoTotalCompra" name="nuevoTotalCompra" value="<?= $total ?>" readonly/>
                        </td>
                     </tr>
                  </table>
               </div>
            </div>
            <!-- /.col -->
         </div>
         <!-- /.row -->

         <!-- this row will not appear when printing -->
         <div class="row no-print">
            <div class="col-xs-12">								
               </button>
               <button type="submit" class="btn btn-primary pull-right" style="margin-right: 5px;">
                  <i class="fa fa-download"></i> Guardar Cambios
               </button>
            </div>
         </div>
      </form>

   </section>
   <div class="clearfix"></div>
</div>
<!-- /.content-wrapper -->
<div id="modalAgregarProveedor" class="modal fade" role="dialog">

   <div class="modal-dialog">

      <div class="modal-content">

         <form method="post" action="<?= URL_BASE ?>categoria/registrarcategoria">

            <!--=====================================
            CABEZA DEL MODAL
            ======================================-->

            <div class="modal-header" style="background:#3c8dbc; color:white">

               <button type="button" class="close" data-dismiss="modal">&times;</button>

               <h4 class="modal-title">Agregar Proveedor</h4>

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

                     <div class="col-xs-12 table-responsive">
                        <table class="table table-bordered table-striped dt-responsive  tablaproveedorCompra">
                           <thead>
                              <tr>
                                 <th>#</th>
                                 <th>codigo</th>
                                 <th>nombre</th>
                                 <th>nit</th>
                                 <th>accion</th>         

                              </tr>
                           </thead>            
                        </table>
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

<div id="modalAgregarProductos" class="modal fade modalProduto" role="dialog">

   <div class="modal-dialog modal-lg">

      <div class="modal-content">

         <!--=====================================
         CABEZA DEL MODAL
         ======================================-->

         <div class="modal-header" style="background:#3c8dbc; color:white">

            <button type="button" class="close" data-dismiss="modal">&times;</button>

            <h4 class="modal-title">Agregar Prouctos</h4>

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

                  <div class="col-xs-12 table-responsive modalProduto">
                     <table class="table table-bordered table-striped dt-responsive  tablaproductoCompra">
                        <thead>
                           <tr>
                              <th>#</th>
                              <th>Codigo</th>
                              <th>Nombre</th>
                              <th>Costo</th>										
                              <th>Stop</th>         
                              <th>Accion</th>   
                           </tr>
                        </thead>            
                     </table>
                  </div>

               </div>       

            </div>

         </div>

         <!--=====================================
         PIE DEL MODAL
         ======================================-->

         <div class="modal-footer">

            <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Salir</button>



         </div>




      </div>

   </div>

</div>

<!--=====================================
MODAL AGREGAR CLIENTE
======================================-->

<div id="modalRegistrarProveedor" class="modal fade" role="dialog">

   <div class="modal-dialog">

      <div class="modal-content">

         <form role="form" action="<?= URL_BASE ?>cliente/guardar" method="POST" >

            <!--=====================================
            CABEZA DEL MODAL
            ======================================-->

            <div class="modal-header" style="background:#3c8dbc; color:white">

               <button type="button" class="close" data-dismiss="modal">&times;</button>

               <h4 class="modal-title">Agregar Proveedor</h4>

            </div>

            <!--=====================================
            CUERPO DEL MODAL
            ======================================-->

            <div class="modal-body">

               <div class="box-body">


                  <div class="form-group">
                     <label>Nombre:</label>

                     <div class="input-group">
                        <div class="input-group-addon">
                           <i class="fa fa-user"></i>
                        </div>
                        <input type="text" class="form-control" name="nombre" required>
                     </div>
                     <!-- /.input group -->
                  </div>            

                  <div class="form-group">
                     <label>Nit - CC:</label>
                     <div class="input-group">
                        <div class="input-group-addon">
                           <i class="fa fa-tag"></i>
                        </div>
                        <input type="text" class="form-control"name="nit" required>
                     </div>
                     <!-- /.input group -->
                  </div>             

                  <div class="form-group">
                     <label>Direccion:</label>

                     <div class="input-group">
                        <div class="input-group-addon">
                           <i class="fa fa-map-marker"></i>
                        </div>
                        <input type="text" class="form-control" name="direccion" required>
                     </div>
                     <!-- /.input group -->
                  </div>
                  <div class="form-group">
                     <label>Departamento:</label>

                     <div class="input-group">
                        <div class="input-group-addon">
                           <i class="fa fa-map-marker"></i>
                        </div>
                        <input type="text" class="form-control" name="departamento" required>
                     </div>
                     <!-- /.input group -->
                  </div>
                  <div class="form-group">
                     <label>Ciudad:</label>

                     <div class="input-group">
                        <div class="input-group-addon">
                           <i class="fa fa-map-marker"></i>
                        </div>
                        <input type="text" class="form-control" name="ciudad" required>
                     </div>
                     <!-- /.input group -->
                  </div>             
                  <div class="form-group">
                     <label>Telefono:</label>

                     <div class="input-group">
                        <div class="input-group-addon">
                           <i class="fa fa-phone"></i>
                        </div>
                        <input type="text" class="form-control" name="telefono" data-inputmask='"mask": "(999) 999-9999"' data-mask>
                     </div>
                     <!-- /.input group -->
                  </div>

                  <div class="form-group">
                     <label>Email:</label>

                     <div class="input-group">
                        <div class="input-group-addon">
                           <i class="fa fa-envelope-o"></i>
                        </div>
                        <input type="text" class="form-control" name="email" >
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

               <button type="submit" class="btn btn-primary">Guardar</button>

            </div>

         </form>     

      </div>

   </div>

</div>
