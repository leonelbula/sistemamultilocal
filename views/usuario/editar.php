<!-- Content Wrapper. Contains page content -->
<div class="container">
   <!-- Content Header (Page header) -->
   <section class="content-header">
      <h1>
         Editar Usuario

      </h1>
      <ol class="breadcrumb">
         <li><a href="<?= URL_BASE ?>frontend/principal"><i class="fa fa-dashboard"></i> Pincipal</a></li>
         <li><a>Usuario</a></li>

      </ol>
   </section>

   <!-- Main content -->
   <section class="content">

      <!-- Default box -->
      <div class="box">

         <div class="box-header with-border">
            <?php if ($_SESSION["identity"]->tipo == "maestro"): ?>
               <a href="<?= URL_BASE ?>administracion/usuariosucursal">
                  <button class="btn btn-primary">

                     Inicio

                  </button>
               </a>

            <?php else: ?>
               <a href="<?= URL_BASE ?>frontend/principal">
                  <button class="btn btn-primary">

                     Inicio

                  </button>
               </a>
               <a href="<?= URL_BASE ?>usuario/">
                  <button class="btn btn-primary">

                     Cancelar

                  </button>
               </a>
            <?php endif; ?>

         </div>
         <div class="box-body">

            <form method="post" action="<?= URL_BASE ?>usuario/actulizar" enctype="multipart/form-data">

               <!--=====================================
               CABEZA DEL MODAL
               ======================================-->

               <div class="modal-header" style="background:#3c8dbc; color:white">

                  <button type="button" class="close" data-dismiss="modal">&times;</button>

                  <h4 class="modal-title">Editar Usuario</h4>

               </div>



               <div class="modal-body">

                  <div class="box-body">

                     <?php
                     while ($row = $detallesUsuario->fetch_object()) :
                        ?>

                        <div class="form-group">

                           <div class="input-group">

                              <span class="input-group-addon"><i class="fa fa-user"></i></span>
                              <input type="hidden" name="id" value="<?= $row->id_usuario ?>" />
                              <input type="text" class="form-control" name="nombre" id="nombre" value="<?= $row->nombre ?>" placeholder="Ingrese nombre de usuario" required> 

                           </div> 

                        </div> 
                        <div class="form-group">

                           <div class="input-group">

                              <span class="input-group-addon"><i class="fa fa-th"></i></span>
                              <input type="hidden" name="passswordAntigua" value="<?= $row->password ?>" />
                              <input type="password" name="password" placeholder="Password" placeholder="Ingrese Contraseña" class="form-control" required />

                           </div> 

                        </div>     
                        <div class="form-group">

                           <div class="input-group">

                              <span class="input-group-addon"><i class="fa fa-th"></i></span>

                              <select class="form-control"  name="tipo" required>
                                 <option value="">Selecione una opcion</option>
                                 <option value="usuario" <?= $row->tipo == 'usuario' ? 'selected' : ''; ?>>Usuario</option>
                                 <option value="admin" <?= $row->tipo = 'admin' ? 'selected' : ''; ?> >Administrador</option>									

                              </select>

                           </div> 

                        </div>  
                        <div class="form-group">

                           <div class="input-group">

                              <span class="input-group-addon"><i class="fa fa-th"></i></span>

                              <select class="form-control" name="estado" required>
                                 <option value="">Seleccione una opcion</option>
                                 <option value="1" <?= $row->estado == 1 ? 'selected' : ''; ?> >Activado</option>
                                 <option value="0" <?= $row->estado == 0 ? 'selected' : ''; ?>>Desactivado</option>									

                              </select>

                           </div> 

                        </div>     

                     </div>

                  </div>

<?php endwhile; ?>

               <div class="modal-footer">          


                  <button type="submit" class="btn btn-primary">Editar</button>

               </div>

            </form>


         </div>
         <!-- /.box-body -->
         <div class="box-footer">
            Editar Usuario
         </div>
         <!-- /.box-footer-->
      </div>
      <!-- /.box -->

   </section>
   <!-- /.content -->
</div>
<!-- /.content-wrapper -->
