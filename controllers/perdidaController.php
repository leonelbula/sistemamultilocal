<?php

require_once 'models/Inventario.php';
require_once 'models/Perdida.php';

class perdidaController {

   public function index() {
      require_once 'views/layout/menu.php';
      require_once 'views/perdida/index.php';
      require_once 'views/layout/copy.php';
   }

   public function create() {
      require_once 'views/layout/menu.php';
      require_once 'views/perdida/crear.php';
      require_once 'views/layout/copy.php';
   }

   static public function verPerdidaId($id, $id_sucursal) {
      $perdida = new Perdida();
      $perdida->setId($id);
      $perdida->setId_sucursal($id_sucursal);
      $resul = $perdida->verId();
      return $resul;
   }

   public function save() {


      if (isset($_POST['idsucursal']) && !empty($_POST['idsucursal'])) {

         $id_sucursal = $_POST['idsucursal'];
         $descripcion = $_POST['motivo'];

         $listaProductos = json_decode($_POST["listaProductos"], true);


         foreach ($listaProductos as $key => $value) {

            //array_push($totalProductosComprados, $value["cantidad"]);
            $producto = new Inventario();
            $id_producto = $value["id"];
            $cantidadV = $value['cantidad'];


            $producto->setId_producto($id_producto);
            $respuest = $producto->VercantidadProducto();

            while ($row = $respuest->fetch_object()) {
               $cantidad = $row->can_inicial;
            }

            $nuevCantidad = $cantidad - $cantidadV;

            $producto->setCantidad_Inicial($nuevCantidad);
            $producto->ActulizarStock();
         }

         $valorVenta = (int) $_POST['totalVenta'];
         $detalle_venta = $_POST["listaProductos"];



         date_default_timezone_set('America/Bogota');


         $perdida = new Perdida();

         $fechaActualFact = date('Y-m-d');
         $perdida->setId_sucursal($id_sucursal);
         $perdida->setFecha($fechaActualFact);
         $perdida->setDetalles($detalle_venta);
         $perdida->setTotal($valorVenta);
         $perdida->setDescripcion($descripcion);

         //var_dump($venta);

         $resp = $perdida->save();


         if ($resp) {
            echo'<script>

                     swal({
                               type: "success",
                               title: "Registro Correctamente",
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
                            title: "¡No se puede guardar !",
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
                            title: "¡No se puede guardar !",
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

         require_once 'views/perdida/editar.php';
      } else {
         echo'<script>

                  swal({
                            type: "error",
                            title: "¡Debe seleccionar un registro !",
                            showConfirmButton: true,
                            confirmButtonText: "Cerrar"
                            }).then(function(result){
                                  if (result.value) {

                                  window.location = "index";

                                  }
                          })

		</script>';
      }

      require_once 'views/layout/copy.php';
   }

   public function update() {
      $id = $_POST['id'];
      $id_sucursal = $_POST['idsucursal'];
      $descripcion = $_POST['motivo'];



      $perdida = new Perdida();
      $perdida->setId($id);
      $perdida->setId_sucursal($id_sucursal);
      $detalleAnterior = $perdida->verId();

      while ($row1 = $detalleAnterior->fetch_object()) {
         $productoguardado = $row1->detalles;
      }


      $listaProductosAnterior = json_decode($productoguardado, true);


      foreach ($listaProductosAnterior as $key => $value) {

         //array_push($totalProductosComprados, $value["cantidad"]);
         $producto = new Inventario();
         $id_producto = $value["id"];
         $cantidadV = $value['cantidad'];


         $producto->setId_producto($id_producto);
         $respuest = $producto->VercantidadProducto();

         while ($row = $respuest->fetch_object()) {
            $cantidad = $row->can_inicial;
         }

         $nuevCantidad = $cantidad + $cantidadV;

         $producto->setCantidad_Inicial($nuevCantidad);
         $producto->ActulizarStock();
      }

      /// descontar

      $listaProductos = json_decode($_POST["listaProductos"], true);


      foreach ($listaProductos as $key => $value) {

         //array_push($totalProductosComprados, $value["cantidad"]);
         $producto = new Inventario();
         $id_producto = $value["id"];
         $cantidadV = $value['cantidad'];


         $producto->setId_producto($id_producto);
         $respuest = $producto->VercantidadProducto();

         while ($row = $respuest->fetch_object()) {
            $cantidad = $row->can_inicial;
         }

         $nuevCantidad = $cantidad - $cantidadV;

         $producto->setCantidad_Inicial($nuevCantidad);
         $producto->ActulizarStock();
      }

      $valorVenta = (int) $_POST['totalVenta'];
      $detalle_venta = $_POST["listaProductos"];



      $fechaActualFact = $_POST['fecha'];
      $perdida->setId_sucursal($id_sucursal);
      $perdida->setFecha($fechaActualFact);
      $perdida->setDetalles($detalle_venta);
      $perdida->setTotal($valorVenta);
      $perdida->setDescripcion($descripcion);

      //var_dump($venta);

      $resp = $perdida->update();

      if ($resp) {
         echo'<script>

                     swal({
                               type: "success",
                               title: "Guardado Correctamente",
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
                            title: "¡No se puede guardar !",
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
      $id = $_GET['id'];
      $id_sucursal = $_GET['id_sucursal'];
     


      $perdida = new Perdida();
      $perdida->setId($id);
      $perdida->setId_sucursal($id_sucursal);
      $detalleAnterior = $perdida->verId();

      while ($row1 = $detalleAnterior->fetch_object()) {
         $productoguardado = $row1->detalles;
      }


      $listaProductosAnterior = json_decode($productoguardado, true);


      foreach ($listaProductosAnterior as $key => $value) {

         //array_push($totalProductosComprados, $value["cantidad"]);
         $producto = new Inventario();
         $id_producto = $value["id"];
         $cantidadV = $value['cantidad'];


         $producto->setId_producto($id_producto);
         $respuest = $producto->VercantidadProducto();

         while ($row = $respuest->fetch_object()) {
            $cantidad = $row->can_inicial;
         }

         $nuevCantidad = $cantidad + $cantidadV;

         $producto->setCantidad_Inicial($nuevCantidad);
         $producto->ActulizarStock();
      }
      
      $resul = $perdida->delete();
      
      if($resul){
         echo'<script>

                     swal({
                               type: "success",
                               title: "Eliminado correctamente",
                               showConfirmButton: true,
                               confirmButtonText: "Cerrar"
                               }).then(function(result){
                                     if (result.value) {

                                     window.location = "index";

                                     }
                             })

                     </script>';
      }else{
         echo'<script>

                  swal({
                            type: "error",
                            title: "¡No se puede eliminar !",
                            showConfirmButton: true,
                            confirmButtonText: "Cerrar"
                            }).then(function(result){
                                  if (result.value) {

                                  window.location = "index";

                                  }
                          })

		</script>';
      }

      require_once 'views/perdida/index.php';
      require_once 'views/layout/copy.php';
   }

}
