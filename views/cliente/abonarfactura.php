<div class="container">


   <section class="content">

      <div class="box">

         <div class="box-header with-border">
            <?php
            foreach ($listaEstado as $key => $value): 
               ?>
            <a href="<?= URL_BASE ?>cliente/verestadocuentacliente&id=<?= $value['id_cliente'] ?>">
               <button class="btn btn-primary">

                  Cancelar

               </button>
            </a>
         </div>


         <div class="box-body">


            <div class="row">
               <form action="<?= URL_BASE ?>cliente/guardarabono" method="POST" >
                   <input type="hidden" class="idsucursal" name="idsucursal" id="idsucursal" value="<?=$id_sucursal?>">
                  <?php
                  

                     $cliente = clienteController::MostrarClienteId($value['id_cliente']);
                     foreach ($cliente as $key => $valueP) {
                        $nombre = $valueP['nombre'];
                     }
                     ?>

                     <div class="col-md-8">
                        <input type="hidden" name="id" value="<?= $value['id'] ?>"/> 		
                        <div class="box box-danger">
                           <div class="box-header">
                              <h3 class="box-title">Registrar Nuevo Abono</h3>
                           </div>
                           <div class="box-body">
                              <div class="col-md-6">
                                 <!-- Date dd/mm/yyyy -->
                                 <div class="form-group">
                                    <label>Cliente:</label>

                                    <div class="input-group">
                                       <div class="input-group-addon">
                                          <i class="fa fa-user"></i>
                                       </div>
                                       <input type="text" class="form-control" value="<?= $nombre ?>" name="nombre" disabled>
                                    </div>
                                    <!-- /.input group -->
                                 </div>
                                 <div class="form-group">
                                    <label>Fecha del Abono:</label>

                                    <div class="input-group">
                                       <div class="input-group-addon">
                                          <i class="fa fa-calendar"></i>
                                       </div>
                                       <input type="date" class="form-control" name="fecha" required>
                                    </div>
                                    <!-- /.input group -->
                                 </div>
                              </div>
                              <div class="col-md-6">
                                 <div class="form-group">
                                    <label>Numero  de factura:</label>

                                    <div class="input-group">
                                       <div class="input-group-addon">
                                          <i class="fa fa-tag"></i>
                                       </div>
                                       <input type="text" class="form-control" value="<?= $value['codigo'] ?>" name="numerofactura" disabled>

                                    </div>
                                    <!-- /.input group -->
                                 </div>
                              </div>
                              <div class="col-md-6">
                                 <div class="form-group">
                                    <label>Saldo factura</label>

                                    <div class="input-group">
                                       <div class="input-group-addon">
                                          <i class="fa fa-tag"></i>
                                       </div>
                                       <input type="number" class="form-control" value="<?= $value['saldo'] ?>" disabled>
                                    </div>
                                    <!-- /.input group -->
                                 </div>
                              </div>

                              <!-- /.form group -->
<?php endforeach; ?>
                           <!-- Date mm/dd/yyyy -->
                           <div class="form-group">
                              <label>Valor abono:</label>
                              <div class="input-group">
                                 <div class="input-group-addon">
                                    <i class="fa fa-tag"></i>
                                 </div>
                                 <input type="number" class="form-control" name="valor" required>
                              </div>
                              <!-- /.input group -->
                           </div>
                           <!-- /.form group -->

                           <!-- phone mask -->
                           <div class="form-group">
                              <label>Descripcion:</label>

                              <div class="input-group">
                                 <div class="input-group-addon">
                                    <i class="fa fa-bookmark-o"></i>
                                 </div>
                                 <textarea class="form-control" rows="3" name="descripcion" placeholder="Descripcion ..."></textarea>
                              </div>
                              <!-- /.input group -->
                           </div>


                        </div>
                        <!-- /.box-body -->
                     </div>
                     <!-- /.box -->

                     <button class="btn btn-primary" type="submit">

                        Guardar 
                     </button>
                     <!-- /.box -->

                  </div>
                  <!-- /.col (left) -->

                  <!-- /.col (right) -->
               </form>
            </div>
            <!-- /.row -->

         </div>

      </div>

   </section>

</div>