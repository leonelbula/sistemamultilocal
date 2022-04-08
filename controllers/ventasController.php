<?php

require_once 'models/Inventario.php';
require_once 'models/VentaProducto.php';
require_once 'models/CompraCliente.php';
require_once 'models/Parametros.php';
require_once 'models/Venta.php';
require_once 'models/Plazo.php';
require_once 'models/Cliente.php';
require_once 'models/IniciarVenta.php';
require_once 'models/Gastos.php';
require_once 'models/AbonosCliente.php';
require_once 'models/Componente.php';
require_once 'models/NoExistente.php';
require_once 'models/AbonosPlanSepare.php';
require_once 'models/Devolucion.php';

class ventasController {

   public function listarventas() {
      require_once 'views/layout/menu.php';

      if (isset($_GET["fechaInicial"])) {
         $id = $_GET['id'];
         $fechaInicial = $_GET["fechaInicial"];
         $fechaFinal = $_GET["fechaFinal"];

         $ventas = new Venta();
         $detalleVentasSucursal = $ventas->ReportesVentas($id, $fechaInicial, $fechaFinal);
      }
      require_once 'views/ventas/listaventas.php';
      require_once 'views/layout/copy.php';
   }

   static public function ventasSucursal($id_sucursal) {
      $ventas = new Venta();
      $ventas->setId_sucursal($id_sucursal);
      $listaVentas = $ventas->MostrarVentasSucursal();
      return $listaVentas;
   }

   public function iniciarventa() {
      require_once 'views/layout/menu.php';
      require_once 'views/ventas/iniciarVentas.php';
      require_once 'views/layout/copy.php';
   }

   static function verInicioventa($id_sucursal) {
      $IniciarVentas = new IniciarVenta();
      $IniciarVentas->setId_sucursal($id_sucursal);
      $detalles = $IniciarVentas->ventasActivas();
      return $detalles;
   }

   static function verVentaActivaSucursal($id_sucursal) {
      $IniciarVentas = new IniciarVenta();
      $IniciarVentas->setId_sucursal($id_sucursal);
      $listacierres = $IniciarVentas->MostrarCierres();
      return $listacierres;
   }

   static public function VerValorCaja($id_sucursal) {
      $valor = new IniciarVenta();
      $valor->setId_sucursal($id_sucursal);
      $resul = $valor->ventasActivas();
      return $resul;
   }

   public function vercierre() {
      require_once 'views/layout/menu.php';
      if ($_GET['id']) {
         $id = $_GET['id'];
         $cierre = new IniciarVenta();
         $cierre->setId($id);
         $detalles = $cierre->VerCierres();
         require_once 'views/ventas/ver.php';
      } else {
         echo'<script>

                     swal({
                               type: "error",
                               title: "¡No se puede mostrar cierre de  venta !",
                               showConfirmButton: true,
                               confirmButtonText: "Cerrar"
                               }).then(function(result){
                                     if (result.value) {

                                     window.location = "iniciarventa";

                                     }
                             })

             </script>';
      }

      require_once 'views/layout/copy.php';
   }

