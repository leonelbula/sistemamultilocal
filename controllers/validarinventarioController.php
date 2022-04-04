<?php

require_once 'models/Inventario.php';
require_once 'models/NuevoInventario.php';
require_once 'models/Conteo.php';

class validarinventarioController
{

   public function index()
   {
      require_once 'views/layout/menu.php';
      require_once 'views/validador/index.php';
      require_once 'views/layout/copy.php';
   }

   public function nuevo()
   {
      require_once 'views/layout/menu.php';
      require_once 'views/validador/nuevo.php';
      require_once 'views/layout/copy.php';
   }

   public function validar()
   {
      require_once 'views/layout/menu.php';
      require_once 'views/validador/validar.php';
      require_once 'views/layout/copy.php';
   }

   static public function verificarestado()
   {
      $data = new NuevoInventario();
      $resp = $data->verActivos();
      return $resp;
   }

   public function savestart()
   {
      if (isset($_POST['fecha'])) {

         $fechaInicio = $_POST['fecha'];
         $fechaFinal = '2100-10-10';
         $estado = 1;

         $data = new NuevoInventario();
         $data->setFechainicio($fechaInicio);
         $data->setFechafinal($fechaFinal);
         $data->setEstado($estado);
         $resp = $data->Save();

         if ($resp) {
            echo '  <script>

                        swal({
                                  type: "success",
                                  title: "Registro Guardado Correctamente",
                                  showConfirmButton: false,
                                   timer: 1500,                                                   
                                  }).then(function() {
                                window.location = "nuevo";
                            })

                        </script>';
         } else {
            echo '  <script>

                        swal({
                                  type: "error",
                                  title: "Registro no Guardado",
                                  showConfirmButton: false,
                                   timer: 1500,                                                   
                                  }).then(function() {
                                window.location = "nuevo";
                            })

                        </script>';
         }
      } else {
         echo '  <script>

                        swal({
                                  type: "error",
                                  title: "Registro no guardado debe seleccionar la fecha ",
                                  showConfirmButton: false,
                                   timer: 1500,                                                   
                                  }).then(function() {
                                window.location = "nuevo";
                            })

                        </script>';
      }
   }

   public function update()
   {
      if (isset($_POST['fecha'])) {


         $fechaFinal = $_POST['fecha'];
         $estado = 0;

         $data = new NuevoInventario();
         $data->setFechafinal($fechaFinal);
         $data->setEstado($estado);
         $resp = $data->Update();

         if ($resp) {
            echo '  <script>

                        swal({
                                  type: "success",
                                  title: "Inventaro finalizado Correctamente",
                                  showConfirmButton: false,
                                   timer: 1500,                                                   
                                  }).then(function() {
                                window.location = "nuevo";
                            })

                        </script>';
         } else {
            echo '  <script>

                        swal({
                                  type: "error",
                                  title: "Registro no Guardado",
                                  showConfirmButton: false,
                                   timer: 1500,                                                   
                                  }).then(function() {
                                window.location = "nuevo";
                            })

                        </script>';
         }
      } else {
         echo '  <script>

                        swal({
                                  type: "error",
                                  title: "Registro no guardado debe seleccionar la fecha ",
                                  showConfirmButton: false,
                                   timer: 1500,                                                   
                                  }).then(function() {
                                window.location = "nuevo";
                            })

                        </script>';
      }
   }

