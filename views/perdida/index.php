<div class="container">
   <!-- Content Header (Page header) -->
   
   <!-- Main content -->
   <section class="content">

      <!-- Default box -->
      <div class="box">
         <div class="box-header with-border">
            <h3 class="box-title">lista de pedidas/daños</h3>

         </div>
         <div class="box-body">
            <div class="box-header with-border">
               <a href="<?= URL_BASE ?>frontend/principal">
                  <button class="btn btn-primary">

                     Inicio

                  </button>
               </a>
               <a href="<?= URL_BASE ?>perdida/create">
                  <button class="btn btn-primary">

                     Nuevo

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
            <table id="tablaperdidas" class=" table table-bordered table-striped dt-responsive tablaperdidas" style="width:100%">
               <thead>
                  <tr>
                     <th>#</th>                                    
                     <th>fecha</th>                     
                     <th>valor</th>
                     <th>Detalle</th>                     
                     <th>acciones</th>							
                  </tr>
               </thead>
               <tbody>
                  
               </tbody>
            </table>
         </div>
         <!-- /.box-body -->
         
         <!-- /.box-footer-->
      </div>
      <!-- /.box -->

   </section>
   <!-- /.content -->


   
</div>