   public function guardarinicioventa() {

      date_default_timezone_set('America/Bogota');

      if ($_POST['basecaja']) {

         $id_sucursal = $_POST['idsucursal'];
         $fechainicio = $_POST['fecha'];

         $verificarDate = new IniciarVenta();
         $dataRest = $verificarDate->VerificarFecha($id_sucursal, $fechainicio);
         
       
         if ($dataRest->num_rows == 1) {
            echo'<script>

                     swal({
                               type: "error",
                               title: "¡Las ventas del '.$fechainicio.' ya fueron registrada !",
                                showConfirmButton: false,
                                 timer: 2500,                                                   
                                }).then(function() {
                              window.location = "iniciarventa";
                          })

             </script>';
         } else {



            $fechacierre = date('Y-m-d');
            $basecaja = $_POST['basecaja'];
            $totalingresos = 0;
            $totalgastos = 0;
            $otrosmedio = 0;
            $noexistente = 0;
            $plansepare = 0;
            $abonocliente = 0;
            $devolucion = 0;
            $montoentregado = 0;
            $diferencia = 0;
            $estado = 1;

            $inicioventa = new IniciarVenta();

            $inicioventa->setId_sucursal($id_sucursal);
            $inicioventa->setFechainicio($fechainicio);
            $inicioventa->setFechacierre($fechacierre);
            $inicioventa->setBasecaja($basecaja);
            $inicioventa->setTotalingresos($totalingresos);
            $inicioventa->setTotalgastos($totalgastos);
            $inicioventa->setOtrosmedio($otrosmedio);
            $inicioventa->setNoexistente($noexistente);
            $inicioventa->setPlansepare($plansepare);
            $inicioventa->setAbonocliente($abonocliente);
            $inicioventa->setDevolucion($devolucion);
            $inicioventa->setMontoentregado($montoentregado);
            $inicioventa->setDiferencia($diferencia);
            $inicioventa->setEstado($estado);

            $response = $inicioventa->MostrarCierresActivos();


            if ($response->num_rows == 0) {

               $resp = $inicioventa->IniciarVenta();


               if ($resp) {
                  echo'<script>

					swal({
						  type: "success",
						  title: "Punto Venta iniciado  Correctamente",
						   showConfirmButton: false,
						   timer: 1500,                                                   
						  }).then(function() {
                                                window.location = "iniciarventa";
                                            })

					</script>';
               } else {
                  echo'<script>

					swal({
						  type: "error",
						  title: "¡No se pudo inicar punto de venta !",
						   showConfirmButton: false,
						   timer: 1500,                                                   
						  }).then(function() {
                                                window.location = "iniciarventa";
                                            })

			  	</script>';
               }
            } else {
               echo'<script>

					swal({
						  type: "success",
						  title: "Punto de venta ya esta activo",
						   showConfirmButton: false,
						   timer: 1500,                                                   
						  }).then(function() {
                                                window.location = "iniciarventa";
                                            })

					</script>';
            }
         }
      } else {
         echo'<script>

                     swal({
                               type: "error",
                               title: "¡No a Elegido una venta !",
                                showConfirmButton: false,
                                 timer: 1500,                                                   
                                }).then(function() {
                              window.location = "iniciarventa";
                          })

             </script>';
      }
   }

   public function guardarcierreventa() {
      require_once 'views/layout/menu.php';
      if ($_POST['caja'] && $_POST['idsucursal']) {
         date_default_timezone_set('America/Bogota');

         $fechacierre = date('Y-m-d');
         $montoentregado = (int) $_POST['caja'];


         $cerrarventa = new IniciarVenta();
         $cerrarventa->setId_sucursal($id_sucursal);
         $detalles = $cerrarventa->ventasActivas();

         while ($row = $detalles->fetch_object()) {
            $id = $row->id;
            $basecaja = (int) $row->basecaja;
            $fechainicio = $row->fecha_inicio;
         }

         $ventas = new Venta();
         $totalVentas = $ventas->Ventas($id_sucursal, $fechainicio, $fechacierre);

         $totalOtrosdata = $ventas->otros($id_sucursal, $fechainicio, $fechacierre);

         while ($row1 = $totalVentas->fetch_object()) {
            $ventatotal = (int) $row1->total;
         }
         if ($totalOtrosdata) {
            while ($row2 = $totalOtrosdata->fetch_object()) {
               $totalOtros = (int) $row2->total;
            }
         } else {
            $totalOtros = 0;
         }



         $abonos = new AbonosCliente();
         $totalAbonos = $abonos->AbonosDiarios($id_sucursal, $fechainicio, $fechacierre);

         while ($row3 = $totalAbonos->fetch_object()) {
            $valorAbonos = (int) $row3->total;
         }

         $abonoPlansepare = new AbonosPlanSepare();
         $totalAbonosPl = $abonoPlansepare->AbonosDiarios($id_sucursal, $fechainicio, $fechacierre);

         while ($row4 = $totalAbonosPl->fetch_object()) {
            $valorAbonosPl = (int) $row4->total;
         }

         $datanoexistente = new NoExistente();
         $totaldatanoexistente = $datanoexistente->recibidos($id_sucursal, $fechainicio, $fechacierre);

         while ($row5 = $totaldatanoexistente->fetch_object()) {
            $valortotalnoexitente = $row5->total;
         }


         $gastos = new Gastos();
         $totalGastos = $gastos->Gastos($id_sucursal, $fechainicio, $fechacierre);
         while ($row6 = $totalGastos->fetch_object()) {
            $gastoGenerado = (int) $row6->total;
         }

         $devolucion = new Devolucion();
         $totalDevolucion = $devolucion->DevolucionDiarias($id_sucursal, $fechainicio, $fechacierre);

         while ($row7 = $totalDevolucion->fetch_object()) {
            $devolucionTotal = (int) $row7->total;
         }

         $resultado1 = $montoentregado + $gastoGenerado + $devolucionTotal;
         $montoDiario = $ventatotal + $valorAbonos + $valortotalnoexitente + $valorAbonosPl + $totalOtros;

         $diferencia = $resultado1 - $montoDiario;

         $resp = TRUE;


         require_once 'views/ventas/confirmarcierre.php';
         require_once 'views/layout/copy.php';
      } else {
         echo'<script>

                     swal({
                               type: "error",
                               title: "¡No a Elegido una venta !",
                               showConfirmButton: true,
                               confirmButtonText: "Cerrar"
                               }).then(function(result){
                                     if (result.value) {

                                     window.location = "iniciarventa";

                                     }
                             })

             </script>';
      }
   }

