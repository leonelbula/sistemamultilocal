<!-- Content Wrapper. Contains page content -->
<div class="container">
   <!-- Content Header (Page header) -->
   <section class="content-header">
      <h1>
         Iniciar punto de ventas

      </h1>
      <ol class="breadcrumb">
         <li><a href="<?= URL_BASE ?>frontend/principal"><i class="fa fa-dashboard"></i> Pincipal</a></li>
         <li><a>Ventas</a></li>

      </ol>
   </section>

   <!-- Main content -->
   <section class="content">

      <!-- Default box -->
      <div class="box">
         <div class="box-header with-border">   

            <?php if ($_SESSION["identity"]->tipo == "maestro"): ?>
               <a href="<?= URL_BASE ?>administracion/">
                  <button class="btn btn-primary">

                     Inicio

                  </button>
               </a>
               <a href="<?= URL_BASE ?>administracion/listaventa&id=<?= $id_sucursal ?>">
                  <button class="btn  btn-primary">

                     Ventas

                  </button>
               </a>
            <?php else: ?>

               <a href="<?= URL_BASE ?>frontend/principal">
                  <button class="btn btn-primary">

                     Inicio

                  </button>
               </a>

            <?php
            endif;

            $detalles = ventasController::verInicioventa($id_sucursal);

            while ($row = $detalles->fetch_object()) {
               $estado = $row->estado;
            }
            if (isset($estado) == 1 && $_SESSION["identity"]->tipo != "maestro"):
               ?>
               <a href="<?= URL_BASE ?>ventas/nuevaventa">
                  <button class="btn btn-primary">

                     Nuevo venta

                  </button>
               </a>
               <button class="btn btn-primary" data-toggle="modal" data-target="#modalCerrarPos">

                  Cerrar Punto de venta

               </button>
            <?php else: 
               
               if ( $_SESSION["identity"]->tipo != "maestro"):
               ?>
            
            

               <button class="btn btn-primary" data-toggle="modal" data-target="#modalIniciarPos">

                  Inicar Punto de venta

               </button>
            
            <?php
            endif;
            endif;
            ?>

         </div>
         <div class="box-body">
            <table id="puntoventas" class=" table table-bordered table-striped dt-responsive tablas" style="width:100%">
               <thead>
                  <tr>
                     <th>#Id</th>
                     <th>fecha Inicio</th>
                     <th>fecha Cierre</th>
                     <th>Total Gastos</th>
                     <th>Total OtrosMedios</th>
                     <th>Total NoExistente</th>
                     <th>Total PlanSepare</th>
                     <th>Total Devolucion</th>
                     <th>Total Vendido</th>
                     <th>Total Entregado</th>
                     <th>Diferencia</th>
                     <th>Acciones</th>													
                  </tr>
               </thead>
               <tbody>
                  <?php
                  $listacierres = VentasController::verVentaActivaSucursal($id_sucursal);
                  $i = 1;
                  while ($row1 = $listacierres->fetch_object()) :
                     ?>
                     <tr>
                        <td><?= $i++; ?></td>
                        <td><?= $row1->fecha_inicio; ?></td>
                        <td><?= $row1->fecha_cierre; ?></td>
                        <td><?= number_format($row1->totalgastos); ?></td>                       
                        <td><?= number_format($row1->otrosmedio); ?></td>
                        <td><?= number_format($row1->noexistente); ?></td>
                        <td><?= number_format($row1->plansepare); ?></td>
                        <td><?= number_format($row1->devolucion); ?></td>
                        <td><?= number_format($row1->totalingresos); ?></td>
                        <td><?= number_format($row1->montoentregado); ?></td>
                        <td><?= number_format($row1->diferencia); ?></td>
                        <td>

                           <a href="<?= URL_BASE ?>ventas/vercierre&id=<?= $row1->id ?>"><button class="btn btn-warning"><i class="fa fa-eye"></i></button></a>

                        </td>
                     </tr>
                  <?php endwhile; ?>
               </tbody>
            </table>

         </div>
         <!-- /.box-body -->
         <div class="box-footer">
            Iniciar Ventas
         </div>
         <!-- /.box-footer-->
      </div>
      <!-- /.box -->

   </section>
   <!-- /.content -->
