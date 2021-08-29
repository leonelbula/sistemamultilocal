<?php

require_once 'models/Gastos.php';

class gastosController {

   public function index() {
      require_once 'views/layout/menu.php';
      require_once 'views/gastos/listaGastos.php';
      require_once 'views/layout/copy.php';
   }

   static public function GastoSucursal($id_sucursal) {
      $gastos = new Gastos();
      $gastos->setId_sucursal($id_sucursal);
      $listaGastos = $gastos->MostrarGastos();
      return $listaGastos;
   }

   public function nuevogastos() {
      require_once 'views/layout/menu.php';
      require_once 'views/gastos/registarGastos.php';
      require_once 'views/layout/copy.php';
   }

   public function guardargasto() {
      if ($_POST['valor']) {
         
         $id_sucursal = isset($_POST['idsucursal']) ? $_POST['idsucursal'] : FALSE;
         $fecha = isset($_POST['fecha']) ? $_POST['fecha'] : FALSE;
         $valor = isset($_POST['valor']) ? $_POST['valor'] : FALSE;
         $descripcion = isset($_POST['descripcion']) ? $_POST['descripcion'] : FALSE;

         if ($fecha && $valor && $descripcion) {

            $gasto = new Gastos();
            
            $gasto->setId_sucursal($id_sucursal);
            $gasto->setFecha($fecha);
            $gasto->setValor($valor);
            $gasto->setDescripcion($descripcion);

            $resp = $gasto->Guardar();

            if ($resp) {
               echo'<script>

					swal({
						  type: "success",
						  title: "Gasto guardado Correctamente",
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
						  title: "¡Registro no Guardado !",
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
							  type: "warning",
							  title: "¡No debe haber campos vacios!",
							  showConfirmButton: true,
							  confirmButtonText: "Cerrar"
							  }).then(function(result){
								if (result.value) {

								window.location = "nuevogastos";

								}
							})

					</script>';
         }
      }
   }

   public function editar() {
      require_once 'views/layout/menu.php';

      if ($_GET['id']) {
         $id = $_GET['id'];

         $gasto = new Gastos();
         $gasto->setId($id);
         $detallesGasto = $gasto->MostrarGastoId();
      } else {
         echo'<script>

						swal({
							  type: "warning",
							  title: "¡debe seleccionar un gasto!",
							  showConfirmButton: true,
							  confirmButtonText: "Cerrar"
							  }).then(function(result){
								if (result.value) {

								window.location = "index";

								}
							})

					</script>';
      }
      require_once 'views/gastos/editarGastos.php';
      require_once 'views/layout/copy.php';
   }

   public function actulizargasto() {
      if ($_POST['id']) {

         $id = isset($_POST['id']) ? $_POST['id'] : FALSE;
         $fecha = isset($_POST['fecha']) ? $_POST['fecha'] : FALSE;
         $valor = isset($_POST['valor']) ? $_POST['valor'] : FALSE;
         $descripcion = isset($_POST['descripcion']) ? $_POST['descripcion'] : FALSE;

         if ($id && $fecha && $valor && $descripcion) {

            $gasto = new Gastos();
            $gasto->setId($id);            
            $gasto->setFecha($fecha);
            $gasto->setValor($valor);
            $gasto->setDescripcion($descripcion);

            $resp = $gasto->Actulizar();

            if ($resp) {
               echo'<script>

					swal({
						  type: "success",
						  title: "Gasto Editado Correctamente",
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
						  title: "¡Registro no Guardado !",
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
							  type: "warning",
							  title: "¡No debe haber campos vacios!",
							  showConfirmButton: true,
							  confirmButtonText: "Cerrar"
							  }).then(function(result){
								if (result.value) {

								window.location = "nuevogastos";

								}
							})

					</script>';
         }
      } else {
         echo'<script>

						swal({
							  type: "warning",
							  title: "¡debe seleccionar un gasto!",
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

   public function Eliminar() {
      if ($_GET['id']) {

         $id = $_GET['id'];

         $gasto = new Gastos();
         $gasto->setId($id);

         $resp = $gasto->Eliminar();

         if ($resp) {
            echo'<script>

					swal({
						  type: "success",
						  title: "Gasto Eliminado Correctamente",
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
						  title: "¡Registro no Eliminado !",
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
							  type: "warning",
							  title: "¡debe seleccionar un gasto!",
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

   public function reportes() {
      require_once 'views/layout/menu.php';
      $gastos = new Gastos();
      $listaGastos = $gastos->MostrarGastos();
      require_once 'views/gastos/reportes.php';
      require_once 'views/layout/copy.php';
   }

}