   public function guardarcierre() {
      if ($_POST['id']) {
         date_default_timezone_set('America/Bogota');
         $id = $_POST['id'];
         $fechacierre = date('Y-m-d');
         $totalingresos = $_POST['ventatotal'];
         $totalgastos = $_POST['gastototal'];
         $otrosmedio = $_POST['otrosmedios'];
         $noexistente = $_POST['noexistente'];
         $plansepare = $_POST['abonosplancepare'];
         $abonocliente = $_POST['abonoscliente'];
         $devolucion = $_POST['devolucion'];
         $montoentregado = $_POST['montoentregado'];
         $diferencia = $_POST['diferencia'];
         $estado = 0;

         $cierre = new IniciarVenta();

         $cierre->setId($id);
         $cierre->setFechacierre($fechacierre);
         $cierre->setTotalingresos($totalingresos);
         $cierre->setMontoentregado($montoentregado);
         $cierre->setTotalgastos($totalgastos);
         $cierre->setOtrosmedio($otrosmedio);
         $cierre->setNoexistente($noexistente);
         $cierre->setPlansepare($plansepare);
         $cierre->setAbonocliente($abonocliente);
         $cierre->setDevolucion($devolucion);
         $cierre->setDiferencia($diferencia);
         $cierre->setEstado($estado);

         $resp = $cierre->CerrarVenta();


         if ($resp) {
            echo'<script>

					swal({
						  type: "success",
						  title: "Punto Venta cerrado Correctamente",
						   showConfirmButton: false,
                                                   timer: 1500,                                                   
						  }).then(function() {
                                                      window.location = "iniciarVenta";
                                                 })

					</script>';
         } else {
            echo'<script>

                        swal({
                           type: "error",
                           title: "¡No se pudo generar ciere de venta !",
                           showConfirmButton: true,
                           confirmButtonText: "Cerrar"
                           }).then(function(result){
                                 if (result.value) {

                                 window.location = "IniciarVenta";

                                 }
                         })

                </script>';
         }
      } else {
         echo'<script>

					swal({
						  type: "error",
						  title: "¡En cierre de venta !",
						  showConfirmButton: true,
						  confirmButtonText: "Cerrar"
						  }).then(function(result){
							if (result.value) {

							window.location = "IniciarVenta";

							}
						})

			  	</script>';
      }
   }

   public function Nuevaventa() {
      require_once 'views/layout/menu.php';
      require_once 'views/ventas/nuevaVenta.php';
      require_once 'views/layout/copy.php';
   }

