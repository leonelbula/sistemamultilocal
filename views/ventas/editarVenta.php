
<div class="content-wrapper">
  
   <section class="content-header">
      <h1>
         Nueva factura

      </h1>
      <ol class="breadcrumb">
         <li><a href="<?= URL_BASE ?>frontend/principal"><i class="fa fa-dashboard"></i> Pincipal</a></li>
         <li><a>NuevaVentas</a></li>

      </ol>
   </section>
   <div class="box-body">
      <div class="box-header with-border cabeceraVenta">

         <button class="btn btn-primary agregarCliente" data-toggle="modal" id="agregarCliente" data-target="#modalAgregarCliente">

            Seleccionar cliente

         </button>
         <button type="button" class="btn btn-default" data-toggle="modal" data-target="#modalRegistrarCliente" data-dismiss="modal">
            Agregar cliente
         </button>
         <button class="btn btn-danger quitarCliente">
            <i class="fa fa-close"></i> 
            Borrar
         </button>

         <a href="<?= URL_BASE ?>ventas/listarventas">
            <button class="btn btn-success" >

               Cancelar

            </button>
         </a>

      </div>
   </div>

   <!-- Main content -->
   <section class="invoice">
      <form role="form" method="post" action="<?= URL_BASE ?>ventas/actulizarventa" class="formularioVenta">
         <?php
               while ($row = $destallesVenta->fetch_object()) {
                  $id = $row->id;
                  $fecha = $row->fecha;
                  $id_cliente = $row->id_cliente;
                  $detalle_venta = $row->detalle_venta;
                  $total = $row->total;
                  $factura = $row->codigo;
               }
               
               ?>
         <input type="hidden"  name="idVenta" id="idVenta" value="<?= $id?>">
         <input type="hidden" name="idsucursal" value="<?= $id_sucursal?>">
        
         <div class="row">
            <div class="col-xs-12">
               <h2 class="page-header">
                  <i class="fa fa-globe"></i>Sacv.
                  <small class="pull-right"><strong><h3>Factura N: <?= $factura?></h3></strong></small>
               </h2>
            </div>
            <!-- /.col -->
         </div>
         <!-- info row -->

         <div class="row invoice-info">
            <div class="cabeceraVenta">	
               
               <?php 
               
               $detallesCliente = clienteController::MostrarClienteId($id_cliente);
               
               while ($row2 = $detallesCliente->fetch_object()) {
                  $nombre = $row2->nombre;
                  $nit = $row2->nit;
                  $direccion = $row2->direccion;
                  $ciudad = $row2->ciudad;
                  $telefono = $row2->telefono;
                  
               }
               
               ?>
               
               
               
               <div class="form-group col-lg-8 col-md-8 col-sm-8 col-xs-12">
                  <label>Cliente(*):</label>
                  
                  <input type="hidden" class="IdCliente" name="idcliente" id="IdCliente" value="<?= $id_cliente?>">
                  <input type="text" class="form-control" name="nombre" id="nombre"value="<?= $nombre?>" disabled>
               </div>
               <div class="form-group col-lg-4 col-md-4 col-sm-4 col-xs-12">
                  <label>Fecha(*):</label>
                  <input type="date" class="form-control" name="fecha" id="fecha" value="<?= $fecha ?>">
               </div>
               <div class="form-group col-lg-3 col-md-3 col-sm-3 col-xs-12">
                  <label>C.C.:</label>
                  <input type="text" class="form-control" name="nit" id="nit" value="<?= $nit?>" disabled>
               </div>
               <div class="form-group col-lg-4 col-md-4 col-sm-6 col-xs-12">
                  <label>Direccion:</label>
                  <input type="text" class="form-control"  id="direccion" value="<?= $direccion?>" disabled>
               </div>
               <div class="form-group col-lg-3 col-md-3 col-sm-6 col-xs-12">
                  <label>Ciudad:</label>
                  <input type="text" class="form-control" id="ciudad" value="<?= $ciudad?>" disabled>
               </div>
               <div class="form-group col-lg-2 col-md-2 col-sm-6 col-xs-12">
                  <label>Telefono:</label>
                  <input type="text" class="form-control" id="telefono"value="<?= $telefono?>" disabled>
               </div>
            </div>

            <div class="col-sm-12 invoice-col">	

               <div class="form-group col-lg-2 col-md-2 col-sm-6 col-xs-12">


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
            <div class="col-xs-12 ">
               <table class="table table-striped table-responsive">
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
                     
                     $listaProductos = json_decode($detalle_venta,true);
                    
                     
                     foreach ($listaProductos as $key => $row3) {
                         $idProdu = $row3['id'];
			   $productoDetl = inventarioController::VerProdutoId($idProdu);
                           
                           while ($row4 = $productoDetl->fetch_object()) {
                              
                              $stock = $row4->can_inicial;
                           }
                                           
                        echo '<tr> 
                                 <td> '.$row3['codigo'].'  </td>
                                 <td class="costop"> '.$row3['descripcion'].' <input  class="costo" type="hidden" name="costo"  value="'.$row3['costo'].'"/></td>
                                 <td class="ingresoCantidad"><input type="number" class="nuevaCantidadProducto" name="nuevaCantidadProducto" stock="' .$stock. '" value="'.$row3['cantidad'].'" /></td>
                                 <td class="precio"><input type="number" class="precioProducto" name="precioProducto" value="'.$row3['precio'].'"/></td>
                                 <td class="descuentop"><input type="number" class="descuento" id="descuentoProdu" name="descuento" value="0"/></td>
                                 <td class="nuevototalp"><input type="text" class="nuevototal"  name="nuevototal"  value="'.$row3['subtotal'].'" readonly></td>
                                 <td><button class="btn btn-danger quitarProducto" idProducto="'.$row3['id'].'"><i class="fa fa-times"></i></button></td>
                                 <input  class="nombreProduc" type="hidden" name="nombreProduc" value="'.$row3['descripcion'].'"/>
                                 <input  class="idProductoVenta" type="hidden" name="idProductoVenta" value="'.$row3['id'].'"/>
                                 <input  class="codigo" type="hidden" name="codigo" value="'.$row3['codigo'].'"/>
                               </tr>';
                     }
                     
                     
                     ?>
                         

                  </tbody>
               </table>
               <input type="hidden" id="listaProductos" name="listaProductos">
               <input type="hidden" id="clienteVentaN" name="clienteVentaN" value="">
            </div>
            <!-- /.col -->
         </div>
         <!-- /.row -->

         <div class="row">
            <!-- accepted payments column -->
            <div class="col-xs-8">
               <p class="lead"></p>


               <p class="text-muted well well-sm no-shadow" style="margin-top: 10px"></p>
               <div class="col-xs-6">
                  <div class="form-group">
                     <label for="estado">Tipo de ventas</label>						
                     <select class="chosen-select form-control seleccionarTipoventa" name="tipoventa" id="form-field-select-3" required="">
                        <option value="">Seleciones el Tipo</option>
                        <option value="0">Contado</option>
                        <option value="1">Credito</option>
                        <option value="2">Nequi/otros</option>
                        <option value="3">Plan separe</option>
                        

                     </select>
                  </div>
                  <div class="form-group">
                     <label for="estado">Plazo en Dias</label>					
                     <select class="chosen-select form-control plazoVenta" name="plazos" id="form-field-select-3">
                        <option value="">Seleciones el Tipo</option>
                        <?php
                        $plazos = extrasController::MostrarPlazos();
                        while ($row1 = $plazos->fetch_object()):
                           ?>
                           <option value="<?= $row1->id ?>"><?= $row1->decripcion ?></option>
                        <?php endwhile; ?>

                     </select>
                  </div>
               </div>



            </div>
            <!-- /.col -->
            <div class="col-xs-4">


               <div class="table-responsive">
                  <table class="table">
                     						
                     <tr class="l-total">
                        <th class="total-t">TOTAL:</th>
                        <td class="total-v">
                           <input type="hidden" name="totalVenta" id="totalVenta" value="<?= $total?>">
                           <input type="text" class="form-control input-lg nuevoTotalVenta" id="nuevoTotalVenta" name="nuevoTotalVenta" value="<?= $total?>" readonly/>
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
                  <i class="fa fa-download"></i> Guardar venta
               </button>
            </div>
         </div>
      </form>

   </section>
   <div class="clearfix"></div>
