<?php
$totalVentas = reporteController::totalventasucursal($id_sucursal);

$totalUtilidad = reporteController::totalganaciasucursal($id_sucursal);

$valorGastos = reporteController::totalgastosucursal($id_sucursal);



while ($row = $totalVentas->fetch_object()) {
   $totalventas = number_format($row->total);
}

while ($row = $totalUtilidad->fetch_object()) {
   $totalutilidad = number_format($row->total);
}

while ($row = $valorGastos->fetch_object()) {
   $totalGasto = number_format($row->total);
}
?>



<div class="container">

   <section class="content-header">

      <h1>
         Detalles Ganancias y Perdidas
      </h1>

      <ol class="breadcrumb">

         <li><a href="<?= URL_BASE ?>frontend/principal"><i class="fa fa-dashboard"></i> Inicio</a></li>

         <li class="active">Detalles </li>

      </ol>

   </section>

   <section class="content">

      <div class="box">
         <div class="box-header with-border">
<?php if ($_SESSION["identity"]->tipo == "maestro"): ?>
               <a href="<?= URL_BASE ?>administracion/reportessucursal&id=<?= $_GET['id'] ?>">
                  <button class="btn btn-primary">

                     Inicio

                  </button>
               </a>

<?php else: ?>

               <a href="<?= URL_BASE ?>reporte/">
                  <button class="btn btn-primary">

                     inicio

                  </button>
               </a>

<?php endif; ?>


         </div>

         <div class="box-header with-border">


            <button class="btn  btn-primary btn-lg " data-toggle="modal" data-target="#modalUtilidadesPeriodo">

               Reporte de Utilidades

            </button>




         </div>


         <div class="box-body">

            <div class="panel panel-default">
               <div class="panel-heading"><h3>Informe de Ganancias y Pedidas</h3></div>

            </div>

            <div class="row">
               <div class="col-lg-3 col-xs-6">
                  <!-- small box -->
                  <div class="small-box bg-aqua">
                     <div class="inner">
                        <h3><?= $totalventas; ?></h3>

                        <p>VENTAS REALIZADAS</p>
                     </div>
                     <div class="icon">
                        <i class="ion ion-bag"></i>
                     </div>
                     <a href="<?= URL_BASE ?>ventas/reporteventas" class="small-box-footer">Más información <i class="fa fa-arrow-circle-right"></i></a>
                  </div>
               </div>
               <!-- ./col -->
               <div class="col-lg-3 col-xs-6">
                  <!-- small box -->
                  <div class="small-box bg-green">
                     <div class="inner">
                        <h3><?= $totalutilidad; ?></h3>

                        <p>UTILIDADES</p>
                     </div>
                     <div class="icon">
                        <i class="ion ion-stats-bars"></i>
                     </div>
                     <a href="<?= URL_BASE ?>reporte/utilidades" class="small-box-footer">Más información <i class="fa fa-arrow-circle-right"></i></a>
                  </div>
               </div>
               <!-- ./col -->

               <div class="col-lg-3 col-xs-6">
                  <!-- small box -->
                  <div class="small-box bg-yellow">
                     <div class="inner">
                        <h3><?= $totalGasto; ?></h3>

                        <p>GASTOS REGISTRADOS</p>
                     </div>
                     <div class="icon">
                        <i class="ion ion-pie-graph"></i>
                     </div>
                     <a href="<?= URL_BASE ?>gastos/reportes" class="small-box-footer">Más información <i class="fa fa-arrow-circle-right"></i></a>
                  </div>
               </div>

            </div>

         </div>


      </div>



   </section>



</div>

<div id="modalUtilidadesPeriodo" class="modal fade" role="dialog">

   <div class="modal-dialog">

      <div class="modal-content">

         <form role="form" action="<?= URL_BASE ?>extensiones/tcpdf/pdf/ganaciasyperdidas.php" method="GET" target="_blank" >

            <input type="hidden" class="idsucursal" name="idsucursal" id="idsucursal" value="<?= $id_sucursal ?>">

            <!--=====================================
            CABEZA DEL MODAL
            ======================================-->

            <div class="modal-header" style="background:#3c8dbc; color:white">

               <button type="button" class="close" data-dismiss="modal">&times;</button>

               <h4 class="modal-title">ESTADO DE GANACIAS Y PERDIDAS</h4>

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
