
<div class="container">


   <section class="content">

      <div class="box">

         <div class="box-header with-border">

            <?php if ($_SESSION["identity"]->tipo == "maestro"): ?>
               <a href="<?= URL_BASE ?>administracion/">
                  <button class="btn btn-primary">

                     Inicio

                  </button>
               </a>

            <?php else: ?>

               <a href="<?= URL_BASE ?>frontend/principal">
                  <button class="btn btn-primary">

                     inicio

                  </button>
               </a>
            <?php endif; ?>

         </div>


         <div class="box-body">


            <div class="row">



               <div class="box-body">

                  <div class="panel panel-default">
                     <div class="panel-heading"><h3>Informes</h3></div>

                  </div>

                  <div class="row">
                     <div class="col-lg-3 col-xs-6">
                        <!-- small box -->
                        <div class="small-box bg-aqua">
                           <div class="inner">
                              <h3></h3>

                              <p>VENTAS REALIZADAS</p>
                           </div>
                           <div class="icon">
                              <i class="ion ion-bag"></i>
                           </div>
                           <?php if ($_SESSION["identity"]->tipo == "maestro"): ?>
                              <a href="<?= URL_BASE ?>administracion/detallesventasucursal&id=<?= $id_sucursal ?>" class="small-box-footer">Más información <i class="fa fa-arrow-circle-right"></i></a>
                           <?php else: ?>

                              <a href="<?= URL_BASE ?>ventas/reporteventas" class="small-box-footer">Más información <i class="fa fa-arrow-circle-right"></i></a>
                           <?php endif; ?>
                        </div>
                     </div>
                     <!-- ./col -->
                     <div class="col-lg-3 col-xs-6">
                        <!-- small box -->
                        <div class="small-box bg-green">
                           <div class="inner">
                              <h3></h3>

                              <p>UTILIDADES</p>
                           </div>
                           <div class="icon">
                              <i class="ion ion-stats-bars"></i>
                           </div>
                           <?php if ($_SESSION["identity"]->tipo == "maestro"): ?>
                              <a href="<?= URL_BASE ?>administracion/utilidades&id=<?= $id_sucursal ?>" class="small-box-footer">Más información <i class="fa fa-arrow-circle-right"></i></a>
                           <?php else: ?>
                              <a href="<?= URL_BASE ?>reporte/utilidades&id=<?= $id_sucursal ?>" class="small-box-footer">Más información <i class="fa fa-arrow-circle-right"></i></a>
                           <?php endif; ?>
                        </div>
                     </div>
                     <div class="col-lg-3 col-xs-6">
                        <!-- small box -->
                        <div class="small-box bg-green">
                           <div class="inner">
                              <h3></h3>

                              <p>VALOR INVENTARIO</p>
                           </div>
                           <div class="icon">
                              <i class="ion ion-stats-bars"></i>
                           </div>
                           <?php if ($_SESSION["identity"]->tipo == "maestro"): ?>
                              <a href="<?= URL_BASE ?>administracion/valorinventario&id=<?= $id_sucursal ?>" class="small-box-footer">Más información <i class="fa fa-arrow-circle-right"></i></a>
                           <?php else: ?>
                              <a href="<?= URL_BASE ?>reporte/valorinventario&id=<?= $id_sucursal ?>" class="small-box-footer">Más información <i class="fa fa-arrow-circle-right"></i></a>
                           <?php endif; ?>
                        </div>
                     </div>


                     <div class="col-lg-3 col-xs-6">

                        <div class="small-box bg-yellow">
                           <div class="inner">
                              <h3></h3>

                              <p>COMPRAS</p>
                           </div>
                           <div class="icon">
                              <i class="ion ion-pie-graph"></i>
                           </div>
                           <a href="<?= URL_BASE ?>compras/reportecompra&id=<?= $id_sucursal ?>" class="small-box-footer">Más información <i class="fa fa-arrow-circle-right"></i></a>
                        </div>
                     </div>

                  </div>

               </div>




            </div>
            <!-- /.row -->

         </div>

      </div>

   </section>

</div>
