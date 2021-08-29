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


            <a href="<?= URL_BASE ?>frontend/principal">
               <button class="btn btn-primary">

                  Inicio

               </button>
            </a>

            <?php
            $detalles = validarinventarioController::verificarestado();

            while ($row = $detalles->fetch_object()) {
               $estado = $row->estado;
            }
            if (isset($estado) == 1):
               ?>
               <a href="<?= URL_BASE ?>validarinventario/validar">
                  <button class="btn btn-primary">

                     validar

                  </button>
               </a>
               <button class="btn btn-primary" data-toggle="modal" data-target="#modalCerrar">

                  finalizar

               </button>
<?php else:
   ?>           


               <button class="btn btn-primary" data-toggle="modal" data-target="#modalIniciar">

                  Inicar inventario

               </button>

<?php
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
                     <th>Acciones</th>	
                     <th>Porcesos</th>	
                     <th>Informe</th>	
                  </tr>
               </thead>
               <tbody>
<?php
$lista = validarinventarioController::verificarestado();
$i = 1;

foreach ($lista as $key => $value) :
  



   ?>
                     <tr>
                        <td><?= $i++; ?></td>
                         <td><?= $value['fechainicio']; ?></td>
                          <td><?= $value['fechafinal']; ?></td>
                        
                        <td>

                           <a href="<?= URL_BASE ?>extensiones/tcpdf/pdf/reporteinventario.php?id=<?= $value['id'] ?>" " target="_blank"><button class="btn btn-warning"><i class="fa fa-eye"></i></button></a>
                           

                        </td>
                        <td>
                           <form method="post" action="<?= URL_BASE ?>validarinventario/actulizarSobrantes">
                              <input type="hidden" name="estado" value="1"><input type="submit" class="btn btn-success" value="Corregir Cantidades"></form>
                        </td>
                         <td>

                           <a href="<?= URL_BASE ?>extensiones/tcpdf/pdf/nocontado.php?id=<?= $value['id'] ?>" " target="_blank"><button class="btn btn-warning"><i class="fa fa-eye"></i></button></a>
                           

                        </td>
                     </tr>
<?php endforeach; ?>
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
<div id="modalIniciar" class="modal fade" role="dialog">

   <div class="modal-dialog">

      <div class="modal-content">

         <form action="<?= URL_BASE ?>validarinventario/savestart" method="POST">
            <input type="hidden" class="idsucursal" name="idsucursal" id="idsucursal" value="<?= $id_sucursal ?>">

            <!--=====================================
            CABEZA DEL MODAL
            ======================================-->

            <div class="modal-header" style="background:#3c8dbc; color:white">

               <button type="button" class="close" data-dismiss="modal">&times;</button>

               <h4 class="modal-title">Inicar Inventario</h4>

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
                  
               </div>

            </div>

            <!--=====================================
            PIE DEL MODAL
            ======================================-->

            <div class="modal-footer">

               <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Salir</button>

               <button type="submit" class="btn btn-primary">Iniciar</button>

            </div>

         </form>


      </div>

   </div>

</div>

<div id="modalCerrar" class="modal fade" role="dialog">

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

                        <input type="date" name="fecha" placeholder="fecha"  value="<?= date('Y-m-d') ?>"  class="form-control input-lg"  />

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
