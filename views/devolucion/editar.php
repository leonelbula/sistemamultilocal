
<div class="container">
   <!-- Content Header (Page header) -->



   <!-- Main content -->
   <section class="invoice">

      <!-- title row -->
      <div class="row">
         <div class="col-xs-12">
            <div class="box-body">
               <div class="box-header with-border cabeceraVenta">

                  <button class="btn btn-danger quitarCliente">
                     <i class="fa fa-close"></i> 
                     Borrar
                  </button>

                  <a href="<?= URL_BASE ?>devolucion/">
                     <button class="btn btn-success" >

                        Cancelar

                     </button>
                  </a>

               </div>
            </div>

         </div>
         <!-- /.col -->
      </div>
      <!-- info row -->
      <form role="form" method="post" action="<?= URL_BASE ?>devolucion/update" class="formularioDevolucion">
         <input type="hidden" class="idsucursal" name="idsucursal" id="idsucursal" value="<?= $id_sucursal ?>">
         <input type="hidden" class="id" name="id" id="id" value="<?= $_GET['id'] ?>">
         <div class="row invoice-info">
            <div class="cabeceraVenta">		
               <div class="form-group col-lg-8 col-md-8 col-sm-8 col-xs-12">
                  <h2>Devolucion</h2>
               </div>
               <div class="form-group col-lg-4 col-md-4 col-sm-4 col-xs-12">
                  <label>Fecha(*):</label>
                  <input type="date" class="form-control" name="fecha" id="fecha" value="<?= date('Y-m-d') ?>">
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
         <?php
         $id = $_GET['id'];

         $destallesDevolucion = devolucionController::verDevolucionId($id, $id_sucursal);

         while ($row = $destallesDevolucion->fetch_object()) {

            $id = $row->id;
            $productos = $row->detalles;
            $total = $row->total;
            $descripcion = $row->descripcion;
            $fecha = $row->fecha;
         }
         ?>
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
                        <th>Subtotal</th>
                        <th>Accion</th>
                     </tr>
                  </thead>

                  <tbody class="nuevoProducto">
                     <?php
                     $listaProducto = json_decode($productos, TRUE);

                    
                     
                     foreach ($listaProducto as $key => $value) {



                        echo '<tr>
                 <td>'.$value['codigo'].'</td>
                 <td class="costop">' .$value['descripcion']. '<input  class="costo" type="hidden" name="costo"  value="' .$value['costo'].'"/></td>
                 <td class="ingresoCantidad"><input type="number" class="nuevaCantidadProducto" name="nuevaCantidadProducto" stock="" value="1" /></td>
                 <td class="costo"><input type="number" class="costo" name="costo" value="' .$value['costo']. '" readonly/></td>
                 <td class="nuevototalp"><input type="text" class="nuevototal"  name="nuevototal"  value="' .$value['costo']. '" readonly></td>
                 <td><button class="btn btn-danger quitarProducto" idProducto="' .$value['id'].'"><i class="fa fa-times"></i></button></td>
                 <input  class="nombreProduc" type="hidden" name="nombreProduc" value="'.$value['descripcion'].'"/>
                 <input  class="idProductoVenta" type="hidden" name="idProductoVenta" value="' .$value['id']. '"/>
                 <input  class="codigo" type="hidden" name="codigo" value="'.$value['codigo'].'"/>
                 </tr>';
                     }
                     ?>


                  </tbody>
               </table>
               <input type="hidden" id="listaProductos" name="listaProductos">               
            </div>
            <!-- /.col -->
         </div>
         <!-- /.row -->

         <div class="row">
            <!-- accepted payments column -->
            <div class="col-xs-8">
               <p class="lead"></p>


               <p class="text-muted well well-sm no-shadow" style="margin-top: 10px;"></p>
               <div class="col-xs-6">

                  <div class="form-group">
                     <label for="estado">Motivo</label>					

                     <input type="text" name="motivo"  class="form-control" value="<?=$descripcion?>" required >


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
                           <input type="hidden" name="totalVenta" id="totalVenta">
                           <input type="text" class="form-control input-lg nuevoTotalVenta" id="nuevoTotalVenta" name="nuevoTotalVenta" value="<?= $total ?>" readonly/>
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

               <button type="submit" class="btn btn-primary pull-right" style="margin-right: 5px;">
                  <i class="fa fa-download"></i> Guardar
               </button>
            </div>
         </div>
      </form>

   </section>
   <div class="clearfix"></div>
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
               ENTRADA DEL TITULO DE LA CATEGORÍA
               ======================================-->



               <div class="col-xs-12 table-responsive modalProduto">
                  <table class="table table-bordered table-striped dt-responsive  tablaproductodevolucion">
                     <thead>
                        <tr>
                           <th>#</th>
                           <th>codigo</th>
                           <th>nombre</th>
                           <th>Precio</th>										
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



