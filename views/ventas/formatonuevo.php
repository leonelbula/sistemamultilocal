<!--Contenido-->
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">        
   <!-- Main content -->
   <section class="content">
      <div class="row">
         <div class="col-md-12">
            <div class="box">
               <div class="box-header with-border cabeceraVenta">
                  <h1 class="box-title">Venta 
                     <button class="btn btn-success agregarCliente" data-toggle="modal" id="agregarCliente" data-target="#modalAgregarCliente">

                        <i class="fa fa-plus-circle"></i>
                        Buscar Cliente

                     </button>
                     <button class="btn btn-info" data-toggle="modal" data-target="#modalRegistrarCliente" data-dismiss="modal">
                        <i class="fa fa-clipboard"></i> 
                        Nuevo Cliente
                     </button>
                     <button class="btn btn-danger quitarCliente">
                        <i class="fa fa-close"></i> 
                        Borrar
                     </button>
                     <a href="<?= URL_BASE ?>ventas/listarventas">
                        <button class="btn btn-primary" >

                           Cancelar

                        </button>
                     </a>
                  </h1>
                  <div class="box-tools pull-right">
                  </div>
               </div>
               <!-- /.box-header -->
               <!-- centro -->

               <div class="panel-body" style="height: 100%;" id="formularioregistros">
                  <form name="formulario" id="formulario" method="POST">
                     <div class="form-group col-lg-8 col-md-8 col-sm-8 col-xs-12">
                        <label>Cliente(*):</label>
                        <input type="hidden" name="idcliente" id="idcliente">
                        <input type="text" class="form-control" name="nombre" id="nombre" disabled>
                     </div>
                     <div class="form-group col-lg-4 col-md-4 col-sm-4 col-xs-12">
                        <label>Fecha(*):</label>
                        <input type="date" class="form-control" name="fecha" id="fecha" value="<?= date('Y-m-d') ?>">
                     </div>
                     <div class="form-group col-lg-3 col-md-3 col-sm-3 col-xs-12">
                        <label>C.C.:</label>
                        <input type="text" class="form-control" name="nit" id="nit"disabled>
                     </div>
                     <div class="form-group col-lg-4 col-md-4 col-sm-6 col-xs-12">
                        <label>Direccion:</label>
                        <input type="text" class="form-control"  id="direccion" disabled>
                     </div>
                     <div class="form-group col-lg-3 col-md-3 col-sm-6 col-xs-12">
                        <label>Ciudad:</label>
                        <input type="text" class="form-control" id="ciudad" disabled>
                     </div>
                     <div class="form-group col-lg-2 col-md-2 col-sm-6 col-xs-12">
                        <label>Telefono:</label>
                        <input type="text" class="form-control" id="telefono" disabled>
                     </div>
                     <div class="form-group col-lg-3 col-md-3 col-sm-6 col-xs-12">
                        <a data-toggle="modal" data-target="#modalAgregarProductos">           
                           <button id="btnAgregarArt" type="button" class="btn btn-primary"> <span class="fa fa-plus"></span> Agregar Artículos</button>
                        </a>
                     </div>

                     <div class="col-lg-12 col-sm-12 col-md-12 col-xs-12 table-responsive">
                        <table id="detalles" class="table table-striped table-bordered table-condensed table-hover">
                           <thead style="background-color:#A9D0F5">                                    
                           <th>Codigo</th>
                           <th>Artículo</th>
                           <th>Cantidad</th>
                           <th>Precio Venta</th>
                           <th>Descuento</th>
                           <th>Subtotal</th>
                           <th>Opciones</th>
                           </thead>
                           <tbody class="nuevoProducto">                         

                           </tbody>
                        </table>
                        <input type="hidden" id="listaProductos" name="listaProductos">
                        <input type="hidden" id="clienteVentaN" name="clienteVentaN">



                        </table>
                     </div>

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
                                    <option value="1">Credito</option>
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
                                       <option value="<?= $row1->id ?>"><?= $row1->decripcion ?></option>
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
                                       <input type="text" class="form-control input-lg nuevoSubtotal" id="nuevoSubtotal" name="nuevoSubtotal" value="0" readonly/>
                                       <input type="hidden" name="SubVenta" id="SubVenta">
                                    </td>
                                 </tr>
                                 <tr class="l-iva">
                                    <th class="iva-t">IVA:</th>
                                    <td class="iva-v">
                                       <input type="text" class="form-control input-lg nuevoImpuestoVenta" id="nuevoImpuestoVenta" name="nuevoImpuestoVenta" placeholder="0" readonly/>
                                       <input type="hidden" name="ivaVenta" id="ivaVenta">
                                    </td>
                                 </tr>						
                                 <tr class="l-total">
                                    <th class="total-t">TOTAL:</th>
                                    <td class="total-v">
                                       <input type="hidden" name="totalVenta" id="totalVenta">
                                       <input type="text" class="form-control input-lg nuevoTotalVenta" id="nuevoTotalVenta" name="nuevoTotalVenta" value="0" readonly/>
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

               </div>
               <!--Fin centro -->
            </div><!-- /.box -->
         </div><!-- /.col -->
      </div><!-- /.row -->
   </section><!-- /.content -->

</div><!-- /.content-wrapper -->
<!--Fin-Contenido-->

<!-- Modal -->
<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" >
   <div class="modal-dialog" style="width: 65% !important;">
      <div class="modal-content">
         <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
            <h4 class="modal-title">Seleccione un Artículo</h4>
         </div>
         <div class="modal-body table-responsive">
            <table id="tblarticulos" class="table table-striped table-bordered table-condensed table-hover">
               <thead>
               <th>Opciones</th>
               <th>Nombre</th>
               <th>Categoría</th>
               <th>Código</th>
               <th>Stock</th>
               <th>Precio Venta</th>
               <th>Imagen</th>
               </thead>
               <tbody>

               </tbody>
               <tfoot>
               <th>Opciones</th>
               <th>Nombre</th>
               <th>Categoría</th>
               <th>Código</th>
               <th>Stock</th>
               <th>Precio Venta</th>
               <th>Imagen</th>
               </tfoot>
            </table>
         </div>
         <div class="modal-footer">
            <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
         </div>        
      </div>
   </div>
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
                  ENTRADA DEL TITULO DE LA CATEGORÍA
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

               <button type="submit" class="btn btn-primary">Guardar categoría</button>

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