   public function GuardarVenta() {


      if (isset($_POST['idcliente']) && !empty($_POST['idcliente'])) {
         date_default_timezone_set('America/Bogota');

         $id_sucursal = $_POST['idsucursal'];

         $datosParramentros = new Parametros();
         $datosParramentros->setId_sucursal($id_sucursal);
         $detallesParrametros = $datosParramentros->MostrarParrametro();

         while ($row1 = $detallesParrametros->fetch_object()) {
            $numFactura = $row1->num_inicio_factura;
         }

         //mostrar ultimo registro
         $venta = new Venta();
         $venta->setId_sucursal($id_sucursal);
         $ultimaventa = $venta->VerUltimaVenta();

         if ($ultimaventa->num_rows == 1) {
            while ($row2 = $ultimaventa->fetch_object()) {
               $ultinoNumFact = $row2->codigo;
            }
            $codigo = $ultinoNumFact + 1;
         } else {
            $codigo = $numFactura + 1;
         }
         //--------------

         $listaProductos = json_decode($_POST["listaProductos"], true);

         $UtilidadP = 0;

         foreach ($listaProductos as $key => $value) {


            $costo = $value['costo'];
            $cantidadV = $value['cantidad'];
            $subTotal = $value['subtotal'];
            $fechaventa = date('Y-m-d');

            $producto = new Inventario();
            $id_producto = $value["id"];

            //verificar componentes
            $componenete = new Componente();
            $componenete->setId_producto($id_producto);
            $detallesComponente = $componenete->verDetallesComponenteProducto();

            if ($detallesComponente->num_rows != 0) {

               while ($row3 = $detallesComponente->fetch_object()) {
                  $listComponente = json_decode($row3->detalles);
               }

               foreach ($listComponente as $key => $valueItem) {



                  $producto->setId_producto(intval($valueItem->id));
                  $respuestC = $producto->VercantidadProducto();



                  while ($row = $respuestC->fetch_object()) {
                     $cantidadP = intval($row->can_inicial);
                  }

                  $nuevCantP = $cantidadP - intval($valueItem->cantidad);

                  $producto->setCantidad_Inicial($nuevCantP);
                  $producto->ActulizarStock();
               }
            }


            $producto->setId_producto($id_producto);
            $respuest = $producto->VercantidadProducto();

            while ($row = $respuest->fetch_object()) {
               $cantidad = $row->can_inicial;
            }

            $nuevCantidad = $cantidad - $cantidadV;

            $producto->setCantidad_Inicial($nuevCantidad);
            $producto->ActulizarStock();

            $productoVenta = new VentaProduto();

            $productoVenta->setId_sucursal($id_sucursal);
            $productoVenta->setId_producto($id_producto);
            $productoVenta->setCantidad($cantidadV);
            $productoVenta->setNum_factura($codigo);
            $productoVenta->setFecha($fechaventa);

            $productoVenta->VentaProductoRealizada();


            $costoTotalProducto = $costo * $cantidadV;
            $UtilidadP = $subTotal - $costoTotalProducto;
            $array[] = array('idProducto' => $id_producto, 'valor' => $UtilidadP);
         }

         $valorUtilida = array_column($array, 'valor');
         $TotalUtilidad = array_sum($valorUtilida);


         $valorVenta = (int) $_POST['totalVenta'];
         $detalle_venta = $_POST["listaProductos"];

         $id_cliente = (int) $_POST['idcliente'];

         $compraCliente = new CompraCliente();
         $compraCliente->setId_sucursal($id_sucursal);
         $compraCliente->setId_cliente($id_cliente);
         $compraCliente->setValor($valorVenta);
         $compraCliente->setFecha($fechaventa);
         $compraCliente->setNum_factura($codigo);
         $compraCliente->NuevaCompraRealizada();



         $tipo = (int) $_POST['tipoventa'];

         if ($tipo == 1) {
            $id_plazo = $_POST['plazos'];

            if ($id_plazo) {
               $plazoinf = new Plazo();
               $plazoinf->setId($id_plazo);
               $detallesPlazo = $plazoinf->MostrarPlazoId();

               while ($row3 = $detallesPlazo->fetch_object()) {
                  $dias = $row3->num_dias;
               }
            } else {
               $dias = 30;
            }


            $fecha = $_POST['fecha'];
            $fechaActual = strtotime('+' . $dias . ' day', strtotime($fecha));
            $fecha_vencimiento = date('Y-m-d', $fechaActual);
            $saldo = $valorVenta;
         } else {
            $fecha = $_POST['fecha'];
            $fecha_vencimiento = date('Y-m-d');
            $id_plazo = 0;
            $saldo = $valorVenta;
         }
         //date_default_timezone_set('America/Bogota');

         $fechaActualFact = $fecha;
         $horaFactura = date('H:i:s');
         $venta->setCodigo($codigo);
         $venta->setId_sucursal($id_sucursal);
         $venta->setFecha($fechaActualFact);
         $venta->setHora($horaFactura);
         $venta->setTipo($tipo);
         $venta->setId_plazo($id_plazo);
         $venta->setFecha_vencimiento($fecha_vencimiento);
         $venta->setId_cliente($id_cliente);
         $venta->setDetalle_venta($detalle_venta);
         $venta->setTotal($valorVenta);
         $venta->setSaldo($saldo);
         $venta->setUtilidad($TotalUtilidad);
         //var_dump($venta);

         $resp = $venta->GuardarVenta();

         if ($resp) {
            echo'  <script>

					swal({
						  type: "success",
						  title: "Venta Guardada Correctamente",
						  showConfirmButton: false,
						   timer: 1500,                                                   
						  }).then(function() {
                                                window.location = "nuevaventa";
                                            })

					</script>';
         } else {

            foreach ($listaProductos as $key => $value) {


               $costo = $value['costo'];
               $cantidadV = $value['cantidad'];
               $subTotal = $value['subtotal'];
               $fechaventa = date('Y-m-d');

               $producto = new Inventario();
               $id_producto = $value["id"];

               //verificar componentes
               $componenete = new Componente();
               $componenete->setId_producto($id_producto);
               $detallesComponente = $componenete->verDetallesComponenteProducto();

               if ($detallesComponente->num_rows != 0) {

                  while ($row3 = $detallesComponente->fetch_object()) {
                     $listComponente = json_decode($row3->detalles);
                  }

                  foreach ($listComponente as $key => $valueItem) {



                     $producto->setId_producto(intval($valueItem->id));
                     $respuestC = $producto->VercantidadProducto();



                     while ($row = $respuestC->fetch_object()) {
                        $cantidadP = intval($row->can_inicial);
                     }

                     $nuevCantP = $cantidadP - intval($valueItem->cantidad);

                     $producto->setCantidad_Inicial($nuevCantP);
                     $producto->ActulizarStock();
                  }
               }


               $producto->setId_producto($id_producto);
               $respuest = $producto->VercantidadProducto();

               while ($row = $respuest->fetch_object()) {
                  $cantidad = $row->can_inicial;
               }

               $nuevCantidad = $cantidad + $cantidadV;

               $producto->setCantidad_Inicial($nuevCantidad);
               $producto->ActulizarStock();

               $productoVenta = new VentaProduto();
               $productoVenta->setNum_factura($codigo);

               $productoVenta->EliminarV();
            }

            echo'<script>

					swal({
						  type: "error",
						  title: "¡Registro no Guardado !",
						   showConfirmButton: false,
                                                   timer: 1500,                                                   
						  }).then(function() {
                                                window.location = "nuevaventa";
                                            });

			  	</script>';
         }
      } else {
         echo'<script>

					swal({
						  type: "error",
						  title: "¡No se puede guardar la ventas si seleccionar el cliente!",
						  showConfirmButton: false,
						   timer: 1500,                                                   
						  }).then(function() {
                                                window.location = "nuevaventa";
                                            });

		</script>';
      }
   }