</div>
<!-- /.content-wrapper -->
<div id="modalAgregarCliente" class="modal fade" role="dialog">

   <div class="modal-dialog">

      <div class="modal-content">

         <form method="post" action="<?= URL_BASE ?>categoria/registrarcategoria">

            <!--=====================================
            CABEZA DEL MODAL
            ======================================-->

            <div class="modal-header" style="background:#3c8dbc; color:white">

               <button type="button" class="close" data-dismiss="modal">&times;</button>

               <h4 class="modal-title">Agregar cliente</h4>

            </div>

            <!--=====================================
            CUERPO DEL MODAL
            ======================================-->

            <div class="modal-body">

               <div class="box-body">

                  <!--=====================================
                  ENTRADA DEL TITULO DE LA CATEGOR??A
                  ======================================-->

                  <div class="form-group">

                     <div class="col-xs-12 table-responsive">
                        <table class="table table-bordered table-striped dt-responsive  tablaclienteventa">
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

               <button type="submit" class="btn btn-primary">Guardar categor??a</button>

            </div>

         </form>


      </div>

   </div>

</div>

<div id="modalAgregarProductos" class="modal fade modalProduto" role="dialog">

   <div class="modal-dialog">

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
               ENTRADA DEL TITULO DE LA CATEGOR??A
               ======================================-->



               <div class="col-xs-12 table-responsive modalProduto">
                  <table class="table table-bordered table-striped dt-responsive  tablaproductoventa">
                     <thead>
                        <tr>
                           <th>#</th>
                           <th>codigo</th>
                           <th>nombre</th>
                           <th>Precio 1</th>										
                           <th>Stop</th>         
                           <th>accion</th>   
                        </tr>
                     </thead>            
                  </table>
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



<div id="modalRegistrarCliente" class="modal fade" role="dialog">

   <div class="modal-dialog">

      <div class="modal-content">

         <form role="form" action="<?= URL_BASE ?>cliente/guardar" method="POST" >

            <!--=====================================
            CABEZA DEL MODAL
            ======================================-->

            <div class="modal-header" style="background:#3c8dbc; color:white">

               <button type="button" class="close" data-dismiss="modal">&times;</button>

               <h4 class="modal-title">Agregar cliente</h4>

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

               <button type="submit" class="btn btn-primary">Guardar cliente</button>

            </div>

         </form>     

      </div>

   </div>

</div>
