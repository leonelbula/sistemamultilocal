


  <div class="">
    <!-- Content Header (Page header) -->
    
    <!-- Main content -->
    <section class="content">
      <!-- Small boxes (Stat box) -->
      <div class="row">
        <div class="col-lg-3 col-xs-6">
          <!-- small box -->
          <div class="small-box bg-green">
            <div class="inner">
              <h3>VENTAS</h3>
              <br>
            </div>
            <div class="icon">
              <i class="ion ion-bag"></i>
            </div>
            <a href="<?=URL_BASE?>ventas/listarventas" class="small-box-footer">Abrir <i class="fa fa-arrow-circle-right"></i></a>
          </div>
        </div>
        
         <div class="col-lg-3 col-xs-6">
          <!-- small box -->
          <div class="small-box bg-green">
            <div class="inner">
              <h3>PLAN SEPARE</h3>
              <br>
            </div>
            <div class="icon">
              <i class="ion ion-bag"></i>
            </div>
            <a href="<?=URL_BASE?>plansepare/listar" class="small-box-footer">Abrir <i class="fa fa-arrow-circle-right"></i></a>
          </div>
        </div>
        
        <!-- ./col -->
        <div class="col-lg-3 col-xs-6">
          <!-- small box -->
          <div class="small-box bg-green">
            <div class="inner">
              <h3>COMPRAS</h3>

              <br>
            </div>
            <div class="icon">
              <i class="ion ion-stats-bars"></i>
            </div>
            <a href="<?=URL_BASE?>compras/compras" class="small-box-footer">Abrir <i class="fa fa-arrow-circle-right"></i></a>
          </div>
        </div>
        <div class="col-lg-3 col-xs-6">
          <!-- small box -->
          <div class="small-box bg-green">
            <div class="inner">
              <h3>DEVOLUCION</h3>

              <br>
            </div>
            <div class="icon">
              <i class="ion ion-stats-bars"></i>
            </div>
            <a href="<?=URL_BASE?>devolucion/" class="small-box-footer">Abrir <i class="fa fa-arrow-circle-right"></i></a>
          </div>
        </div>
        <div class="col-lg-3 col-xs-6">
          <!-- small box -->
          <div class="small-box bg-green">
            <div class="inner">
              <h3>OTRAS VENTAS</h3>

              <br>
            </div>
            <div class="icon">
              <i class="ion ion-stats-bars"></i>
            </div>
            <a href="<?=URL_BASE?>noexistente/" class="small-box-footer">Abrir <i class="fa fa-arrow-circle-right"></i></a>
          </div>
        </div>
        <div class="col-lg-3 col-xs-6">
          <!-- small box -->
          <div class="small-box bg-green">
            <div class="inner">
              <h3>DAÑOS/PERDIDAS</h3>

              <br>
            </div>
            <div class="icon">
              <i class="ion ion-stats-bars"></i>
            </div>
            <a href="<?=URL_BASE?>perdida/" class="small-box-footer">Abrir <i class="fa fa-arrow-circle-right"></i></a>
          </div>
        </div>
        <!-- ./col telefono rp nokia 106 40000-->
        <div class="col-lg-3 col-xs-6">
          <!-- small box -->
          <div class="small-box bg-green">
            <div class="inner">
              <h3>CLIENTES</h3>

              <br>
            </div>
            <div class="icon">
              <i class="fa fa-users"></i>
            </div>
            <a href="<?=URL_BASE?>cliente/" class="small-box-footer">Abrir <i class="fa fa-arrow-circle-right"></i></a>
          </div>
        </div>
        <!-- ./col -->
        
        <!-- ./col -->
        <div class="col-lg-3 col-xs-6">
          <!-- small box -->
          <div class="small-box bg-green">
            <div class="inner">
              <h3>PROVEEDOR</h3>

              <br>
            </div>
            <div class="icon">
              <i class="ion ion-person-add"></i>
            </div>
            <a href="<?=URL_BASE?>proveedor/" class="small-box-footer">Abrir <i class="fa fa-arrow-circle-right"></i></a>
          </div>
        </div>
        <div class="col-lg-3 col-xs-6">
          <!-- small box -->
          <div class="small-box bg-green">
            <div class="inner">
              <h3>GASTOS</h3>

              <br>
            </div>
            <div class="icon">
              <i class="fa fa-book"></i>
            </div>
            <a href="<?=URL_BASE?>gastos/" class="small-box-footer">Abrir <i class="fa fa-arrow-circle-right"></i></a>
          </div>
        </div>
        <div class="col-lg-3 col-xs-6">
          <!-- small box -->
          <div class="small-box bg-green">
            <div class="inner">
              <h3>PEDIDOS</h3>

              <br>
            </div>
            <div class="icon">
              <i class="fa fa-clone"></i>
            </div>
            <a href="<?=URL_BASE?>pedido/" class="small-box-footer">Abrir <i class="fa fa-arrow-circle-right"></i></a>
          </div>
        </div>
        <?php 
        if($_SESSION['identity']->tipo == 'admin'):
        
        ?>
        <div class="col-lg-3 col-xs-6">
          <!-- small box -->
          <div class="small-box bg-green">
            <div class="inner">
              <h3>PRODUCTOS</h3>

              <br>
            </div>
            <div class="icon">
              <i class="ion ion-pie-graph"></i>
            </div>
            <a href="<?=URL_BASE?>inventario/" class="small-box-footer">Abrir <i class="fa fa-arrow-circle-right"></i></a>
          </div>
        </div>
        
        <div class="col-lg-3 col-xs-6">
          <!-- small box -->
          <div class="small-box bg-green">
            <div class="inner">
              <h3>VALIDAR INVENT.</h3>

              <br>
            </div>
            <div class="icon">
              <i class="ion ion-pie-graph"></i>
            </div>
            <a href="<?=URL_BASE?>validarinventario/" class="small-box-footer">Abrir <i class="fa fa-arrow-circle-right"></i></a>
          </div>
        </div>
    
        <div class="col-lg-3 col-xs-6">
         
          <div class="small-box bg-green">
            <div class="inner">
              <h3>REPORTES</h3>

              <br>
            </div>
            <div class="icon">
              <i class="fa fa-folder"></i>
            </div>
            <a href="<?=URL_BASE?>reporte/" class="small-box-footer">Abrir <i class="fa fa-arrow-circle-right"></i></a>
          </div>
        </div>
        <div class="col-lg-3 col-xs-6">
         
          <div class="small-box bg-green">
            <div class="inner">
              <h3>PARAMETROS</h3>

              <br>
            </div>
            <div class="icon">
              <i class="fa fa-gears"></i>
            </div>
            <a href="<?=URL_BASE?>parametros/" class="small-box-footer">Abrir <i class="fa fa-arrow-circle-right"></i></a>
          </div>
          
        </div>
        <div class="col-lg-3 col-xs-6">
        <div class="small-box bg-green">
            <div class="inner">
              <h3>USUARIO</h3>

              <br>
            </div>
            <div class="icon">
              <i class="fa fa-gears"></i>
            </div>
            <a href="<?=URL_BASE?>usuario/" class="small-box-footer">Abrir <i class="fa fa-arrow-circle-right"></i></a>
          </div>
        
        </div>
        
      </div>
      
       row
      
      <!-- /.row (main row) -->
      <?php endif ?>

    </section>
    <!-- /.content -->
  </div>