   public function save()
   {

      if (isset($_POST['Idproducto']) & !empty($_POST['Idproducto'])) {

         $id_producto = $_POST['Idproducto'];
         $contado = intval($_POST['contado']);

         $inventario = new Inventario();
         $inventario->setId_producto($id_producto);

         $datos = $inventario->MostrarProductosId();


         while ($producto = $datos->fetch_object()) {
            $cantidad_actual = intval($producto->can_inicial);
            $costo = intval($producto->costo);
            $nombre = $producto->nombre;
         }

         $diferencia = $contado - $cantidad_actual;

         $valor_diferencia = $diferencia * $costo;

         $dataInv = new NuevoInventario();
         $respData = $dataInv->verActivos();

         while ($respD = $respData->fetch_object()) {
            $id_registro = $respD->id;
         }

         $conteo = new Conteo();
         $conteo->setId_registro($id_registro);
         $conteo->setId_producto($id_producto);
         $conteo->setNombre($nombre);
         $conteo->setCosto($costo);
         $conteo->setCantidad_actual($cantidad_actual);

         $datosContado = $conteo->verificar();

         if ($datosContado->num_rows != 0) {

            foreach ($datosContado as $key => $valor) {

               $cantidadContadaAnt = intval($valor['contado']);

               $nuevoConteo = $cantidadContadaAnt + $contado;

               $diferencia = $nuevoConteo - $cantidad_actual;

               $valor_diferencia = $diferencia * $costo;


               $conteo->setContado($nuevoConteo);
               $conteo->setDiferencia($diferencia);
               $conteo->setValor_diferencia($valor_diferencia);
               $resp = $conteo->update();
            }
         } else {
            $conteo->setContado($contado);
            $conteo->setDiferencia($diferencia);
            $conteo->setValor_diferencia($valor_diferencia);
            $resp = $conteo->Save();
         }



         if ($resp) {
            echo '  <script>

                        swal({
                                  type: "success",
                                  title: "Registro Guardado Correctamente",
                                  showConfirmButton: false,
                                   timer: 1500,                                                   
                                  }).then(function() {
                                window.location = "validar";
                            })

                        </script>';
         } else {
            echo '  <script>

                        swal({
                                  type: "error",
                                  title: "Registro no guardado ",
                                  showConfirmButton: false,
                                   timer: 1500,                                                   
                                  }).then(function() {
                                window.location = "validar";
                            })

                        </script>';
         }
      } else {
         echo '  <script>

                        swal({
                                  type: "error",
                                  title: "Registro no guardado debe seleccionar un producto ",
                                  showConfirmButton: false,
                                   timer: 1500,                                                   
                                  }).then(function() {
                                window.location = "validar";
                            })

                        </script>';
      }
   }

   public function actulizarSobrantes()
   {
      if ($_POST['id']) {

         $data = new NuevoInventario();
         $id = $_POST['id'];
         $data->setId($id);
         $resp = $data->verActivosId();
         foreach ($resp as $resul) {
            $estado = $resul['estado'];
         }
         if ($estado == 0) {
            echo '  <script>

                        swal({
                                  type: "error",
                                  title: "Registro ya fue validado ",
                                  showConfirmButton: false,
                                   timer: 1500,                                                   
                                  }).then(function() {
                                window.location = "nuevo";
                            })

                        </script>';
         } else {
            $conteo = new Conteo();
            $productoConteo = $conteo->MostrarDescuadre();

            foreach ($productoConteo as $key => $value) {
               $id_producto = $value['id_producto'];
               $cantidadContada = $value['contado'];



               $inventario = new Inventario();
               $inventario->setId_producto($id_producto);
               $inventario->setCantidad_Inicial($cantidadContada);
               $resp = $inventario->ActulizarStock();
            }

            if ($resp) {
               echo '  <script>

                        swal({
                                  type: "success",
                                  title: "Inventario corregido Correctamente",
                                  showConfirmButton: false,
                                   timer: 1500,                                                   
                                  }).then(function() {
                                window.location = "nuevo";
                            })

                        </script>';
            } else {
               echo '  <script>

                        swal({
                                  type: "error",
                                  title: "Registro no validado ",
                                  showConfirmButton: false,
                                   timer: 1500,                                                   
                                  }).then(function() {
                                window.location = "nuevo";
                            })

                        </script>';
            }
         }
      } else {
         echo '  <script>

                        swal({
                                  type: "error",
                                  title: "Error ",
                                  showConfirmButton: false,
                                   timer: 1500,                                                   
                                  }).then(function() {
                                window.location = "nuevo";
                            })

                        </script>';
      }
   }

   public function compararconteo()
   {
      $inventario = new Inventario();
      $productoLocal = $inventario->MostrarProductos();



      while ($row = $productoLocal->fetch_object()) {
         $id_producto = $row->id;
         $nombre = $row->nombre;
         $cantidad = $row->cantidad_min;
         $costo = $row->costo;

         $conteo = new Conteo();
         $conteo->setId_producto($id_producto);
         $lista = $conteo->MostrarConteoId();


         if ($lista->num_rows == 0 && $cantidad != 0) {
            $valor = $costo * $cantidad;
            echo $nombre . ' no fue contado ' . $cantidad . '  valor ' . $valor . '<br>';
         }
      }
      $conteo = new Conteo();
      $datosConteo = $conteo->MostrarConteo();
   }
}