   public function cobrarVenta() {
      require_once 'views/layout/menu.php';
      require_once 'views/ventas/pagoventa.php';
      require_once 'views/layout/copy.php';
   }

   public function pagarFactura() {
      if (isset($_POST['id'])) {

         $id = $_POST['id'];
         $valor = $_POST['valor'];

         $venta = new Venta();
         $venta->setId($id);
         $detalles = $venta->MostrarVentasId();

         while ($row = $detalles->fetch_object()) {
            $valorfactura = (int) $row->total;
         }
         if ($valor >= $valorfactura) {
            $nuevoSaldo = 0;
         } else {
            $nuevoSaldo = $valorfactura - (int) $valor;
         }

         $venta->setSaldo($nuevoSaldo);
         $resp = $venta->Abonar();
         if ($resp) {
            echo'<script>

                     swal({
                           type: "success",
                           title: "Venta cobrada Correctamente",
                           showConfirmButton: false,
                           timer: 1500,                                                   
                          }).then(function() {
                        window.location = "nuevaventa";
                    });

                 </script>';
         } else {
            echo'<script>

                     swal({
                               type: "error",
                               title: "¡Registro no Guardado !",
                               showConfirmButton: false,
                              timer: 1500,                                                   
                             }).then(function() {
                           window.location = "nuevaventa";
                       });

             </script>';
         }
      }
   }

   static public function valorventa($id) {
      $venta = new Venta();
      $venta->setId($id);
      $detalles = $venta->MostrarVentasId();
      return $detalles;
   }

   public function verdetallesVentafactura() {

      if (isset($_GET['id']) && !empty($_GET['id'])) {

         require_once 'views/layout/menu.php';

         $id = $_GET['id'];
         $ventas = new Venta();
         $ventas->setId($id);
         $destallesVenta = $ventas->VerVenta();

         require_once 'views/ventas/verfactura.php';
         require_once 'views/layout/copy.php';
      } else {
         echo'<script>
                     swal({
                           type: "error",
                           title: "¡No a Elegido una venta !",
                           showConfirmButton: true,
                           confirmButtonText: "Cerrar"
                           }).then(function(result){
                                 if (result.value) {

                                 window.location = "listarventas";

                                 }
                         })

             </script>';
      }
   }

