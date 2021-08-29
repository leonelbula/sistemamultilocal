<?php

require_once 'models/Usuario.php';
require_once 'models/Inventario.php';
require_once 'models/Notificaciones.php';

class UsuarioController {

   public function Index() {

      require_once 'views/layout/menu.php';
      require_once 'views/usuario/listausuario.php';
      require_once 'views/layout/copy.php';
   }

   static public function listaUsuario($id_sucursal) {
      $usuarios = new Usuario();
      $usuarios->setId_sucursal($id_sucursal);
      $listaUsuario = $usuarios->MostrarTodos();
      return $listaUsuario;
   }
   
   static public function verusuariomaestro($id) {
         $id_usuario = $id;
         $usaurio = new Usuario();
         $usaurio->setId_usuario($id_usuario);
         $detallesUsuario = $usaurio->MostrarUsuarioId();
   }

   public function editar() {
      if (isset($_GET['id'])) {
         $id_usuario = $_GET['id'];

         $usaurio = new Usuario();
         $usaurio->setId_usuario($id_usuario);
         $detallesUsuario = $usaurio->MostrarUsuarioId();

         require_once 'views/layout/menu.php';
         require_once 'views/usuario/editar.php';
         require_once 'views/layout/copy.php';
      } else {
         echo'<script>

					swal({
						  type: "error",
						  title: "¡Debe selecionar un usuario !",
						  showConfirmButton: true,
						  confirmButtonText: "Cerrar"
						  }).then(function(result){
							if (result.value) {

							window.location = "index";

							}
						})

			  	</script>';
      }
   }

   public function actulizar() {
      if ($_POST['id']) {
         $id_usuario = isset($_POST['id']) ? $_POST['id'] : false;
         $nombre = isset($_POST['nombre']) ? $_POST['nombre'] : false;
         $pass = isset($_POST['password']) ? $_POST['password'] : false;
         $tipo = isset($_POST['tipo']) ? $_POST['tipo'] : false;
         $estado = isset($_POST['estado']) ? $_POST['estado'] : false;
         $passAnterio = $_POST['passswordAntigua'];

         if ($nombre) {

            $usuario = new Usuario();

            $usuario->setId_usuario($id_usuario);
            $usuario->setNombre($nombre);
            if (!empty($_POST['password'])) {
               $password = password_hash($pass, PASSWORD_BCRYPT, ['cost' => 4]);
            } else {
               $password = $passAnterio;
            }
            $usuario->setPassword($password);
            $usuario->setTipo($tipo);
            $usuario->setEstado($estado);

            $resp = $usuario->Actulizar();

            if ($resp) {

               echo'<script>

					swal({
						  type: "success",
						  title: "Usuario ha sido actulizado correctamente",
						  showConfirmButton: true,
						  confirmButtonText: "Cerrar"
						  }).then(function(result){
							if (result.value) {

							window.location = "index";

							}
						})

					</script>';
            } else {
               echo'<script>

					swal({
						  type: "error",
						  title: "¡No se puedo actulizar Usuario!",
						  showConfirmButton: true,
						  confirmButtonText: "Cerrar"
						  }).then(function(result){
							if (result.value) {

							window.location = "index";

							}
						})

			  	</script>';
            }
         }
      } else {
         echo'<script>

					swal({
						  type: "error",
						  title: "¡Debe selecionar un usuario !",
						  showConfirmButton: true,
						  confirmButtonText: "Cerrar"
						  }).then(function(result){
							if (result.value) {

							window.location = "index";

							}
						})

			  	</script>';
      }
   }

