<?php
if (!isset($_SESSION['identity'])) {
   echo'<script>

            swal({
                      type: "success",
                      title: "Cerrado sistema",
                      showConfirmButton: true,
                      confirmButtonText: "Cerrar"
                      }).then(function(result){
                            if (result.value) {

                            window.location = "' . URL_BASE . '";

                            }
                    })

	</script>';
   //header('Location:' . URL_BASE);

  
}
$id_sucursal = $_SESSION['identity']->id_sucursal;
?>

<input type="hidden" name="idSucursal" id="idSucursal" value="<?= $_SESSION['identity']->id_sucursal ?>">
<div class="">
   <header class="main-header">
      <!-- Logo -->
      <a href="<?= URL_BASE ?>frontend/principal" class="logo">
         <!-- mini logo for sidebar mini 50x50 pixels -->
         <span class="logo-mini"><b>A</b>SACV</span>
         <!-- logo for regular state and mobile devices -->
         <span class="logo-lg"><b>Admin</b> - SACV</span>
      </a>
      <!-- Header Navbar: style can be found in header.less -->
      <nav class="navbar navbar-static-top">
         <!-- Sidebar toggle button-->

         <div class="navbar-custom-menu">
            <ul class="nav navbar-nav">        
               <?php
               $Notificacion = frontendController::Notificaciones($id_sucursal);

               while ($row = $Notificacion->fetch_object()) {
                  $productos = $row->producto_stock;
                  $cliente = $row->cliente_mora;
               }
               $totalNotificacion = $productos + $cliente;
               ?>
               <!-- Notifications: style can be found in dropdown.less -->
               <li class="dropdown notifications-menu">
                  <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                     <i class="fa fa-bell-o"></i>
                     <span class="label label-warning"><?= $totalNotificacion ?></span>
                  </a>
                  <ul class="dropdown-menu">
                     <li class="header">Hay <?= $totalNotificacion ?> notificaciones</li>
                     <li>
                        <!-- inner menu: contains the actual data -->
                        <ul class="menu">
                           <li>
                              <a href="" class="actualizarNotificaciones" item="producto_stock">
                                 <i class="fa fa-shopping-cart text-red"></i> <?= $productos ?> Hay Productos Stock bajo
                              </a>
                           </li>                  
                           <!--                  <li>
                                               <a href="" class="actualizarNotificaciones" item="cliente_mora">
                                                 <i class="fa fa-users text-red"></i>  Tienes Clientes mora
                                               </a>
                                             </li>                        -->
                        </ul>
                     </li>              
                  </ul>
               </li>         
               <!-- User Account: style can be found in dropdown.less -->
               <li class="dropdown user user-menu">
                  <a href="#" class="dropdown-toggle" data-toggle="dropdown">

                     <span class="hidden-xs"><?= $_SESSION['identity']->nombre ?></span>
                  </a>
                  <ul class="dropdown-menu">
                     <!-- User image -->
                     <li class="user-header">                

                        <p>
                           <?= $_SESSION['identity']->nombre ?>

                        </p>
                     </li>           

                     <!-- Menu Footer-->
                     <li class="user-footer">
                        <div class="pull-left">
                           <a href="#" class="btn btn-default btn-flat">Perfil</a>
                        </div>
                        <div class="pull-right">
                           <a href="<?= URL_BASE ?>usuario/salir" class="btn btn-default btn-flat">salir</a>
                        </div>
                     </li>
                  </ul>
               </li>
               <!-- Control Sidebar Toggle Button -->

            </ul>
         </div>
      </nav>
   </header>
