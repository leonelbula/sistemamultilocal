<div class="content-wrapper">        
   <!-- Main content -->
   <section class="content">
      <div class="row">
         <div class="col-md-12">
            <div class="box">

               <div class="panel-body" style="height: 400px;" id="formularioregistros">
                  <form name="formulario" class="formularioComponentes" id="formulario" method="POST" action="guardarcomponente">
                     <div class="form-group col-lg-8 col-md-8 col-sm-8 col-xs-12">

                        <?php
                        while ($row = $detalles->fetch_object()) {
                           $id = $row->id;
                           $nombre = $row->nombre;
                        }
                        ?>
                        <input type="hidden" name="id" value=""/>
                        <div class="form-group">
                           <label for="nombre">Nombre:</label>
                           <input type="hidden" name="id" value="<?= $id ?>"/>
                           <input type="text" class="form-control" name="nombre" id="nombre" value="<?= $nombre ?>" readonly />

                        </div>
                        <div class="form-group col-lg-3 col-md-3 col-sm-6 col-xs-12">
                           <a data-toggle="modal" href="#myModal">           
                              <button id="btnAgregarArt" type="button" class="btn btn-primary"> <span class="fa fa-plus"></span> Agregar Artículos</button>
                           </a>
                        </div>
                     </div>							

                     <div class="col-lg-12 col-sm-12 col-md-12 col-xs-12">
                        <table id="detalles" class="table table-striped table-bordered table-condensed table-hover">
                           <thead style="background-color:#A9D0F5">
                           <th>Codigo</th>
                           <th>Descripcion</th>
                           <th>Cantidad</th>                                   
                           <th>Accion</th>
                           </thead>
                           <tbody class="nuevoComponente">
                              <?php
                              
                              if ($DetallesComponente->num_rows != 0) {
                                 while ($row1 = $DetallesComponente->fetch_object()) {
                                    $detalles = $row1->detalles;                                    
                                 }
                                 $listaProducto = json_decode($detalles, TRUE);
                                 foreach ($listaProducto as $key => $value) {

                                    echo '<tr>
                                             <td class="valorivap">' . $value['codigo'] . '<input  class="valoriva" type="hidden" name="valoriva"  /></td>
                                             <td class="costop">' . $value['descripcion'] . '<input  class="costo" type="hidden" name="costo"  "/></td>						
                                             <td class="ingresoCantidad"><input type="number" class="CantidadProd" name="CantidadProd"    value="' . $value['cantidad'] . '" /></td>	
                                             <td><button class="btn btn-danger quitarProducto" idProducto="' . $value['id'] . '"><i class="fa fa-times"></i></button></td>
                                             <input  class="nombreProduc" type="hidden" name="nombreProduc" value="' . $value['descripcion'] . '"/>
                                             <input  class="idProductoVenta" type="hidden" name="idProductoVenta" value="' . $value['id'] . '"/>
                                             <input  class="codigo" type="hidden" name="codigo" value="' . $value['codigo'] . '"/>
                             </           tr>';
                                 }
                              }
                              ?>
                           </tbody>              
                           <input type="hidden" id="listaComponente" name="listaComponente">

                           <tbody>

                           </tbody>
                        </table>
                     </div>

                     <div class="form-group col-lg-12 col-md-12 col-sm-12 col-xs-12">
                        <button class="btn btn-primary" type="submit" id="btnGuardar"><i class="fa fa-save"></i> Guardar</button>
                        <a href="<?= URL_BASE ?>servicios/">
                           <button id="btnCancelar" class="btn btn-danger" type="button"><i class="fa fa-arrow-circle-left"></i> Cancelar</button>
                        </a>
                     </div>
                  </form>
               </div>
               <!--Fin centro -->
            </div><!-- /.box -->
         </div><!-- /.col -->
      </div><!-- /.row -->
   </section><!-- /.content -->

</div><!-- /.content-wrapper -->
<!--Fin-Contenido-->
<div class="modal" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" >
   <div class="modal-dialog" >
      <div class="modal-content">
         <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
            <h4 class="modal-title">Seleccione un Artículo</h4>
         </div>
         <div class="modal-body">
            <table  class="table table-bordered table-striped dt-responsive tablaComponentes">
               <thead>
               <th>#</th>
               <th>Codigo</th>
               <th>Nombre</th>	
               <th>Accion</th>		
               </thead>
               <tbody>

               </tbody>

            </table>
         </div>
         <div class="modal-footer">
            <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
         </div>        
      </div>
   </div>
</div>  