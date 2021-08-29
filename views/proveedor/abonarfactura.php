<div class="container">

   <section class="content-header">

      <h1>
         Registrar Nuevo Abono
      </h1>

      <ol class="breadcrumb">

         <li><a href="<?= URL_BASE ?>frontend/principal"><i class="fa fa-dashboard"></i> Inicio</a></li>

         <li class="active">Registrar Nuevo Abono</li>

      </ol>

   </section>

   <section class="content">

      <div class="box">
         <?php
         foreach ($listaEstado as $key => $value):
            ?>

            <div class="box-header with-border">
               <a href="<?= URL_BASE ?>proveedor/verestadocuentaprov&id=<?= $value['id_proveedor'] ?>">
                  <button class="btn btn-primary">

                     Cancelar

                  </button>
               </a>
            </div>


            <div class="box-body">


               <div class="row">
                  <form action="<?= URL_BASE ?>proveedor/guardarabono" method="POST" >
                     <?php
                     $proveedor = ProveedorController::MostrarproveedorId($value['id_proveedor']);
                     foreach ($proveedor as $key => $valueP) {
                        $nombre = $valueP['nombre'];
                     }
                     ?>

                     <div class="col-md-8">
                        <input type="hidden" name="id" value="<?= $value['id'] ?>"/> 		
                        <div class="box box-danger">
                           <div class="box-header">
                              <h3 class="box-title">Informacion de Proveedor</h3>
                           </div>
                           <div class="box-body">
                              <div class="col-md-6">
                                 <!-- Date dd/mm/yyyy -->
                                 <div class="form-group">
                                    <label>Proveedor:</label>

                                    <div class="input-group">
                                       <div class="input-group-addon">
                                          <i class="fa fa-user"></i>
                                       </div>
                                       <input type="text" class="form-control" value="<?= $nombre ?>" name="proveedor" disabled>
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
                                       <input type="text" class="form-control" value="<?= $value['numero_factura'] ?>" name="numerofactura" disabled>

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