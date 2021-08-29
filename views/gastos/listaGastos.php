<div class="container">


   <section class="content">

      <div class="box">

         <div class="box-header with-border">
             <a href="<?= URL_BASE ?>frontend/principal">
               <button class="btn btn-primary">

                  Inicio

               </button>
            </a>
            <a href="<?= URL_BASE ?>gastos/nuevogastos">
               <button class="btn btn-primary">

                  Nuevo Gasto

               </button>
            </a>
           
         </div>


         <div class="box-body">

            <table id="tablaGastos" class="table table-bordered table-striped dt-responsive " width="100%">

               <thead>

                  <tr>

                     <th style="width:10px">Codigo</th>
                     <th>Gastos</th>
                     <th>valor</th> 
                     <th>fecha</th>		 

                     <th>Acciones</th>

                  </tr>

               </thead>
               <tbody>
                  <?php
                  $listaGastos = gastosController::GastoSucursal($id_sucursal);
                  
                  while ($row = $listaGastos->fetch_object()):
                     ?>
                     <tr>
                        <td><?= $row->id ?></td>                  
                        <td><?= $row->descripcion ?></td>
                        <td><?= $row->valor ?></td>
                        <td><?= $row->fecha ?></td>				  
                        <td>
                           <div class="btn-group">
                              <a href="<?= URL_BASE ?>gastos/editar&id=<?= $row->id ?>">
                                 <button class="btn btn-warning ">
                                    <i class="fa fa-pencil"></i>
                                 </button>
                              </a>
                              <a href="<?= URL_BASE ?>gastos/eliminar&id=<?= $row->id ?>">
                                 <button class="btn btn-danger">
                                    <i class="fa fa-times"></i>
                                 </button>
                              </a>
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

<script>
   $(function () {

      $('#tablaGastos').DataTable()
   })
</script>