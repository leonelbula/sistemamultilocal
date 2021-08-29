<div class="content-wrapper">

   <section class="content-header">

      <h1>
         Detalles Cliente
      </h1>

      <ol class="breadcrumb">

         <li><a href="<?= URL_BASE ?>frontend/principal"><i class="fa fa-dashboard"></i> Inicio</a></li>

         <li class="active">Detalles Cliente</li>

      </ol>

   </section>

   <section class="content">

      <div class="box">

         <div class="box-header with-border">
            <a href="<?= URL_BASE ?>cliente/">
               <button class="btn btn-primary" data-toggle="modal" data-target="#modalAgregarCategoria">

                  volver

               </button>
            </a>
           
               <button class="btn btn-primary" data-toggle="modal" data-target="#modalComprasCliente">

                  Compras por Perriodo

               </button>
          
         </div>


         <div class="box-body">

            <div class="panel panel-default">
               <div class="panel-heading">Informacion de Cliente</div>
               <ul class="list-group">			  
                  <?php while ($row = $detallesCliente->fetch_object()):
                     ?>

                     <li class="list-group-item"><b>Nombre:</b> <?= strtoupper($row->nombre) ?></li>
                     <li class="list-group-item"><b>Nit:</b> <?= $row->nit ?></li>
                     <li class="list-group-item"><b>Direccion:</b> <?= strtoupper($row->direccion) ?></li>
                     <li class="list-group-item"><b>Departamento:</b> <?= strtoupper($row->departamento) ?></li>
                     <li class="list-group-item"><b>Ciudad:</b></b> <?= strtoupper($row->ciudad) ?></li>
                     <li class="list-group-item"><b>Email:</b> <?= $row->email ?></li>
                     <li class="list-group-item"><b>Telefono:</b> <?= $row->telefono ?></li>

                  <?php endwhile; ?>
               </ul>
            </div>



         </div>
      </div>

</div>

</section>

</div>

<div id="modalComprasCliente" class="modal fade" role="dialog">

   <div class="modal-dialog">

      <div class="modal-content">

         <form role="form" action="<?= URL_BASE ?>extensiones/tcpdf/pdf/compraclienteperriodo.php" method="GET" target="_blank" >
<input  type="hidden" value="<?=$_GET['id']?>" name="idcliente">
            <!--=====================================
            CABEZA DEL MODAL
            ======================================-->
           
            <div class="modal-header" style="background:#3c8dbc; color:white">

               <button type="button" class="close" data-dismiss="modal">&times;</button>

               <h4 class="modal-title">Compras por periodo</h4>

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

