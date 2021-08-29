<div class="content-wrapper">

   <section class="content-header">

      <h1>
         Detalles Cierre de ventas
      </h1>

      <ol class="breadcrumb">

         <li><a href="<?= URL_BASE ?>frontend/principal"><i class="fa fa-dashboard"></i> Inicio</a></li>

         <li class="active">Detalles Cierre de ventas</li>

      </ol>

   </section>

   <section class="content">

      <div class="box">

         <div class="box-header with-border">
             <?php if ($_SESSION["identity"]->tipo == "maestro"): ?>
               <a href="<?= URL_BASE ?>administracion/">
                  <button class="btn btn-primary">

                     Inicio

                  </button>
               </a>
               <a href="<?= URL_BASE ?>administracion/listaventa&id=<?= $id_sucursal ?>">
                  <button class="btn  btn-primary ">

                     Lista de cierres

                  </button>
               </a>
            <?php else: ?>
            <a href="<?= URL_BASE ?>ventas/IniciarVenta">
               <button class="btn btn-primary" data-toggle="modal" data-target="#modalAgregarCategoria">

                  volver

               </button>
            </a>
            <?php endif; ?>
         </div>


         <div class="box-body">

            <div class="panel panel-default">
               <div class="panel-heading">Informacion de cierre de caja</div>
               <ul class="list-group">			  
                  <?php while ($row = $detalles->fetch_object()):
                     ?>

                     <li class="list-group-item"><h4><b>FECHA INICIO:</b> <?= $row->fecha_inicio ?></h4></li>
                     <li class="list-group-item"><h4><b>VENTA TOTAL:</b> <?= number_format($row->totalingresos) ?></h4></li>
                     <li class="list-group-item"><h4><b>NO EXISTENTES:</b> <?= number_format($row->noexistente) ?></h4></li>
                     <li class="list-group-item"><h4><b>PLAN SEPARE:</b> <?= number_format($row->plansepare) ?></h4></li>
                     <li class="list-group-item"><h4><b>OTROS MEDIO DE PAGO:</b> <?= number_format($row->otrosmedio) ?></h4></li>
                     <li class="list-group-item"><h4><b>DEVOLUCIONES:</b> <?= number_format($row->devolucion) ?></h4></li>                                    
                     <li class="list-group-item"><h4><b>GASTOS:</b> <?= number_format($row->totalgastos) ?></h4></li>
                     <li class="list-group-item"><h4><b>EFECTIVO ENTREGADO:</b> <?= number_format($row->montoentregado) ?></h3></li>
                     <li class="list-group-item"><h4><b>DIFERENCIA:</b> <?= number_format($row->diferencia) ?></h4></li>
                     <li class="list-group-item"><h4><b>FECHA DE CIERRE:</b> <?= $row->fecha_cierre ?></h4></li>

                  <?php endwhile; ?>
               </ul>
            </div>



         </div>
      </div>

</div>

</section>

</div>
