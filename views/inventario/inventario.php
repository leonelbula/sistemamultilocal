<div class="container">
   <!-- Content Header (Page header) -->
   <!-- Main content -->
   <section class="content">

      <!-- Default box -->
      <div class="box">
         <div class="box-header with-border">
            <h3 class="box-title">lista de Productos</h3>

         </div>
         <div class="box-body">

            <div class="box-header with-border">
               
               <?php if($_SESSION["identity"]->tipo == "maestro"):?>
            <a href="<?= URL_BASE ?>administracion/">
                  <button class="btn btn-primary">

                     Inicio

                  </button>
            </a>
               <a href="<?= URL_BASE ?>inventario/registrar&id=<?=$id_sucursal?>">
                  <button class="btn btn-primary" data-toggle="modal" data-target="#modalAgregarCategoria">

                     Nuevo Producto

                  </button>
               </a>
               <?php else:?>
               
               <a href="<?= URL_BASE ?>frontend/principal">
                  <button class="btn btn-primary">

                     Inicio

                  </button>
               </a>
               <a href="<?= URL_BASE ?>inventario/registrar">
                  <button class="btn btn-primary" data-toggle="modal" data-target="#modalAgregarCategoria">

                     Nuevo Producto

                  </button>
               </a>
               <?php endif; ?>
               
               
               <a href="<?= URL_BASE ?>categoria/">
                  <button class="btn btn-primary" data-toggle="modal" data-target="#modalAgregarCategoria">

                     Categorias

                  </button>
               </a>
            </div>
         </div>
         <div class="box-body">
            <table class=" table table-bordered table-striped dt-responsive tablaproductos" style="width:100%">
               <thead>
                  <tr>
                     <th>#</th>
                     <th>Codigo</th>
                     <th>Nombre</th>
                     <th>Categoria</th>
                     <th>Precio Venta</th> 
                     <th>Stock</th> 
                     <th>acciones</th>
                  </tr>
               </thead>		
            </table>
         </div>
         <!-- /.box-body -->
         <div class="box-footer">
            productos
         </div>
         <!-- /.box-footer-->
      </div>
      <!-- /.box -->

   </section>
   <!-- /.content -->
</div>
