<div class="container">


   <section class="content">

      <div class="box">
         <div class="box-header with-border">
            <a href="<?= URL_BASE ?>plansepare/listar">
               <button class="btn btn-primary">

                  volver

               </button>
            </a>
         </div>
         <div class="row invoice-info">

            <div class="col-sm-12 invoice-col">	
               <?php
               
               $id = $_GET['id'];
               
               while ($row1 = $detalles->fetch_object()) {
                  $id_cliente = $row1->id_cliente;
}
               $datosCliente = clienteController::MostrarClienteId($id_cliente);

               foreach ($datosCliente as $key => $value) {
                  $nombre = $value['nombre'];
                  $nit = $value['nit'];
               }
               ?>   
               <h3>&nbsp;&nbsp;&nbsp;<strong>Nombre:</strong> <?= $nombre ?></h3>
               <address>					 
                  <h4>&nbsp;&nbsp;&nbsp;&nbsp;<strong>Nit: </strong> <?= $nit ?> <br></h4>

               </address>
            </div>
         </div>


         <div class="box-body">

            <table class="table table-bordered table-striped dt-responsive tablaestadocuentaprovedor" width="100%">

               <thead>

                  <tr>

                     <th style="width:10px">Codigo</th>			 
                     <th>N° factura</th>
                     <th>Fecha</th>
                     <th>A 30 días</th>
                     <th>A 45 días</th>
                     <th>A 60 días</th>
                     <th>mas de 61 días</th>
                     <th>Valor</th>
                     <th>Saldo</th> 			  
                     <th>Acciones</th>

                  </tr>

               </thead>
               <tbody>
                  <tr>   		   
<?php
while ($row = $listaEstado->fetch_object()) :
   ?>
                        <td><?= $row->id ?></td>
                        <td>Factura N°<?= $row->codigo ?></td>
                        <td><?= $row->fecha ?></td>				  
                        <?php
                        $fechaAct = date('Y-m-d');
                        $fecha = $row->fecha;
                        $fechaActual = strtotime('+30 day', strtotime($fecha));
                        $fechaNueva = date('Y-m-d', $fechaActual);
                        $fechaActual2 = strtotime('+45 day', strtotime($fecha));
                        $fechaNueva2 = date('Y-m-d', $fechaActual2);
                        $fechaActual3 = strtotime('+60 day', strtotime($fecha));
                        $fechaNueva3 = date('Y-m-d', $fechaActual3);
                        $fechaActual4 = strtotime('+61 day', strtotime($fecha));
                        $fechaNueva4 = date('Y-m-d', $fechaActual4);



                        if ($fechaNueva >= $fechaAct) {
                           echo '<td>' . number_format($row->saldo) . '</td>';
                        } else {
                           echo '<td>0</td>';
                        }if ($fechaNueva2 >= $fechaAct && $fechaNueva < $fechaAct) {
                           echo '<td>' . number_format($row->saldo) . '</td>';
                        } else {
                           echo '<td>0</td>';
                        }if ($fechaNueva3 >= $fechaAct && $fechaNueva < $fechaAct && $fechaNueva2 < $fechaAct) {
                           echo '<td>' . number_format($row->saldo) . '</td>';
                        } else {
                           echo '<td>0</td>';
                        }if ($fechaNueva4 <= $fechaAct) {
                           echo '<td>' . number_format($row->saldo) . '</td>';
                        } else {
                           echo '<td>0</td>';
                        }
                        ?>

                        <td><?= number_format($row->total) ?></td>
                        <td><?= number_format($row->saldo) ?></td>


                        <td>
                           <div class="btn-group">
                              <a href="<?= URL_BASE ?>plansepare/abonos&id=<?= $row->id ?>">
                                 <button class="btn btn-warning btnEditarCategoria">
                                    <i class="fa fa-eye"></i> Ver Abonos
                                 </button>
                              </a>
   <?php if ($row->saldo > 0): ?>		
                                 <a href="<?= URL_BASE ?>plansepare/abonar&id=<?= $row->id ?>">
                                    <button class="btn btn-primary btnEditarCategoria">
                                       <i class="fa fa-edit"></i> Abonar
                                    </button>
                                 </a>
                              <?php endif; ?>
                           </div>
                        </td>
                     </tr>
<?php endwhile; ?>
               </tbody>

            </table> 

         </div>


      </div>
      
   </section>

</div>
