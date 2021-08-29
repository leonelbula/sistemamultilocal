<div class="container">

   <section class="content">

      <div class="box">

         <div class="box-header with-border">
             <?php if ($_SESSION["identity"]->tipo == "maestro"): ?>
               <a href="<?= URL_BASE ?>administracion/detallesproductos">
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
         
         <div class="col-md-8">
            <p>Editar Producto</p>
         </div>


         <div class="box-body">
            <div class="col-md-8">
               <?php
               while ($row2 = $detallesProductos->fetch_object()):
                  ?>
                  <form class="formularioProducto" action="<?= URL_BASE ?>inventario/actualizarproducto" enctype="multipart/form-data" method="POST">

                     <?php
                      if($_SESSION["identity"]->tipo == "maestro"):
                         
                     ?>

                     <input type="hidden" name="admin" id="admin" value="<?= $row2->id_sucursal ?>">

                     <?php endif; ?>

                     <input type="hidden" class="idsucursal" name="idsucursal" id="idsucursal" value="<?= $id_sucursal ?>">
                     <input type="hidden" name="id_producto" value="<?= $row2->id ?>"/>

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
                              <input type="text" class="form-control" name="codigo" value="<?= $row2->codigo ?>" id="codigo" <?= ($estado == 1) ? 'disabled' : '' ?>>
                              <input type="hidden" name="codigo" value="<?= $row2->codigo ?>"/>
                           </div>	
                        </div>
                        <div class="col-xs-6">
                           <div class="form-group">
                              <label for="costo">Costo:</label>
                              <input type="number" class="form-control costo" name="costo" id="costo" required value="<?= $row2->costo ?>">
                           </div>
                        </div>
                     </div>
                     <div class="form-group">
                        <label for="nombre">Nombre:</label>
                        <input type="text" class="form-control" name="nombre" value="<?= $row2->nombre ?>" id="nombre" required>
                     </div>

                     <div class="row">
                        <div class="col-xs-6">
                           <div class="form-group">
                              <label for="Precio 1">Precio:</label>
                              <input type="number" class="form-control Precioventa" value="<?= $row2->precioventa ?>" name="Precioventa" value="" id="Precioventa">
                           </div>
                        </div>
                        <div class="col-xs-6">
                           <div class="form-group">
                              <label for="Utilidad 1">% de Utilidad:</label>
                              <input type="number" class="form-control Utilidad " name="Utilidad" value="<?= $row2->utilidad ?>" id="Utilidad" required>
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
   <?php while ($row = $categoria->fetch_object()) : ?>
                                    <option value="<?= $row->id ?>"<?= $row->id == $row2->id_categoria ? 'selected' : '' ?>><?= $row->nombre ?></option>

   <?php endwhile; ?>						


                              </select>
                           </div>
                        </div>
                        <div class="col-xs-6">
                           <div class="form-group">
                              <label for="contidadMin">Stop Minimo:</label>
                              <input type="number" class="form-control" value="<?= $row2->can_inicial ?>" name="cantidamin" id="fiesta" required>
                           </div>
                        </div>
                     </div>						
                     <div class="row">
                        <div class="col-xs-6">
                           <div class="form-group">
                              <label for="fiestapatronal">Cantidad:</label>
                              <input type="number" class="form-control" name="cantidainicial" value="<?= $row2->can_inicial ?>" id="fiesta" >
                           </div>
                        </div>
                        <div class="col-xs-6">

                        </div>

                     </div>

                     <div class="row">
                        <div class="col-xs-6">
                           <div class="form-group">
                              <label for="Precio1_Iva"></label>
                              <input type="number" class="form-control" name="" id="" disabled>
                           </div>
                        </div>
                        <div class="col-xs-6">
                           <div class="form-group">
                              <label for="foto">Foto:</label>
                              <input type="hidden" class="form-control" value="<?= $row2->imagen ?>" name="actualfoto" id="foto">
                              <input type="file" class="form-control nuevaImagen" name="foto" id="foto">
                           </div>		
                        </div>

                     </div>


                     <div class="row">
                        <div class="col-xs-6">
                           <div class="form-group">
                              <label for="codigo_vendedor">Codigo del Vendeedor:</label>
                              <input type="number" class="form-control" name="codigo_vendedor" value="<?= $row2->codigo_fabr ?>" id="codigo_vendedor" >
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
                                    <option value="<?= $rowP->id ?>" <?= $row2->id_vendor == $rowP->id ? 'selected' : '' ?>><?= $rowP->nombre ?></option>
                                 <?php endwhile; ?>                


                              </select>
                           </div>
                        </div>

                     </div>

                     <div class="row">

                        <div class="col-xs-6">
                           <img src="<?= URL_BASE ?>imagen/producto/<?= $row2->imagen ?>" class="img-thumbnail previsualizar" width="200px" />
                        </div>

                     </div>
                     <button type="submit" class="btn btn-primary">Actualizar</button>
                  </form>
<?php endwhile; ?>
            </div>
         </div>
      </div>
   </section>
</div>