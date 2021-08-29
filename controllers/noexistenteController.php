<?php

require_once 'models/NoExistente.php';

class noexistenteController {

   public function index() {
      require_once 'views/layout/menu.php';
      require_once 'views/noexistente/index.php';
      require_once 'views/layout/copy.php';
   }

   public function crear() {
      require_once 'views/layout/menu.php';
      require_once 'views/noexistente/crear.php';
      require_once 'views/layout/copy.php';
   }

   public function guardar() {
      $id_sucursal = isset($_POST['idsucursal']) ? $_POST['idsucursal'] : false;
      $fecha = isset($_POST['fecha']) ? $_POST['fecha'] : false;
      $valor = isset($_POST['valor']) ? $_POST['valor'] : false;
      $detalle = isset($_POST['detalle']) ? $_POST['detalle'] : false;

      if ($id_sucursal && $valor) {

         $data = new NoExistente();
         $data->setId_sucursal($id_sucursal);
         $data->setFecha($fecha);
         $data->setValor($valor);
         $data->setDetalle($detalle);
         $resp = $data->guardar();
         if ($resp) {
            echo'<script>

                     swal({
                               type: "success",
                               title: "Registro Guardado Correctamente",
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
   }

   public function editar() {
      require_once 'views/layout/menu.php';
      if ($_GET['id']) {

         $id = $_GET['id'];

         $data = new NoExistente();
         $data->setId($id);
         $detalles = $data->verId();
      } else {
         echo'<script>

                           swal({
                                     type: "error",
                                     title: "¡Registro no seleccionado !",
                                     showConfirmButton: true,
                                     confirmButtonText: "Cerrar"
                                     }).then(function(result){
                                           if (result.value) {

                                           window.location = "index";

                                           }
                                   })

                   </script>';
      }
      require_once 'views/noexistente/editar.php';
      require_once 'views/layout/copy.php';
   }

   public function actualizar() {

      $id = isset($_POST['id']) ? $_POST['id'] : false;
      $id_sucursal = isset($_POST['idsucursal']) ? $_POST['idsucursal'] : false;
      $fecha = isset($_POST['fecha']) ? $_POST['fecha'] : false;
      $valor = isset($_POST['valor']) ? $_POST['valor'] : false;
      $detalle = isset($_POST['detalle']) ? $_POST['detalle'] : false;

      if ($id_sucursal && $valor) {

         $data = new NoExistente();
         $data->setId($id);
         $data->setId_sucursal($id_sucursal);
         $data->setFecha($fecha);
         $data->setValor($valor);
         $data->setDetalle($detalle);
         $resp = $data->actulizar();

         if ($resp) {
            echo'<script>

                     swal({
                               type: "success",
                               title: "Registro editado correctamente",
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
   }

   public function eliminar() {
      require_once 'views/layout/menu.php';
      if ($_GET['id']) {

         $id = $_GET['id'];
         $id_sucursal = $_GET['id_sucursal'];

         $data = new NoExistente();
         $data->setId($id);
         $data->setId_sucursal($id_sucursal);

         $resp = $detalles = $data->eliminar();
         if ($resp) {
            echo'<script>

                     swal({
                               type: "success",
                               title: "Registro eliminado correctamente",
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
                                     title: "¡Registro no eliminado !",
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
                                     title: "¡Registro no seleccionado !",
                                     showConfirmButton: true,
                                     confirmButtonText: "Cerrar"
                                     }).then(function(result){
                                           if (result.value) {

                                           window.location = "index";

                                           }
                                   })

                   </script>';
      }
      require_once 'views/noexistente/index.php';
      require_once 'views/layout/copy.php';
   }

}


