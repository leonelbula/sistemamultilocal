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
if(isset($_GET['id'])):
$id_sucursal = $_GET['id'];

?>

<input type="hidden" name="idSucursal" id="idSucursal" value="<?= $id_sucursal ?>">
<?php endif;?>
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
               
               <!-- Notifications: style can be found in dropdown.less -->
                   
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
   