<div class="container">
    

  <section class="content">

    <div class="box">

      <div class="box-header with-border">
          <a href="<?= URL_BASE ?>frontend/principal">
               <button class="btn btn-primary">

                  Inicio

               </button>
            </a>
		  <a href="<?=URL_BASE?>proveedor/registrar">
          <button class="btn btn-primary" data-toggle="modal" data-target="#modalAgregarCategoria">

            Nuevo proveedor

          </button>
		  </a>
      </div>
		

      <div class="box-body">
         
        <table class="table table-bordered table-striped dt-responsive tablaproveedorL" width="100%">

          <thead>
            
            <tr>
              
              <th style="width:10px">Codigo</th>
              <th>Razon Social</th>
			  <th>Nit</th> 
			  <th>Direccion</th>
			  <th>Ciudad</th>
			  <th>Departamento</th> 
			  <th>Telefono</th>
			  <th>Correo</th>
			  <th>Vendedor</th>
			  <th>Tel-Vendedor</th>
               <th>Acciones</th>

            </tr>

          </thead>
		 

        </table> 

      </div>
		
        
    
  </section>

</div>
