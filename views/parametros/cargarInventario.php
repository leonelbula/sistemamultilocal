<div class="container">


   <section class="content">

      <div class="box">

         <div class="box-header with-border">
            <a href="<?= URL_BASE ?>frontend/principal">
               <button class="btn btn-primary">

                  Inicio

               </button>
            </a>
            <a href="<?= URL_BASE ?>parametros/">
               <button class="btn btn-primary">

                  Cancelar

               </button>
            </a>




            <div class="row">
               <div class="col-md-6">
                  <div class="box-body">

                     <div class="panel panel-default">
                        <div class="panel-heading">Cargar Inventario</div>

                     </div>
                  </div>
               </div>
               <div class="col-md-6">
                  <div class="box-body">

                     <div class="panel panel-default">
                        <div class="panel-heading">Detalles</div>
                        <form method="post" action="<?=URL_BASE?>parametros/cargarInventario"
                           enctype="multipart/form-data">
                           <input type="text" class="form-control input-lg" value="archivo"
                              placeholder="Ingresar Categoria" name="archivo" required>
                        </form>

                     </div>
                  </div>
               </div>
            </div>
         </div>

   </section>

</div>