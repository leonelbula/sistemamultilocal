<div class="container">
   <!-- Content Header (Page header) -->
   
   <!-- Main content -->
   <section class="content">

      <!-- Default box -->
      <div class="box">
         <div class="box-header with-border">
            <h3 class="box-title">lista de Plansepare</h3>

         </div>
         <div class="box-body">
            <div class="box-header with-border">
               <a href="<?= URL_BASE ?>frontend/principal">
                  <button class="btn btn-primary">

                     Inicio

                  </button>
               </a>
               <a href="<?= URL_BASE ?>plansepare/nuevo">
                  <button class="btn btn-primary">

                     Nuevo Plan separe

                  </button>
               </a>               
               <a href="<?= URL_BASE ?>plansepare/listar">
                  <button class="btn btn-primary">

                     Ver Todo

                  </button>
               </a>
              
            </div>
         </div>
         <div class="box-body">
            <table id="PlansepareRealizados" class=" table table-bordered table-striped dt-responsive PlansepareRealizados" style="width:100%">
               <thead>
                  <tr>
                     <th>#</th>
                     <th>Codigo</th>
                     <th>Cliente</th>
                     <th>fecha</th>
                     <th>fecha Vencimiento</th>
                     <th>valor</th>                     
                     <th>acciones</th>							
                  </tr>
               </thead>
               <tbody>
                  <?php
                  
                  
                  if(isset($_GET['id'])){
                     
                  }else{
                     
                      $detallePlanSepareSucursal = plansepareController::plancepareSucursal($id_sucursal);
                  }                  
              
                  $i = 1;
                 
                  if($detallePlanSepareSucursal):
                  while ($row = $detallePlanSepareSucursal->fetch_object()):
                     ?>
                     <tr>

                        <td><?= $i++ ?></td>

                        <td><?= $row->codigo ?></td>
                        <?php
                        $id = $row->id_cliente;
                        $detallesCliente = clienteController::MostrarClienteId($id);
                        while ($row1 = $detallesCliente->fetch_object()) {
                           $Nomclientes = $row1->nombre;
                        }
                        echo '<td>' . $Nomclientes . '</td>';


                        echo '<td>' . $row->fecha . '</td>
							 <td>' . $row->fecha_vencimiento . '</td>
							 <td>$ ' . number_format($row->total) . '</td>';
                        ;
                        
                        ?>
                                             

                        <td>

                           <div class="btn-group">

                              <button class="btn btn-info btnImprimirPlansepare" codigo="<?= $row->codigo ?>">

                                 <i class="fa fa-print"></i>

                              </button>
                              <?php
                              if ($_SESSION["identity"]->tipo == "admin") {

                                 echo '<button class="btn btn-warning btnEditarPlansepare" idPlansepare="' . $row->id . '"><i class="fa fa-pencil"></i></button>

                      <button class="btn btn-danger btnEliminarPlansepare" idPlansepare="' . $row->id . '"><i class="fa fa-times"></i></button>';
                              }
                              ?>
                              <a href="<?= URL_BASE ?>plansepare/ver&id=<?= $row->id ?>">
                                 <button class="btn btn-warning btnEditarCategoria">
                                    <i class="fa fa-eye"></i>
                                 </button>
                              </a>
                           </div>  

                        </td>				  

                     </tr>

                  <?php endwhile;                  endif;?>
               </tbody>
            </table>
         </div>
         <!-- /.box-body -->
         
         <!-- /.box-footer-->
      </div>
      <!-- /.box -->

   </section>
   <!-- /.content -->


   <script>
      $(function () {
         $('#PlansepareRealizados').DataTable()

      })
   </script>
</div>

