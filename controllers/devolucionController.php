<?php

require_once 'models/Inventario.php';
require_once 'models/Devolucion.php';

class devolucionController {

   public function index() {
      require_once 'views/layout/menu.php';
      require_once 'views/devolucion/index.php';
      require_once 'views/layout/copy.php';
   }

   public function create() {
      require_once 'views/layout/menu.php';
      require_once 'views/devolucion/crear.php';
      require_once 'views/layout/copy.php';
   }

   static public function verDevolucionId($id, $id_sucursal) {
      $devolucion = new Devolucion();
      $devolucion->setId($id);
      $devolucion->setId_sucursal($id_sucursal);
      $resul = $devolucion->verId();
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
           
            
 
            
            $subTotal = $value['subtotal'];
            


            $producto->setId_producto($id_producto);
            $respuest = $producto->VercantidadProducto();

            while ($row = $respuest->fetch_object()) {
               $cantidad = $row->can_inicial;
                
            }
            $producto->setId_producto($id_producto);
            $respuestCosto = $producto->CostoProducto();

            while ($row = $respuestCosto->fetch_object()) {
               
                $costo = (int)$row->costo;
            }
                       

            $nuevCantidad = $cantidad + $cantidadV;

            $producto->setCantidad_Inicial($nuevCantidad);
            $producto->ActulizarStock();
            
            
            
            $costoTotalProducto = $costo * $cantidadV;
            $UtilidadP = $subTotal - $costoTotalProducto;
            $array[] = array('idProducto' => $id_producto, 'valor' => $UtilidadP);
         }
         
         $valorUtilida = array_column($array, 'valor');
         $TotalUtilidad = array_sum($valorUtilida);
         
         

         $valorVenta = (int) $_POST['totalVenta'];
         $detalle_venta = $_POST["listaProductos"];



         date_default_timezone_set('America/Bogota');


         $devolucion = new Devolucion();

         $fechaActualFact = $_POST['fecha'];
         $devolucion->setId_sucursal($id_sucursal);
         $devolucion->setFecha($fechaActualFact);
         $devolucion->setDetalles($detalle_venta);
         $devolucion->setTotal($valorVenta);
         $devolucion->setDescripcion($descripcion);
         $devolucion->setUtilidad($TotalUtilidad);

         //var_dump($venta);

         $resp = $devolucion->save();
     
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

         require_once 'views/devolucion/editar.php';
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



      $devolucion = new Devolucion();
      $devolucion->setId($id);
      $devolucion->setId_sucursal($id_sucursal);
      $detalleAnterior = $devolucion->verId();

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

         $nuevCantidad = $cantidad - $cantidadV;

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

         $nuevCantidad = $cantidad + $cantidadV;

         $producto->setCantidad_Inicial($nuevCantidad);
         $producto->ActulizarStock();
      }

      $valorVenta = (int) $_POST['totalVenta'];
      $detalle_venta = $_POST["listaProductos"];



      $fechaActualFact = $_POST['fecha'];
      $devolucion->setId_sucursal($id_sucursal);
      $devolucion->setFecha($fechaActualFact);
      $devolucion->setDetalles($detalle_venta);
      $devolucion->setTotal($valorVenta);
      $devolucion->setDescripcion($descripcion);

      //var_dump($venta);

      $resp = $devolucion->update();

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
     


      $devolucion = new Devolucion();
      $devolucion->setId($id);
      $devolucion->setId_sucursal($id_sucursal);
      $detalleAnterior = $devolucion->verId();

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

         $nuevCantidad = $cantidad - $cantidadV;

         $producto->setCantidad_Inicial($nuevCantidad);
         $producto->ActulizarStock();
      }
      
      $resul = $devolucion->delete();
      
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

      require_once 'views/devolucion/index.php';
      require_once 'views/layout/copy.php';
   }

}