   public function Login() {
      if ($_POST) {

         $nombre = $_POST['nombre'];
         $password = $_POST['password'];
         if ($nombre && $password) {

            $usuario = new Usuario();
            $usuario->setNombre($nombre);
            $usuario->setPassword($password);

            $identity = $usuario->Login();

            if ($identity && is_object($identity)) {

               $_SESSION['identity'] = $identity;

               if ($_SESSION['identity']->estado == 1) {

                  $productos = new Inventario();
                  $detalles = $productos->stock();
                  while ($row = $detalles->fetch_object()) {
                     $producto_stock = (int) $row->total;
                  }
                  $notificacion = new Notificaciones();
                  $notificacion->setProducto_stock($producto_stock);
                  $est = $notificacion->NuevaNotificacionProductos();

                  if ($_SESSION['identity']->tipo == 'maestro') {
                     echo'<script>

					swal({
						  type: "success",
						  title: "Bienvenido",
						  showConfirmButton: true,
						  confirmButtonText: "Cerrar"
						  }).then(function(result){
							if (result.value) {

							window.location = "' . URL_BASE . 'administracion/index";

							}
						})

					</script>';
                  } else {
                     echo'<script>

					swal({
						  type: "success",
						  title: "Bienvenido",
						  showConfirmButton: true,
						  confirmButtonText: "Cerrar"
						  }).then(function(result){
							if (result.value) {

							window.location = "' . URL_BASE . 'frontend/principal";

							}
						})

					</script>';
                  }


                  //header("location:" . URL_BASE . "frontend/principal");
               } else {
                  echo'<script>

							swal({
								  type: "error",
								  title: "¡Credenciales de acceso incorrectas !",
								  showConfirmButton: true,
								  confirmButtonText: "Cerrar"
								  }).then(function(result){
									if (result.value) {

									window.location = "' . URL_BASE . '";

									}
								})

						</script>';
               }
            } else {

               echo'<script>

							swal({
								  type: "error",
								  title: "¡Credenciales de acceso incorrectas !",
								  showConfirmButton: true,
								  confirmButtonText: "Cerrar"
								  }).then(function(result){
									if (result.value) {

									window.location = "' . URL_BASE . '";

									}
								})

						</script>';
            }
         }
      } else {
         echo'<script>

							swal({
								  type: "error",
								  title: "¡Credenciales de acceso incorrectas !",
								  showConfirmButton: true,
								  confirmButtonText: "Cerrar"
								  }).then(function(result){
									if (result.value) {

									window.location = "' . URL_BASE . '";

									}
								})

						</script>';
      }
   }

   public function Guardar() {
      if (isset($_POST)) {

         $id_sucursal = isset($_POST['idsucursal']) ? $_POST['idsucursal'] : false;
         $nombre = isset($_POST['nombre']) ? $_POST['nombre'] : false;
         $pass = isset($_POST['password']) ? $_POST['password'] : false;
         $tipo = isset($_POST['tipo']) ? $_POST['tipo'] : false;
         $estado = isset($_POST['estado']) ? $_POST['estado'] : false;

         if ($id_sucursal && $nombre && $pass && $tipo && $estado) {

            $usuario = new Usuario();

            $usuario->setNombre($nombre);
            $usuario->setId_sucursal($id_sucursal);

            $password = password_hash($pass, PASSWORD_BCRYPT, ['cost' => 4]);
            $usuario->setPassword($password);
            $usuario->setTipo($tipo);
            $usuario->setEstado($estado);


            $save = $usuario->save();

            //var_dump($save);

            if ($save) {

               echo'<script>

					swal({
						  type: "success",
						  title: "Usuario ha sido guardado correctamente",
						  showConfirmButton: true,
						  confirmButtonText: "Cerrar"
						  }).then(function(result){
							if (result.value) {

							window.location = "index";

							}
						})

					</script>';
            } else {
               echo'<script>

					swal({
						  type: "error",
						  title: "¡No se puedo registrar Usuario!",
						  showConfirmButton: true,
						  confirmButtonText: "Cerrar"
						  }).then(function(result){
							if (result.value) {

							window.location = "index";

							}
						})

			  	</script>';

               return;
            }
         }
         //header('location:index');
      }
   }

   public function Eliminar() {
      if ($_GET['id']) {
         $id_usuario = $_GET['id'];
         $usuario = new Usuario();
         $usuario->setId_usuario($id_usuario);
         $resp = $usuario->Eliminar();

         if ($resp) {
            echo'<script>

					swal({
						  type: "success",
						  title: "Usuario eliminado correctamente",
						  showConfirmButton: true,
						  confirmButtonText: "Cerrar"
						  }).then(function(result){
							if (result.value) {

							window.location = "index";

							}
						})

					</script>';
         } else {
            echo'<script>

					swal({
						  type: "error",
						  title: "¡No se puedo eliminar Usuario!",
						  showConfirmButton: true,
						  confirmButtonText: "Cerrar"
						  }).then(function(result){
							if (result.value) {

							window.location = "index";

							}
						})

			  	</script>';
         }
      } else {
         echo'<script>

					swal({
						  type: "error",
						  title: "¡debe elegir un Usuario!",
						  showConfirmButton: true,
						  confirmButtonText: "Cerrar"
						  }).then(function(result){
							if (result.value) {

							window.location = "index";

							}
						})

			  	</script>';
      }
   }

   public function Salir() {
      if (isset($_SESSION['identity'])) {
         unset($_SESSION['identity']);
      }
      //header('Location:'.URL_BASE);
      echo'<script>
				window.location="' . URL_BASE . '";
			</script>';
   }

}
