<div class="content-wrapper">
    
  <section class="content-header">
      
    <h1>
      Detalles Proveedor
    </h1>
 
    <ol class="breadcrumb">

      <li><a href="<?=URL_BASE?>frontend/principal"><i class="fa fa-dashboard"></i> Inicio</a></li>

      <li class="active">Detalles Proveedor</li>
      
    </ol>

  </section>

  <section class="content">

    <div class="box">

      <div class="box-header with-border">
		  <a href="<?=URL_BASE?>proveedor/">
          <button class="btn btn-primary" data-toggle="modal" data-target="#modalAgregarCategoria">

          volver

          </button>
		  </a>
      </div>
		

      <div class="box-body">
         
		  <div class="panel panel-default">
			  <div class="panel-heading">Informacion de Proveedor</div>
				<ul class="list-group">			  
				<?php while ($row = $detallesProveedor ->fetch_object()):

				 ?>
			  
					<li class="list-group-item"><b>Nombre:</b> <?= strtoupper($row->nombre)?></li>
					<li class="list-group-item"><b>Nit:</b> <?=$row->nit?></li>
				  <li class="list-group-item"><b>Direccion:</b> <?= strtoupper($row->direccion)?></li>
				  <li class="list-group-item"><b>Departamento:</b> <?= strtoupper($row->departamento)?></li>
				  <li class="list-group-item"><b>Ciudad:</b></b> <?= strtoupper($row->ciudad)?></li>
				  <li class="list-group-item"><b>Email:</b> <?= $row->email?></li>
				  <li class="list-group-item"><b>Telefono:</b> <?= $row->telefono?></li>
				  <li class="list-group-item"><b>Vendedor:</b>  <?= strtoupper($row->vendedor)?></li>
				  <li class="list-group-item"><b>Tel. Vendedor</b>  <?= $row->tel_vendedor?></li>
				  <?php endwhile; ?>
			  </ul>
		  </div>

   

      </div>
	</div>
        
    </div>

  </section>

</div>
