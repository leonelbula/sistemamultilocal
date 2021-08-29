
<div class="container">
  
   <div class="box-body">
      <div class="box-header with-border cabeceraVenta">

   
         <a href="<?= URL_BASE ?>ventas/listarventas">
            <button class="btn btn-success" >

               Cancelar

            </button>
         </a>

      </div>
   </div>

   <!-- Main content -->
   <section class="invoice">
      <form role="form" method="post" action="" class="formularioVenta">
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
                                 <td class="ingresoCantidad"><input type="number" class="nuevaCantidadProducto" name="nuevaCantidadProducto" stock="' .$stock. '" value="'.$row3['cantidad'].'" readonly/></td>
                                 <td class="precio"><input type="number" class="precioProducto" name="precioProducto" value="'.$row3['precio'].'" readonly /></td>
                                 <td class="descuentop"><input type="number" class="descuento" id="descuentoProdu" name="descuento" value="0" readonly /></td>
                                 <td class="nuevototalp"><input type="text" class="nuevototal"  name="nuevototal"  value="'.$row3['subtotal'].'" readonly></td>
                                 <td></td>
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
                     <label for="estado"></label>						
             
                  </div>
                  <div class="form-group">
                     <label for="estado"></label>					
                     
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
               
            </div>
         </div>
      </form>

   </section>
   <div class="clearfix"></div>
</div>
