<div class="container">

   <section class="content-header">

      <h1>

         Reportes de ventas

      </h1>

      <ol class="breadcrumb">

         <li><a href="inicio"><i class="fa fa-dashboard"></i> Inicio</a></li>

         <li class="active">Reportes de ventas</li>

      </ol>

   </section>

   <section class="content">

      <div class="box">

         <div class="box-header with-border">
            <a href="<?= URL_BASE ?>reporte/">
               <button class="btn btn-primary">

                  inicio

               </button>
            </a>

            <!--				<div class="input-group">
            
                                                    <button type="button" class="btn btn-default" id="daterange-btn1">
            
                                                            <span>
                                                                    <i class="fa fa-calendar"></i> Rango de fecha
                                                            </span>
            
                                                            <i class="fa fa-caret-down"></i>
            
                                                    </button>
            
                                            </div>-->


         </div>
         <div class="box-body">
          
            <div class="row">
               <?php
               $id_sucursal = $_GET['id'];
               $valorventa = ventasController::ventaDelDia($id_sucursal);
               $valorventaDia = number_format($valorventa, 0, ',', '.');
               ?>

               <div class="col-xs-12">
                  <h3>
                     Venta del día de hoy
                     <br><br>
                     <strong style="color:#58D68D;">
                        Total venta: <?= $valorventaDia ?>
                     </strong>
                  </h3>
                  <br>
                  <a href="<?=URL_BASE?>administracion/listaventa&id=<?=$id_sucursal?>">
                  <button class="btn  btn-primary  btn-lg ">

                     Ventas

                  </button>
                  </a>
                  <hr>

                  <?php
                  // include "grafico-ventas.php";
                  ?>
  <h3> Reportes</h3>
               </div>

               <div class="col-md-6 col-xs-12">



                  <button class="btn  btn-primary  btn-lg " data-toggle="modal" data-target="#modalVentasPeriodo">

                     Ventas por Periodo

                  </button>
                  &nbsp;&nbsp;&nbsp;
                  <button class="btn  btn-primary  btn-lg " data-toggle="modal" data-target="#modalProdventas">

                     Venta de Productos 

                  </button>


               </div>

               <div class="col-md-6 col-xs-12">

                  <button class="btn  btn-primary  btn-lg " data-toggle="modal" data-target="#modalVentasClientes">

                     Ventas por Cliente

                  </button>
                  &nbsp;&nbsp;&nbsp;
                  <button class="btn  btn-primary  btn-lg " data-toggle="modal" data-target="#modalcierreVenta">

                     Cierres de Caja

                  </button>	

               </div>
               <br>
               <br>
               <hr>
               <div class="col-md-6 col-xs-12">




               </div>
               <div class="col-md-6 col-xs-12">



               </div>

            </div>

         </div>



      </div>

   </section>

</div>





<div id="modalVentasPeriodo" class="modal fade" role="dialog">

   <div class="modal-dialog">

      <div class="modal-content">

         <form role="form" action="<?= URL_BASE ?>extensiones/tcpdf/pdf/ventasporperiodo.php" method="GET" target="_blank" >
            <input  type="hidden" value="<?= $id_sucursal ?>" name="idsucursal">
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

<div id="modalProdventas" class="modal fade" role="dialog">

   <div class="modal-dialog">

      <div class="modal-content">

         <form role="form" action="<?= URL_BASE ?>extensiones/tcpdf/pdf/productosventas.php" method="GET" target="_blank" >
            <input  type="hidden" value="<?= $id_sucursal ?>" name="idsucursal">
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

<div id="modalVentasClientes" class="modal fade" role="dialog">

   <div class="modal-dialog">

      <div class="modal-content">

         <form role="form" action="<?= URL_BASE ?>extensiones/tcpdf/pdf/comprasclientes.php" method="GET" target="_blank" >
            <input  type="hidden" value="<?= $id_sucursal ?>" name="idsucursal">
            <!--=====================================
            CABEZA DEL MODAL
            ======================================-->

            <div class="modal-header" style="background:#3c8dbc; color:white">

               <button type="button" class="close" data-dismiss="modal">&times;</button>

               <h4 class="modal-title">Ventas por Clientes</h4>

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


<div id="modalcierreVenta" class="modal fade" role="dialog">

   <div class="modal-dialog">

      <div class="modal-content">

         <form role="form" action="<?= URL_BASE ?>extensiones/tcpdf/pdf/comprasclientes.php" method="GET" target="_blank" >
            <input  type="hidden" value="<?= $id_sucursal ?>" name="idsucursal">
            <!--=====================================
            CABEZA DEL MODAL
            ======================================-->

            <div class="modal-header" style="background:#3c8dbc; color:white">

               <button type="button" class="close" data-dismiss="modal">&times;</button>

               <h4 class="modal-title">Cierres de caja</h4>

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