   public function EditarVenta() {

      if (isset($_GET['id']) && !empty($_GET['id'])) {

         require_once 'views/layout/menu.php';

         $id = $_GET['id'];
         $ventas = new Venta();
         $ventas->setId($id);
         $destallesVenta = $ventas->VerVenta();

         require_once 'views/ventas/editarVenta.php';
         require_once 'views/layout/copy.php';
      } else {
         echo'<script>
                     swal({
                           type: "error",
                           title: "¡No a Elegido una venta !",
                           showConfirmButton: true,
                           confirmButtonText: "Cerrar"
                           }).then(function(result){
                                 if (result.value) {

                                 window.location = "listarventas";

                                 }
                         })

             </script>';
      }
   }

   public function ActulizarVenta() {


      if ($_POST['idVenta']) {
         //var_dump($_POST);

         $datosParramentros = new Parametros();

         $id_sucursal = $_POST['idsucursal'];

         $id_venta = $_POST['idVenta'];
         //ver la venta anterios
         $ventAnt = new Venta();
         $ventAnt->setId($id_venta);
         $ventaAn = $ventAnt->VerVenta();

         while ($row = $ventaAn->fetch_object()) {
            $listProductos = $row->detalle_venta;
            $num_factura = $row->codigo;
         }
         //eliminar los productos de la venta a modificar
         $ventaProd = new VentaProduto();
         $ventaProd->setNum_factura($num_factura);
         $ventaProd->EliminarV();

         //actulizando la compra del cliente
         $valor = (int) $_POST['totalVenta'];
         $compraCliente = new CompraCliente();
         $compraCliente->setNum_factura($num_factura);
         $compraCliente->setValor($valor);
         $compraCliente->ActulizarCompraRealizada();

         $listaProductos = json_decode($listProductos, true);
         //actulizamos los productos modidicados
         foreach ($listaProductos as $key => $value) {

            $producto = new Inventario();
            $id_producto = $value["id"];

            $componenete = new Componente();
            $componenete->setId_producto($id_producto);


            $detallesComponente = $componenete->verDetallesComponenteProducto();

            if ($detallesComponente->num_rows != 0) {

               while ($row3 = $detallesComponente->fetch_object()) {
                  $listComponente = json_decode($row3->detalles);
               }

               foreach ($listComponente as $key => $valueItem) {


                  // $idProdComp = intval($valueItem['id']);
                  //var_dump($valueItem['id']);

                  $producto->setId_producto(intval($valueItem->id));
                  $respuestC = $producto->VercantidadProducto();



                  while ($row = $respuestC->fetch_object()) {
                     $cantidadP = intval($row->can_inicial);
                  }

                  $nuevCantP = $cantidadP + intval($valueItem->cantidad);

                  $producto->setCantidad_Inicial($nuevCantP);
                  $producto->ActulizarStock();
               }
            }


            $producto->setId_producto($id_producto);
            $respuest = $producto->VercantidadProducto();

            while ($row = $respuest->fetch_object()) {
               $cantidad = $row->can_inicial;
            }
            $nuevCantidad = $cantidad + $value['cantidad'];

            $producto->setCantidad_Inicial($nuevCantidad);
            $producto->ActulizarStock();
         }
         //fin de actulizar productos
         if ($_POST["listaProductos"] == '') {
            $detalle_venta = $listProductos;
         } else {
            $detalle_venta = $_POST["listaProductos"];
         }
         $listaProductos = json_decode($detalle_venta, true);
         //modificando las cantidades de los productos		
         $UtilidadP = 0;
         foreach ($listaProductos as $key => $value) {


            $id_producto = $value["id"];

            $componenete = new Componente();
            $componenete->setId_producto($id_producto);

            $detallesComponente = $componenete->verDetallesComponenteProducto();

            if ($detallesComponente->num_rows != 0) {

               while ($row3 = $detallesComponente->fetch_object()) {
                  $listComponente = json_decode($row3->detalles);
               }


               foreach ($listComponente as $key => $valueItem) {


                  // $idProdComp = intval($valueItem['id']);
                  //var_dump($valueItem['id']);

                  $producto->setId_producto(intval($valueItem->id));
                  $respuestC = $producto->VercantidadProducto();



                  while ($row = $respuestC->fetch_object()) {
                     $cantidadP = intval($row->can_inicial);
                  }

                  $nuevCantP = $cantidadP - intval($valueItem->cantidad);

                  $producto->setCantidad_Inicial($nuevCantP);
                  $producto->ActulizarStock();
               }
            }


            $costo = $value['costo'];
            $cantidadV = $value['cantidad'];
            $subTotal = $value['subtotal'];
            $fechaventa = date('y-m-d');

            $producto = new Inventario();
            $id_producto = $value["id"];

            $producto->setId_producto($id_producto);
            $respuest = $producto->VercantidadProducto();
            while ($row = $respuest->fetch_object()) {
               $cantidad = $row->can_inicial;
            }

            $nuevCantidad = $cantidad - $cantidadV;

            $producto->setCantidad_Inicial($nuevCantidad);
            $producto->ActulizarStock();

            $productoVenta = new VentaProduto();
            $productoVenta->setId_sucursal($id_sucursal);
            $productoVenta->setId_producto($id_producto);
            $productoVenta->setCantidad($cantidadV);
            $productoVenta->setNum_factura($num_factura);
            $productoVenta->setFecha($fechaventa);

            $productoVenta->VentaProductoRealizada();


            $costoTotalProducto = $costo * $cantidadV;
            $UtilidadP = $subTotal - $costoTotalProducto;
            $array[] = array('idProducto' => $id_producto, 'valor' => $UtilidadP);
         }
         $valorUtilida = array_column($array, 'valor');
         $TotalUtilidad = array_sum($valorUtilida);


         $valorVenta = (int) $_POST['totalVenta'];


         $tipo = (int) $_POST['tipoventa'];

         if ($tipo == 1) {
            $id_plazo = $_POST['plazos'];

            $plazoinf = new Plazo();
            $plazoinf->setId($id_plazo);
            $detallesPlazo = $plazoinf->MostrarPlazoId();

            while ($row3 = $detallesPlazo->fetch_object()) {
               $dias = $row3->num_dias;
            }

            $fecha = $_POST['fecha'];
            $fechaActual = strtotime('+' . $dias . ' day', strtotime($fecha));
            $fecha_vencimiento = date('Y-m-d', $fechaActual);
            $saldo = $valorVenta;
         } else {
            $fecha = $_POST['fecha'];
            $fecha_vencimiento = date('Y-m-d');
            $id_plazo = 0;
            $saldo = 0;
         }
         date_default_timezone_set('America/Bogota');
         $fechaActualFact = $_POST['fecha'];
         $horaFactura = date('H:i:s');

         $id_cliente = (int) $_POST['idcliente'];

         $venta = new Venta();
         $venta->setId($id_venta);
         $venta->setId_cliente($id_cliente);
         $venta->setFecha($fechaActualFact);
         $venta->setHora($horaFactura);
         $venta->setTipo($tipo);
         $venta->setId_plazo($id_plazo);
         $venta->setFecha_vencimiento($fecha_vencimiento);
         $venta->setDetalle_venta($detalle_venta);
         $venta->setTotal($valorVenta);
         $venta->setUtilidad($TotalUtilidad);
         $venta->setSaldo($saldo);
         $resp = $venta->Actulizar();

         if ($resp) {
            echo'<script>

					swal({
						  type: "success",
						  title: "Venta Actulizada Correctamente",
						  showConfirmButton: false,
						   timer: 1500,                                                   
						  }).then(function() {
                                                window.location = "listarventas";
                                            });

					</script>';
         } else {
            echo'<script>

					swal({
						  type: "error",
						  title: "¡Registro no Guardado !",
						  showConfirmButton: false,
						   timer: 1500,                                                   
						  }).then(function() {
                                                window.location = "listarventas";
                                            });

			  	</script>';
         }
      }
   }

