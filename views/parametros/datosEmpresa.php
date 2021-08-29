<div class="container">

  
   <section class="content">

      <div class="box">

         <div class="box-header with-border">
            <a href="<?= URL_BASE ?>frontend/principal">
               <button class="btn btn-primary">

                  Inicio

               </button>
            </a>
            <?php 
            $detallesEmpresa = parametrosController::MostrarInformacion($id_sucursal);
            if ($detallesEmpresa->num_rows == 0) { ?>
               <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#modalRegistrarDatos" data-dismiss="modal">
                  Agregar Datos
               </button>
            <?php } else { ?>
               <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#modalEditarDatos" data-dismiss="modal">
                  Editar Datos
               </button>
            <?php } ?>
            <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#modalEditarParametros" data-dismiss="modal">
               Editar  Configuracion
            </button>
         </div>
         <div class="row">
            <div class="col-md-6">
               <div class="box-body">

                  <div class="panel panel-default">
                     <div class="panel-heading">Informacion del Empresa</div>
                     <ul class="list-group">			  
                        <?php 
                        $detallesEmpresa = parametrosController::MostrarInformacion($id_sucursal);
                        
                        while ($row = $detallesEmpresa->fetch_object()):
                           ?>

                           <li class="list-group-item"><b>NIT:</b><h4> <?= $row->nit ?></h4></li>
                           <li class="list-group-item"><b>NOMBRE: </b><h4> <?= strtoupper($row->nombre) ?></h4></li>
                           <li class="list-group-item"><b>Direccion: </b> <h4><?= $row->direccion ?> </h4></li>
                           <li class="list-group-item"><b>Ciudad: </b> <h4><?= $row->ciudad ?></h4></li>
                           <li class="list-group-item"><b>Departamento: </b> <h4><?= $row->departamento ?> </h4></li>							
                           <li class="list-group-item"><b>Telefono:</b><h4> <?= $row->telefono ?></h4></li>
                           <li class="list-group-item"><b>Celular:</b><h4> <?= $row->celular ?></h4></li>
                           <li class="list-group-item"><b>Email:</b><h4> <?= $row->email ?></h4></li>
                           <li class="list-group-item"><b>Regimen:</b><h4> <?= $row->regimen ?></h4></li>
                           <li class="list-group-item"><b>Eslogan:</b><h4> <?= $row->eslogan ?></h4></li>							
                        <?php endwhile; ?>
                     </ul>
                  </div>
               </div>
            </div>
            <div class="col-md-6">
               <div class="box-body">

                  <div class="panel panel-default">
                     <div class="panel-heading">Informacion del Configuracion</div>
                     <ul class="list-group">	
                     
                        <?php
                        
                        $datosParametros = parametrosController::MostrarParrametro($id_sucursal);
                        
                        while ($row = $datosParametros->fetch_object()):
                           
                           ?>

                           <li class="list-group-item"><b>Numero de Inicio Facturacion:</b><h4> <?= $row->num_inicio_factura ?></h4></li>
                                                                            
                           <li class="list-group-item"><b>General Codigo Producto Automatico:</b><h4> <?php
                                 if ($row->generar_codigo == 1) {
                                    echo 'SI';
                                 } else {
                                    echo 'NO';
                                 }
                                 ?></h4></li>
                           <li class="list-group-item"><b>Codigo Producto:</b><h4> <?= $row->codigo_prod ?></h4></li>

<?php endwhile; ?>
                     </ul>
                  </div>
               </div>
            </div>
         </div>
      </div>

   </section>

</div>

