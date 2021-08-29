<div class="container">
   <!-- Content Header (Page header) -->



   <!-- Main content -->
   <section class="invoice">
     
         <!-- title row -->
         <div class="row">
            <div class="col-xs-12">
               <div class="box-body">
                  <div class="box-header with-border cabeceraVenta">

                  
                     <button class="btn btn-danger ">
                        <i class="fa fa-close"></i> 
                        Borrar
                     </button>

                     <a href="<?= URL_BASE ?>validarinventario/nuevo">
                        <button class="btn btn-success" >

                           Cancelar

                        </button>
                     </a>
                     <button class="btn btn-primary" data-toggle="modal" data-target="#modalAgregarProductos">

                  Agregar productos

               </button>

                  </div>
               </div>

            </div>
            <!-- /.col -->
         </div>
         <!-- info row -->
 <form role="form" method="post" action="<?= URL_BASE ?>validarinventario/save" class="formularioVenta">
     <input type="hidden" class="idsucursal" name="idsucursal" id="idsucursal" value="<?=$id_sucursal?>">
         <div class="row invoice-info">
            <div class="cabeceraVenta">		
               <div class="form-group col-lg-8 col-md-8 col-sm-8 col-xs-12">
                  <label>Nombre:</label>
                  <input type="hidden" class="Idproducto" name="Idproducto" id="Idproducto" value="">
                  <input type="text" class="form-control" name="nombre" id="nombre" value=""disabled>
               </div>
               <div class="form-group col-lg-4 col-md-4 col-sm-4 col-xs-12">
                  <label>Costo:</label>
                  <input type="text" class="form-control" name="costo" id="costo" value=""disabled>
               </div>
               <div class="form-group col-lg-3 col-md-3 col-sm-3 col-xs-12">
                  <label>Precio</label>
                  <input type="text" class="form-control" name="nit" id="precio"disabled>
               </div>
               <div class="form-group col-lg-4 col-md-4 col-sm-6 col-xs-12">
                  <label>Cantidad Actual:</label>
                  <input type="text" class="form-control"  id="cantidad" disabled>
               </div>
               <div class="form-group col-lg-3 col-md-3 col-sm-6 col-xs-12">
                  <label>Contado:</label>
                  <input type="text" class="form-control" id="ciudad" name="contado" >
               </div>
               <div class="form-group col-lg-2 col-md-2 col-sm-6 col-xs-12">
                  <label></label>
                  
               </div>
            </div>

            <div class="col-sm-12 invoice-col">	

               <div class="form-group col-lg-2 col-md-2 col-sm-6 col-xs-12">


               </div>                          

            </div>

         </div>
         <!-- /.row -->
         

         
         <!-- this row will not appear when printing -->
         <div class="row no-print">
            <div class="col-xs-12">								
               </button>
               <button type="submit" class="btn btn-primary pull-right" style="margin-right: 5px;">
                  <i class="fa fa-download"></i> Guardar
               </button>
            </div>
         </div>
      </form>

   </section>
   <div class="clearfix"></div>
</div>

<div id="modalAgregarProductos" class="modal fade modalProduto" role="dialog">

   <div class="modal-dialog">

      <div class="modal-content">

         <!--=====================================
         CABEZA DEL MODAL
         ======================================-->

         <div class="modal-header" style="background:#3c8dbc; color:white">

            <button type="button" class="close" data-dismiss="modal">&times;</button>

            <h4 class="modal-title">Agregar Prouctos</h4>

         </div>

         <!--=====================================
         CUERPO DEL MODAL
         ======================================-->

         <div class="modal-body">

            <div class="box-body">

               <!--=====================================
               ENTRADA DEL TITULO DE LA CATEGORÍA
               ======================================-->



               <div class="col-xs-12 table-responsive modalProduto">
                  <table class="table table-bordered table-striped dt-responsive  tablaproductovalidar">
                     <thead>
                        <tr>
                           <th>#</th>
                           <th>codigo</th>
                           <th>nombre</th>
                           <th>Precio</th>										
                           <th>Stop</th>         
                           <th>accion</th>   
                        </tr>
                     </thead>            
                  </table>
               </div>



            </div>

         </div>

         <!--=====================================
         PIE DEL MODAL
         ======================================-->

         <div class="modal-footer">

            <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Salir</button>



         </div>




      </div>

   </div>

</div>