   public function EliminarVenta() {

      if (isset($_GET['id'])) {
         $datosParramentros = new Parametros();
         $detallesParrametros = $datosParramentros->MostrarParrametro();


         $id_venta = $_GET['id'];
         //eliminar abonos aplicados
         $abonoFactura = new AbonosCliente();
         $abonoFactura->setId_factura($id_venta);
         $abonoFactura->EliminarbonoIdFactura();
         
         
         //ver la venta anterios
         $ventAnt = new Venta();
         $ventAnt->setId($id_venta);
         $ventaAn = $ventAnt->VerVenta();

         while ($row = $ventaAn->fetch_object()) {
            $listProductos = $row->detalle_venta;
            $num_factura = $row->codigo;
         }
         //eliminar los productos de la venta a modificar
         $ventaProd = new VentaProduto();
         $ventaProd->setNum_factura($num_factura);
         $ventaProd->EliminarV();

         //eliminando la compra del cliente			
         $compraCliente = new CompraCliente();
         $compraCliente->setNum_factura($num_factura);
         $compraCliente->EliminarVenta();

         $listaProductos = json_decode($listProductos, true);

         foreach ($listaProductos as $key => $value) {

            $producto = new Inventario();
            $id_producto = $value["id"];

            $producto->setId_producto($id_producto);
            $respuest = $producto->VercantidadProducto();

            while ($row = $respuest->fetch_object()) {
               $cantidad = $row->can_inicial;
            }
            $nuevCantidad = $cantidad + $value['cantidad'];

            $producto->setCantidad_Inicial($nuevCantidad);
            $rs = $producto->ActulizarStock();
         }

         $venta = new Venta();
         $venta->setId($id_venta);
         $resp = $venta->EliminarVenta();
         if ($resp) {
            echo'<script>

					swal({
						  type: "success",
						  title: "Venta Eliminada Correctamente",
						  showConfirmButton: false,
						   timer: 1500,                                                   
						  }).then(function() {
                                                window.location = "listarventas";
                                            });

					</script>';
         } else {
            echo'<script>

					swal({
						  type: "error",
						  title: "¡Registro no Eliminado !",
						  showConfirmButton: false,
						   timer: 1500,                                                   
						  }).then(function() {
                                                window.location = "listarventas";
                                            });

			  	</script>';
         }
      }
   }