<div id="modalRegistrarDatos" class="modal fade" role="dialog">

   <div class="modal-dialog">

      <div class="modal-content">

         <form role="form" action="<?= URL_BASE ?>parametros/guardar" method="POST" >

            <!--=====================================
            CABEZA DEL MODAL
            ======================================-->

            <div class="modal-header" style="background:#3c8dbc; color:white">

               <button type="button" class="close" data-dismiss="modal">&times;</button>

               <h4 class="modal-title">Agregar Datos Empresa</h4>

            </div>

            <!--=====================================
            CUERPO DEL MODAL
            ======================================-->

            <div class="modal-body">

               <div class="box-body">


                  <div class="form-group">
                     <label>Nombre:</label>

                     <div class="input-group">
                        <div class="input-group-addon">
                           <i class="fa fa-user"></i>
                        </div>
                        <input type="text" class="form-control" name="nombre" required>
                     </div>
                     <!-- /.input group -->
                  </div>            

                  <div class="form-group">
                     <label>Nit - CC:</label>
                     <div class="input-group">
                        <div class="input-group-addon">
                           <i class="fa fa-tag"></i>
                        </div>
                        <input type="text" class="form-control"name="nit" required>
                     </div>
                     <!-- /.input group -->
                  </div>             

                  <div class="form-group">
                     <label>Direccion:</label>

                     <div class="input-group">
                        <div class="input-group-addon">
                           <i class="fa fa-map-marker"></i>
                        </div>
                        <input type="text" class="form-control" name="direccion" required>
                     </div>
                     <!-- /.input group -->
                  </div>
                  <div class="form-group">
                     <label>Departamento:</label>

                     <div class="input-group">
                        <div class="input-group-addon">
                           <i class="fa fa-map-marker"></i>
                        </div>
                        <input type="text" class="form-control" name="departamento" required>
                     </div>
                     <!-- /.input group -->
                  </div>
                  <div class="form-group">
                     <label>Ciudad:</label>

                     <div class="input-group">
                        <div class="input-group-addon">
                           <i class="fa fa-map-marker"></i>
                        </div>
                        <input type="text" class="form-control" name="ciudad" required>
                     </div>
                     <!-- /.input group -->
                  </div>             
                  <div class="form-group">
                     <label>Telefono:</label>

                     <div class="input-group">
                        <div class="input-group-addon">
                           <i class="fa fa-phone"></i>
                        </div>
                        <input type="text" class="form-control" name="telefono" data-inputmask='"mask": "(999) 999-9999"' data-mask>
                     </div>
                     <!-- /.input group -->
                  </div>
                  <div class="form-group">
                     <label>Celular:</label>

                     <div class="input-group">
                        <div class="input-group-addon">
                           <i class="fa fa-phone"></i>
                        </div>
                        <input type="text" class="form-control" name="celular" data-inputmask='"mask": "(999) 999-9999"' data-mask>
                     </div>
                     <!-- /.input group -->
                  </div>

                  <div class="form-group">
                     <label>Email:</label>

                     <div class="input-group">
                        <div class="input-group-addon">
                           <i class="fa fa-envelope-o"></i>
                        </div>
                        <input type="text" class="form-control" name="email" >
                     </div>
                     <!-- /.input group -->
                  </div>   
                  <div class="form-group">
                     <label>Regimen:</label>

                     <div class="input-group">
                        <div class="input-group-addon">
                           <i class="fa fa-envelope-o"></i>
                        </div>
                        <input type="text" class="form-control" name="regimen" >
                     </div>
                     <!-- /.input group -->
                  </div> 
                  <div class="form-group">
                     <label>Eslogan:</label>

                     <div class="input-group">
                        <div class="input-group-addon">
                           <i class="fa fa-envelope-o"></i>
                        </div>
                        <input type="text" class="form-control" name="eslogan" >
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

               <button type="submit" class="btn btn-primary">Guardar</button>

            </div>

         </form>     

      </div>

   </div>

</div>



<div id="modalEditarDatos" class="modal fade" role="dialog">

   <div class="modal-dialog">

      <div class="modal-content">

         <form role="form" action="<?= URL_BASE ?>parametros/actulizar" method="POST" >
<?php
 $detallesEmpresaEditar = parametrosController::MostrarInformacion($id_sucursal);
                        