</div>
<!-- /.content-wrapper -->
<div id="modalIniciarPos" class="modal fade" role="dialog">

   <div class="modal-dialog">

      <div class="modal-content">

         <form action="<?= URL_BASE ?>ventas/guardarinicioventa" method="POST">
            <input type="hidden" class="idsucursal" name="idsucursal" id="idsucursal" value="<?= $id_sucursal ?>">

            <!--=====================================
            CABEZA DEL MODAL
            ======================================-->

            <div class="modal-header" style="background:#3c8dbc; color:white">

               <button type="button" class="close" data-dismiss="modal">&times;</button>

               <h4 class="modal-title">Inicar venta Diaria</h4>

            </div>

            <!--=====================================
            CUERPO DEL MODAL
            ======================================-->

            <div class="modal-body">

               <div class="box-body">
                  <div class="form-group">

                     <div class="input-group">

                        <span class="input-group-addon"><i class="fa fa-th"></i></span>

                        <input type="date" name="fecha" placeholder="fecha"  value="<?= date('Y-m-d') ?>"  class="form-control input-lg"  />

                     </div> 

                  </div>     
                  <div class="form-group">

                     <div class="input-group">

                        <span class="input-group-addon"><i class="fa fa-th"></i></span>

                        <input type="number" name="basecaja"  placeholder="Ingrese valor caja base" class="form-control input-lg" required />

                     </div> 

                  </div>     


               </div>

            </div>

            <!--=====================================
            PIE DEL MODAL
            ======================================-->

            <div class="modal-footer">

               <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Salir</button>

               <button type="submit" class="btn btn-primary">Iniciar Ventas</button>

            </div>

         </form>


      </div>

   </div>

</div>

<div id="modalCerrarPos" class="modal fade" role="dialog">

   <div class="modal-dialog">

      <div class="modal-content">

         <form action="<?= URL_BASE ?>ventas/guardarcierreventa" method="POST">
            <input type="hidden" class="idsucursal" name="idsucursal" id="idsucursal" value="<?= $id_sucursal ?>">


            <!--=====================================
            CABEZA DEL MODAL
            ======================================-->

            <div class="modal-header" style="background:#3c8dbc; color:white">

               <button type="button" class="close" data-dismiss="modal">&times;</button>

               <h4 class="modal-title">Cerrar venta Diaria</h4>

            </div>

            <!--=====================================
            CUERPO DEL MODAL
            ======================================-->

            <div class="modal-body">

               <div class="box-body">
                  <div class="form-group">

                     <div class="input-group">

                        <span class="input-group-addon"><i class="fa fa-th"></i></span>

                        <input type="date" name="fecha" placeholder="fecha"  value="<?= date('Y-m-d') ?>" disabled class="form-control input-lg"  />

                     </div> 

                  </div>     
                  <div class="form-group">

                     <div class="input-group">

                        <span class="input-group-addon"><i class="fa fa-th"></i></span>
                        <?php
                        $detalles = VentasController::VerValorCaja($id_sucursal);
                        foreach ($detalles as $key => $value):
                           ?>

                           <input type="text" class="form-control input-lg" value="VALOR BASE CAJA: <?= number_format($value['basecaja']) ?>" disabled/>
                           <?php
                        endforeach;
                        ?>


                     </div> 

                  </div> 
                  <div class="form-group">

                     <div class="input-group">

                        <span class="input-group-addon"><i class="fa fa-th"></i></span>

                        <input type="number" name="caja"  placeholder="Ingrese Valor total" class="form-control input-lg" required />

                     </div> 

                  </div>     


               </div>

            </div>

            <!--=====================================
            PIE DEL MODAL
            ======================================-->

            <div class="modal-footer">

               <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Salir</button>

               <button type="submit" class="btn btn-primary">Cerrar Ventas</button>

            </div>

         </form>


      </div>

   </div>

</div>
<script>
   $(function () {
      $('#puntoventas').DataTable()
   })

</script>
