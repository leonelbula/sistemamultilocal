<div class="container">

   <section class="content-header">

      <h1>
         Detalles Productos
      </h1>

      <ol class="breadcrumb">

         <li><a href="<?= URL_BASE ?>frontend/principal"><i class="fa fa-dashboard"></i> Inicio</a></li>

         <li class="active">Detalles Productos</li>

      </ol>

   </section>

   <section class="content">

      <div class="box">

         <div class="box-header with-border">
            <a href="<?= URL_BASE ?>inventario/">
               <button class="btn btn-primary" >

                  volver

               </button>
            </a>
         </div>


         <div class="box-body">

            <div class="panel panel-default">
               <div class="panel-heading">Informacion del Producto</div>
               <ul class="list-group">			  
                  <?php
                  while ($row = $detallesPro->fetch_object()):

                     $id = $row->id_categoria;
                     $categoriade = categoriaController::MostarCategoria($id);

                     while ($row1 = $categoriade->fetch_object()) {
                        $categoria = $row1->nombre;
                     }
                     ?>
                     <li class="list-group-item"><b>CODIGO:</b> <?= $row->codigo ?></li>
                     <li class="list-group-item"><b>COSTO:</b> <h4><?= $row->costo ?></h4></li>
                     <li class="list-group-item"><b>NOMBRE:</b> <h4><?= strtoupper($row->nombre) ?></h4></li>
                     <li class="list-group-item"><b>PRECIO VENTA:</b> <h4><?= $row->precioventa ?> --- <b>Utilidad :</b> <?= strtoupper($row->utilidad) ?> %</h4></li>                    
                     <li class="list-group-item"><b>CATEGORIA :</b> <?= strtoupper($categoria) ?></li>                                        
                     <li class="list-group-item"><b>CANTIDAD ACTUAL:</b><h4> <?= $row->can_inicial ?></h4></li>
                     <li class="list-group-item"><b>STOP MINIMO:</b><h4> <?= $row->cantidad_min ?></h4></li>
                     <li class="list-group-item"><b>CODIGO VENDEDOR:</b><h4> <?= $row->codigo_fabr ?></h4></li>                    
                     <li class="list-group-item"><b>AGREGAR COMPONENTES :</b><a href="<?=URL_BASE?>inventario/agregarcomponente&id=<?= $row->id ?>"><button class="btn btn-primary">Agregar</button></a> </li>
<?php endwhile; ?>
               </ul>
            </div>



         </div>
      </div>

</div>

</section>

</div>
