<div class="container">
    

  <section class="content">

    <div class="box">

      <div class="box-header with-border">
		  <a href="<?=URL_BASE?>proveedor/">
          <button class="btn btn-primary">

           Cancelar

          </button>
		  </a>
      </div>
		

      <div class="box-body">
         
      
      <div class="row">
		  <form action="<?=URL_BASE?>proveedor/guardar" method="POST" >
		       <input type="hidden" class="idsucursal" name="idsucursal" id="idsucursal" value="<?=$id_sucursal?>">
        <div class="col-md-6">

          <div class="box box-danger">
            <div class="box-header">
              <h3 class="box-title">Informacion de Proveedor</h3>
            </div>
            <div class="box-body">
				
              <!-- Date dd/mm/yyyy -->
              <div class="form-group">
                <label>Nombre:</label>

                <div class="input-group">
                  <div class="input-group-addon">
                    <i class="fa fa-user"></i>
                  </div>
					<input type="text" class="form-control" name="nombre" required>
                </div>
                <!-- /.input group -->
              </div>
              <!-- /.form group -->

              <!-- Date mm/dd/yyyy -->
              <div class="form-group">
				  <label>Nit - CC:</label>
                <div class="input-group">
                  <div class="input-group-addon">
                    <i class="fa fa-tag"></i>
                  </div>
					<input type="text" class="form-control"name="nit" required>
                </div>
                <!-- /.input group -->
              </div>
              <!-- /.form group -->

              <!-- phone mask -->
              <div class="form-group">
                <label>Direccion:</label>

                <div class="input-group">
                  <div class="input-group-addon">
                    <i class="fa fa-bookmark-o"></i>
                  </div>
					<input type="text" class="form-control" name="direccion" required>
                </div>
                <!-- /.input group -->
              </div>
			  <div class="form-group">
                <label>Departamento:</label>

                <div class="input-group">
                  <div class="input-group-addon">
                    <i class="fa fa-bookmark-o"></i>
                  </div>
					<input type="text" class="form-control" name="departamento" required>
                </div>
                <!-- /.input group -->
              </div>
			  <div class="form-group">
                <label>Ciudad:</label>

                <div class="input-group">
                  <div class="input-group-addon">
                    <i class="fa fa-bookmark-o"></i>
                  </div>
					<input type="text" class="form-control" name="ciudad" required>
                </div>
                <!-- /.input group -->
              </div>
              <!-- /.form group -->

              <!-- phone mask -->
              <div class="form-group">
                <label>Telefono:</label>

                <div class="input-group">
                  <div class="input-group-addon">
                    <i class="fa fa-phone"></i>
                  </div>
					<input type="text" class="form-control" name="telefono" data-inputmask='"mask": "(999) 999-9999"' data-mask>
                </div>
                <!-- /.input group -->
              </div>
              <!-- /.form group -->

              <!-- IP mask -->
              <div class="form-group">
                <label>Email:</label>

                <div class="input-group">
                  <div class="input-group-addon">
                    <i class="fa fa-envelope-o"></i>
                  </div>
					<input type="text" class="form-control" name="email" >
                </div>
                <!-- /.input group -->
              </div>
              <!-- /.form group -->
			   <div class="form-group">
                <label>Vendedor:</label>
                <div class="input-group">
                  <div class="input-group-addon">
                    <i class="fa fa-phone"></i>
                  </div>
					<input type="text" class="form-control" name="vendedor" >
                </div>
                <!-- /.input group -->
              </div>
			   <div class="form-group">
                <label>Telefono vendedor:</label>
                <div class="input-group">
                  <div class="input-group-addon">
                    <i class="fa fa-phone"></i>
                  </div>			
					 <input type="text" class="form-control"  name="tel_vendedor" data-inputmask='"mask": "(999) 999-9999"' data-mask>
                </div>
                <!-- /.input group -->
              </div>

            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->

          <button class="btn btn-primary" type="submit">

            Guardar proveedor

          </button>
          <!-- /.box -->

        </div>
        
		  </form>
      </div>
      <!-- /.row -->

      </div>
        
    </div>

  </section>

</div>