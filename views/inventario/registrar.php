   <section class="container">

      <div class="box">

         <div class="box-header with-border">
             <?php if ($_SESSION["identity"]->tipo == "maestro"): ?>
               <a href="<?= URL_BASE ?>administracion/productosucursal&id=<?=$_GET['id']?>">
                  <button class="btn btn-primary">

                     Inicio

                  </button>
               </a>
               
            <?php else: ?>
            <a href="<?= URL_BASE ?>inventario/">
               <button class="btn btn-primary">

                  Cancelar

               </button>
            </a>
            <?php endif; ?>
         </div>


         <div class="box-body">
            <div class="col-md-8">
               <p>Registrar Producto</p>
            </div>
            
            <div class="col-md-8">
               <form class="formularioProducto" action="<?= URL_BASE ?>inventario/guardarproducto" enctype="multipart/form-data" method="POST">
                  <?php
                  if(isset($_GET['id'])):
                    
                  ?>
                  
                   <input type="hidden" name="admin" id="admin" value="<?= $_GET['id']; ?>">
                 
                  <?php endif;?>
                   <input type="hidden" name="idSucursal" id="idSucursal" value="<?= $_SESSION['identity']->id_sucursal ?>">
                  <div class="row">
                     <div class="col-xs-6">
                        <div class="form-group">
                           <label for="codigo">Codigo:</label>
                           <?php
                           $detallesParrametros = inventarioController::ListaParrametros($id_sucursal);
                           
                           while ($row1 = $detallesParrametros->fetch_object()) {
                              $estado = $row1->generar_codigo;
                              
                           }
                           ?>
                           <input type="text" class="form-control" name="codigo" id="codigo" <?= ($estado == 1) ? 'disabled' : '' ?>>
                        </div>	
                     </div>
                     <div class="col-xs-6">
                        <div class="form-group">
                           <label for="costo">Costo:</label>
                           <input type="number" class="form-control costo" name="costo" id="costo" required>
                        </div>
                     </div>
                  </div>
                  <div class="form-group">
                     <label for="nombre">Nombre:</label>
                     <input type="text" class="form-control" name="nombre" id="nombre" required>
                  </div>

                  <div class="row">
                     <div class="col-xs-6">
                        <div class="form-group">
                           <label for="Precio 1">Precio venta:</label>
                           <input type="number" class="form-control Precioventa" name="Precioventa" value="" id="Precioventa">
                        </div>
                     </div>
                     <div class="col-xs-6">
                        <div class="form-group">
                           <label for="Utilidad 1">% de Utilidad:</label>
                           <input type="number" class="form-control Utilidad"  name="Utilidad" id="Utilidad" required>
                        </div>
                     </div>
                  </div>

                  <div class="row">
                     <div class="col-xs-6">
                        <div class="form-group">
                           <label for="Categoria">Categoria :</label>

                           <?php $categoria = categoriaController::ListaMostrarCategoria($id_sucursal) ?>
                           <select class="form-control seleccionarCategoria"  name="idcategoria" required>
                              <option value="">Selecione una Categoria</option>
                              <?php
                              while ($row = $categoria->fetch_object()) {
                                 echo '<option value="' . $row->id . '">' . $row->nombre . '</option>';
                              }
                              ?>						


                           </select>
                        </div>
                     </div>
                     <div class="col-xs-6">
                        <div class="form-group">
                           <label for="contidadMin">Stop Minimo:</label>
                           <input type="number" class="form-control" name="cantidamin" id="cantidamin" required>
                        </div>
                     </div>
                  </div>

                  <div class="row">
                     <div class="col-xs-6">
                        <div class="form-group">
                           <label for="fiestapatronal">Cantidad:</label>
                           <input type="number" class="form-control" name="cantidainicial" id="cantidainicial" value="0">
                        </div>
                     </div>
                     <div class="col-xs-6">
                        <div class="form-group">                          
                        </div>
                     </div>

                  </div>

                  <div class="row">
                     <div class="col-xs-6">
                        <div class="form-group">
                           <label for="Precio1_Iva"></label>
                           <input type="number" class="form-control" name="" id="Precio1_Iva" disabled>
                        </div>
                     </div>
                     <div class="col-xs-6">
                        <div class="form-group">
                           <label for="foto">Foto:</label>
                           <input type="file" class="form-control" name="foto" id="foto">
                        </div>		
                     </div>

                  </div>


                  <div class="row">
                     <div class="col-xs-6">
                        <div class="form-group">
                           <label for="codigo_vendedor">Codigo del Vendeedor:</label>
                           <input type="text" class="form-control" name="codigo_vendedor" id="limites">
                        </div>
                     </div>
                     <div class="col-xs-6">
                        <div class="form-group">
                           <label for="fechaexpiracion">Vendedor:</label>
                           <select class="form-control select2" name="id_vendedor" style="width: 100%;">
                              <option  value="0" selected="selected">Seleciones Proveedor</option>
                              <option  value="0">No Registrar proveedor</option>
                              <?php
                              $proveedor = proveedorController::listaProveedor();
                              while ($rowP = $proveedor->fetch_object()):
                                 ?>
                                 <option value="<?= $rowP->id ?>"><?= $rowP->nombre ?></option>
                              <?php endwhile; ?>                


                           </select>
                        </div>
                     </div>

                  </div>					

                  <button type="submit" class="btn btn-primary">Guardar</button>
               </form>
            </div>
         </div>
      </div>
   </section>
</div>


