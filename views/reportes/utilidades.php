<div class="container">

   <section class="content-header">

      <h1>

         Reportes de Utilidades
<div class="container">


 
      </h1>

      <ol class="breadcrumb">

         <li><a href="inicio"><i class="fa fa-dashboard"></i> Inicio</a></li>

         <li class="active">Reportes de Utilidades</li>

      </ol>

   </section>

   <section class="content">

      <div class="box">

         <div class="box-header with-border">
            
              <?php if ($_SESSION["identity"]->tipo == "maestro"): ?>
            <a href="<?= URL_BASE ?>administracion/reportessucursal&id=<?=$_GET['id']?>">
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
         <div class="box-body">

            <div class="row">

               <div class="col-xs-12">

                  <?php
                  //include "grafico-utilidades.php";
                  ?>

               </div>

               <div class="col-md-6 col-xs-12">



                  <button class="btn  btn-primary  btn-lg " data-toggle="modal" data-target="#modalUtilidadesPeriodo">

                     Utilidades por Periodo

                  </button>
                  
                  <?php if ($_SESSION["identity"]->tipo == "maestro"): ?>
                  <a href="<?= URL_BASE ?>administracion/estganaciaperdidas&id=<?=$id_sucursal?>">
                    <button class="btn btn-primary btn-lg">

                      Ganancias y perdidas

                    </button>
                </a>
                  <?php else: ?>
                <a href="<?= URL_BASE ?>reporte/estganaciaperdidas&id=<?=$id_sucursal?>">
                    <button class="btn btn-primary btn-lg">

                      Ganancias y perdidas

                    </button>
                </a>
                  <?php endif; ?>

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





<div id="modalUtilidadesPeriodo" class="modal fade" role="dialog">

   <div class="modal-dialog">

      <div class="modal-content">

         <form role="form" action="<?= URL_BASE ?>extensiones/tcpdf/pdf/utilidadesporperiodo.php" method="GET" target="_blank" >
<input  type="hidden" value="<?=$id_sucursal?>" name="idsucursal">
            <!--=====================================
            CABEZA DEL MODAL
            ======================================-->
           
            <div class="modal-header" style="background:#3c8dbc; color:white">

               <button type="button" class="close" data-dismiss="modal">&times;</button>

               <h4 class="modal-title">Utilidades por periodo</h4>

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