   static public function Verventa($codigo) {
      $cod = $codigo;
      $verVenta = new Venta();
      $verVenta->setCodigo($codigo);
      $datoventa = $verVenta->VerVentaCodigo();
      return $datoventa;
   }

   public function ReporteVentas() {
      require_once 'views/layout/menu.php';

      if (isset($_GET["fechaInicial"])) {
         $id = $_GET['id'];
         $fechaInicial = $_GET["fechaInicial"];
         $fechaFinal = $_GET["fechaFinal"];

         $ventas = new Venta();
         $listaVentas = $ventas->ReportesVentas($id, $fechaInicial, $fechaFinal);
      }


      require_once 'views/ventas/reporteVenta.php';
      require_once 'views/layout/copy.php';
   }

   static public function TotalVentas() {
      $ventas = new Venta();
      $TotalVentas = $ventas->MostrarSumaVentas();
      return $TotalVentas;
   }

   static public function VerVentaId($id) {
      $venta = new Venta();
      $venta->setId($id);
      $detalles = $venta->MostrarVentasId();
      return $detalles;
   }

   static public function ventaDelDia($id_sucursal) {

      date_default_timezone_set('America/Bogota');
      $ventas = new Venta();

      $fechainicio = date('Y-m-d');
      $fechacierre = date('Y-m-d');

      $totalVentas = $ventas->Ventas($id_sucursal, $fechainicio, $fechacierre);


      while ($row1 = $totalVentas->fetch_object()) {
         $ventatotal = (int) $row1->total;
      }

      $abonos = new AbonosCliente();
      $totalAbonos = $abonos->AbonosDiarios($id_sucursal, $fechainicio, $fechacierre);

      while ($row3 = $totalAbonos->fetch_object()) {
         $valorAbonos = (int) $row3->total;
      }

      $abonoPlansepare = new AbonosPlanSepare();
      $totalAbonosPl = $abonoPlansepare->AbonosDiarios($id_sucursal, $fechainicio, $fechacierre);

      while ($row4 = $totalAbonosPl->fetch_object()) {
         $valorAbonosPl = (int) $row4->total;
      }

      $datanoexistente = new NoExistente();
      $totaldatanoexistente = $datanoexistente->recibidos($id_sucursal, $fechainicio, $fechacierre);

      while ($row5 = $totaldatanoexistente->fetch_object()) {
         $valortotalnoexitente = $row5->total;
      }

      $total = $ventatotal + $valorAbonos + $valorAbonosPl + $valortotalnoexitente;


      return $total;
   }

}
