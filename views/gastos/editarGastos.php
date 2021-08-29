<div class="container">
    

  <section class="content">

    <div class="box">

      <div class="box-header with-border">
		  <a href="<?=URL_BASE?>gastos/">
          <button class="btn btn-primary">

           Cancelar

          </button>
		  </a>
      </div>
		

      <div class="box-body">
         
      
      <div class="row">
		  <form action="<?=URL_BASE?>gastos/actulizargasto" method="POST" >
			<?php while ($row = $detallesGasto -> fetch_object()): ?>	
				   
			  <input type="hidden" name="id" value="<?= $row->id ?>" />
        <div class="col-md-8">
			
          <div class="box box-danger">
            <div class="box-header">
              <h3 class="box-title">Editar Gasto </h3>
            </div>
            <div class="box-body">
			<div class="col-md-6">
              <!-- Date dd/mm/yyyy -->
              
			   <div class="form-group">
                <label>Fecha del Abono:</label>

                <div class="input-group">
                  <div class="input-group-addon">
                    <i class="fa fa-calendar"></i>
                  </div>
					<input type="date" class="form-control" name="fecha" value="<?= $row->fecha ?>" required>
                </div>
                <!-- /.input group -->
              </div>
			</div>
			  
			 
              <div class="form-group">
				  <label>Valor abono:</label>
                <div class="input-group">
                  <div class="input-group-addon">
                    <i class="fa fa-tag"></i>
                  </div>
					<input type="number" class="form-control" name="valor" value="<?= $row->valor ?>" required>
                </div>
                <!-- /.input group -->
              </div>
              <!-- /.form group -->
			  
              <!-- phone mask -->
              <div class="form-group">
                <label>Descripcion:</label>

                <div class="input-group">
                  <div class="input-group-addon">
                    <i class="fa fa-bookmark-o"></i>
                  </div>
					<textarea class="form-control" rows="3" name="descripcion" placeholder="Descripcion ..." required><?= $row->descripcion ?></textarea>
                </div>
                <!-- /.input group -->
              </div>
			      
			<?php endwhile; ?>
            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->

          <button class="btn btn-primary" type="submit">

            Editar
          </button>
          <!-- /.box -->

        </div>
        <!-- /.col (left) -->
      
        <!-- /.col (right) -->
		  </form>
      </div>
      <!-- /.row -->

      </div>
        
    </div>

  </section>

</div>