while ($row = $detallesEmpresaEditar->fetch_object()): ?>

               <input type="hidden" name="id" value="<?= $row->id ?>" />			
               <!--=====================================
               CABEZA DEL MODAL
               ======================================-->

               <div class="modal-header" style="background:#3c8dbc; color:white">

                  <button type="button" class="close" data-dismiss="modal">&times;</button>

                  <h4 class="modal-title">Agregar Datos Empresa</h4>

               </div>

               <!--=====================================
               CUERPO DEL MODAL
               ======================================-->

               <div class="modal-body">

                  <div class="box-body">


                     <div class="form-group">
                        <label>Nombre:</label>

                        <div class="input-group">
                           <div class="input-group-addon">
                              <i class="fa fa-user"></i>
                           </div>
                           <input type="text" class="form-control" name="nombre" value="<?= $row->nombre ?>" required>
                        </div>
                        <!-- /.input group -->
                     </div>            

                     <div class="form-group">
                        <label>Nit - CC:</label>
                        <div class="input-group">
                           <div class="input-group-addon">
                              <i class="fa fa-tag"></i>
                           </div>
                           <input type="text" class="form-control"name="nit" value="<?= $row->nit ?>" required>
                        </div>
                        <!-- /.input group -->
                     </div>             

                     <div class="form-group">
                        <label>Direccion:</label>

                        <div class="input-group">
                           <div class="input-group-addon">
                              <i class="fa fa-map-marker"></i>
                           </div>
                           <input type="text" class="form-control" name="direccion" value="<?= $row->direccion ?>" required>
                        </div>
                        <!-- /.input group -->
                     </div>
                     <div class="form-group">
                        <label>Departamento:</label>

                        <div class="input-group">
                           <div class="input-group-addon">
                              <i class="fa fa-map-marker"></i>
                           </div>
                           <input type="text" class="form-control" name="departamento" value="<?= $row->departamento ?>" required>
                        </div>
                        <!-- /.input group -->
                     </div>
                     <div class="form-group">
                        <label>Ciudad:</label>

                        <div class="input-group">
                           <div class="input-group-addon">
                              <i class="fa fa-map-marker"></i>
                           </div>
                           <input type="text" class="form-control" name="ciudad" value="<?= $row->ciudad ?>" required>
                        </div>
                        <!-- /.input group -->
                     </div>             
                     <div class="form-group">
                        <label>Telefono:</label>

                        <div class="input-group">
                           <div class="input-group-addon">
                              <i class="fa fa-phone"></i>
                           </div>
                           <input type="text" class="form-control" name="telefono" value="<?= $row->telefono ?>" data-inputmask='"mask": "(999) 999-9999"' data-mask>
                        </div>
                        <!-- /.input group -->
                     </div>
                     <div class="form-group">
                        <label>Celular:</label>

                        <div class="input-group">
                           <div class="input-group-addon">
                              <i class="fa fa-phone"></i>
                           </div>
                           <input type="text" class="form-control" name="celular" value="<?= $row->celular ?>" data-inputmask='"mask": "(999) 999-9999"' data-mask>
                        </div>
                        <!-- /.input group -->
                     </div>

                     <div class="form-group">
                        <label>Email:</label>

                        <div class="input-group">
                           <div class="input-group-addon">
                              <i class="fa fa-envelope-o"></i>
                           </div>
                           <input type="text" class="form-control" name="email" value="<?= $row->email ?>" >
                        </div>
                        <!-- /.input group -->
                     </div>   
                     <div class="form-group">
                        <label>Regimen:</label>

                        <div class="input-group">
                           <div class="input-group-addon">
                              <i class="fa fa-envelope-o"></i>
                           </div>
                           <input type="text" class="form-control" name="regimen" value="<?= $row->regimen ?>" >
                        </div>
                        <!-- /.input group -->
                     </div> 
                     <div class="form-group">
                        <label>Eslogan:</label>

                        <div class="input-group">
                           <div class="input-group-addon">
                              <i class="fa fa-envelope-o"></i>
                           </div>
                           <input type="text" class="form-control" name="eslogan" value="<?= $row->eslogan ?>" >
                        </div>
                        <!-- /.input group -->
                     </div> 

                  </div>

               </div>
<?php endwhile; ?>
            <!--=====================================
            PIE DEL MODAL
            ======================================-->

            <div class="modal-footer">

               <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Salir</button>

               <button type="submit" class="btn btn-primary">Editar</button>

            </div>

         </form>     

      </div>

   </div>

</div>

<div id="modalEditarParametros" class="modal fade" role="dialog">

   <div class="modal-dialog">

      <div class="modal-content">

         <form role="form" action="<?= URL_BASE ?>parametros/actulizarconfig" method="POST" >
<?php

$datosParametrosEditar = parametrosController::MostrarParrametro($id_sucursal);
while ($row = $datosParametrosEditar->fetch_object()): ?>

               <input type="hidden" name="id" value="<?= $row->id ?>" />			
               <!--=====================================
               CABEZA DEL MODAL
               ======================================-->

               <div class="modal-header" style="background:#3c8dbc; color:white">

                  <button type="button" class="close" data-dismiss="modal">&times;</button>

                  <h4 class="modal-title">Editar Configuracion</h4>

               </div>

               <!--=====================================
               CUERPO DEL MODAL
               ======================================-->

               <div class="modal-body">

                  <div class="box-body">


                     <div class="form-group">
                        <label>Numero Facturacion:</label>

                        <div class="input-group">
                           <div class="input-group-addon">
                              <i class="fa fa-user"></i>
                           </div>
                           <input type="number" class="form-control" name="num_inicio_factura" value="<?= $row->num_inicio_factura ?>" required>
                        </div>
                        <!-- /.input group -->
                     </div>                          
                     <div class="form-group">
                        <label>General Codigo Automatico:</label>

                        <div class="input-group">
                           <div class="input-group-addon">
                              <i class="fa fa-tag"></i>
                           </div>
                           <div class="checkbox">
                              <label>
                                 <input type="checkbox" <?php if ($row->generar_codigo == 1) {
      echo 'checked';
   } ?> name="generar_codigo">
                                 Si
                              </label>
                           </div>

                        </div>
                        <!-- /.input group -->
                     </div>   
                     <div class="form-group">
                        <label>Codigo Producto:</label>

                        <div class="input-group">
                           <div class="input-group-addon">
                              <i class="fa fa-tag"></i>
                           </div>
                           <input type="text" class="form-control" name="codigo_prod" value="<?= $row->codigo_prod ?>" >
                        </div>
                        <!-- /.input group -->
                     </div> 


                  </div>

               </div>
<?php endwhile; ?>
            <!--=====================================
            PIE DEL MODAL
            ======================================-->

            <div class="modal-footer">

               <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Salir</button>

               <button type="submit" class="btn btn-primary">Editar</button>

            </div>

         </form>     

      </div>

   </div>

</div>