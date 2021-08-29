<!-- Content Wrapper. Contains page content -->
  <div class="container">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
         
        Panel Administrativo
        <small>Control panel</small>
        
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">Panel Administrativo</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
       <div class="box-body">
            
            <div class="box-header with-border">
        <a href="<?= URL_BASE ?>administracion/">
                  <button class="btn btn-primary">

                     Inicio

                  </button>
            </a>
            </div>
       </div>
      <!-- Small boxes (Stat box) -->
      <div class="row">
         
         
        
        <!-- ./col -->
        <?php 
        
        foreach ($listaSucursal as $key => $sucursal):
           
                
        ?>
        <div class="col-lg-6 col-xs-6">
          <!-- small box -->
          <div class="small-box bg-green">
            <div class="inner">
              <h3><?= $sucursal['nombre'] ?></h3>
             
              
            </div>
            <div class="icon">
              <i class="ion ion-stats-bars"></i>
            </div>
            <a href="<?=URL_BASE?>administracion/reportessucursal&id=<?=$sucursal['id_sucursal']?>" class="small-box-footer">ver mas detalles <i class="fa fa-arrow-circle-right"></i></a>
          </div>
        </div>
        <?php endforeach; ?>
       
      </div>
      <!-- /.row -->
      
      <!-- /.row (main row) -->

    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
