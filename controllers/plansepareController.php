<?php

require_once 'models/Inventario.php';
require_once 'models/Parametros.php';
require_once 'models/Cliente.php';
require_once 'models/PlanSepare.php';
require_once 'models/AbonosPlanSepare.php';

class plansepareController {

   public function listar() {
      require_once 'views/layout/menu.php';
      require_once 'views/plansepare/index.php';
      require_once 'views/layout/copy.php';
   }

   static public function plancepareSucursal($id_sucursal) {
      $resul = new PlanSepare();
      $resul->setId_sucursal($id_sucursal);
      $listaVentas = $resul->Mostrar();
      return $listaVentas;
   }
   
    static public function plansepareId($id) {
      $resul = new PlanSepare();
      $resul->setId($id);
      $detalles = $resul->MostrarId();
      return $detalles;
   }

   public function nuevo() {
      require_once 'views/layout/menu.php';
      require_once 'views/plansepare/plansepare.php';
      require_once 'views/layout/copy.php';
   }

   public function Guardar() {

      if (isset($_POST['idcliente']) && !empty($_POST['idcliente'])) {

         $id_sucursal = $_POST['idsucursal'];

         $datosParramentros = new Parametros();
         $datosParramentros->setId_sucursal($id_sucursal);
         $detallesParrametros = $datosParramentros->MostrarParrametro();

         while ($row1 = $detallesParrametros->fetch_object()) {
            $numFactura = $row1->num_plansepare;
         }


         $venta = new PlanSepare();
         $venta->setId_sucursal($id_sucursal);
         $ultima = $venta->VerUltima();

         if ($ultima->num_rows == 1) {
            while ($row2 = $ultima->fetch_object()) {
               $ultinoNumFact = $row2->codigo;
            }
            $codigo = $ultinoNumFact + 1;
         } else {
            $codigo = $numFactura + 1;
         }


         $valorVenta = (int) $_POST['totalVenta'];
         $detalle = $_POST["listaProductos"];

         $id_cliente = (int) $_POST['idcliente'];

         $meses = (int) $_POST['meses'];

         if (!empty($meses)) {
            $dias = $meses * 30;
         }


         $fecha =  $_POST['fecha'];
         $fechaActual = strtotime('+' . $dias . ' day', strtotime($fecha));
         $fecha_vencimiento = date('Y-m-d', $fechaActual);

         date_default_timezone_set('America/Bogota');

         $fechaActualFact = $fecha;
         $horaFactura = date('H:i:s');
         $venta->setCodigo($codigo);
         $venta->setId_sucursal($id_sucursal);
         $venta->setFecha($fechaActualFact);
         $venta->setPlazo($meses);
         $venta->setFecha_vencimiento($fecha_vencimiento);
         $venta->setId_cliente($id_cliente);
         $venta->setDetalle($detalle);
         $venta->setTotal($valorVenta);
         $venta->setSaldo($valorVenta);
            
         $resp = $venta->Guardar();
        
         if ($resp) {
            echo'<script>

					swal({
						  type: "success",
						  title: "Registro Guardado",
						  showConfirmButton: true,
						  confirmButtonText: "Cerrar"
						  }).then(function(result){
							if (result.value) {

							window.location = "listar";

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

							window.location = "listar";

							}
						})

			  	</script>';
         }
      } else {
         echo'<script>

					swal({
						  type: "error",
						  title: "¡No se puede guardar sin seleccionar el cliente!",
						  showConfirmButton: true,
						  confirmButtonText: "Cerrar"
						  }).then(function(result){
							if (result.value) {

							window.location = "listar";

							}
						})

		</script>';
      }
   }
   public function editar() {
        require_once 'views/layout/menu.php';
      $id = $_GET['id'];
       $resul = new PlanSepare();
       $resul->setId($id);
       $detalles = $resul->MostrarId();
           
      require_once 'views/plansepare/editar.php';
      require_once 'views/layout/copy.php';
       
   }
   public function actulizar() {
      
      if (isset($_POST['idcliente']) && !empty($_POST['idcliente'])) {

         $id_sucursal = $_POST['idsucursal'];
         $id = $_POST['id'];
         
         
         $valorVenta = (int) $_POST['totalVenta'];
         $detalle = $_POST["listaProductos"];

         $id_cliente = (int) $_POST['idcliente'];

         $meses = (int) $_POST['meses'];

         if (!empty($meses)) {
            $dias = $meses * 30;
         }


         $fecha =  $_POST['fecha'];
         $fechaActual = strtotime('+' . $dias . ' day', strtotime($fecha));
         $fecha_vencimiento = date('Y-m-d', $fechaActual);
         
         
         $abono = new AbonosPlanSepare();
         $abono->setId_factura($id);
         $abonorelizados = $abono->TotalAbonosId();
         
         if($abonorelizados){
            while ($row = $abonorelizados->fetch_object()) {
               $valorabonosrealizados = (int) $row->totalabono;
               $saldo = $valorVenta - $valorabonosrealizados;
            }
         }else{
            $saldo = $valorVenta;
         }
        
  

         date_default_timezone_set('America/Bogota');

         $fechaActualFact = $fecha;
         $horaFactura = date('H:i:s');
         
         $venta = new PlanSepare();
         $venta->setId($id);
         $venta->setFecha($fechaActualFact);
         $venta->setPlazo($meses);
         $venta->setFecha_vencimiento($fecha_vencimiento);
         $venta->setId_cliente($id_cliente);
         $venta->setDetalle($detalle);
         $venta->setTotal($valorVenta);
         $venta->setSaldo($saldo);
            
         $resp = $venta->Actulizar();
     
         if ($resp) {
            echo'<script>

					swal({
						  type: "success",
						  title: "Registro Guardado",
						  showConfirmButton: true,
						  confirmButtonText: "Cerrar"
						  }).then(function(result){
							if (result.value) {

							window.location = "listar";

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

							window.location = "listar";

							}
						})

			  	</script>';
         }
      } else {
         echo'<script>

					swal({
						  type: "error",
						  title: "¡No se puede guardar sin seleccionar el cliente!",
						  showConfirmButton: true,
						  confirmButtonText: "Cerrar"
						  }).then(function(result){
							if (result.value) {

							window.location = "nuevaventa";

							}
						})

		</script>';
      }
   }
   
   public function Eliminar() {
      if (isset($_GET['id'])) {

         $id = $_GET['id'];
         $resul = new PlanSepare();
         $resul->setId($id);
         
    
         
         $abonos = new AbonosPlanSepare();
         $abonos->setId($id);
         $abonos->Eliminarbono();
         
         $resp = $resul->Eliminar();
         
         if ($resp) {
            echo'<script>

                  swal({
                            type: "success",
                            title: "Registro Eliminada Correctamente",
                            showConfirmButton: true,
                            confirmButtonText: "Cerrar"
                            }).then(function(result){
                                  if (result.value) {

                                  window.location = "listar";

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

							window.location = "listar";

							}
						})

			  	</script>';
         }
      }
   }
   
   public function ver() {
      require_once 'views/layout/menu.php';
      if (isset($_GET['id'])) {
         $id= $_GET['id'];
         $cuenta = new PlanSepare();
         $cuenta->setId($id);
         $detalles = $cuenta->verPlanSepare();
         $listaEstado = $cuenta->verPlanSepare();
      } else {
         echo'<script>

					swal({
						  type: "error",
						  title: "¡Debe selecionar cliente!",
						  showConfirmButton: true,
						  confirmButtonText: "Cerrar"
						  }).then(function(result){
							if (result.value) {

							window.location = "listar";

							}
						})

			  	</script>';
      }
      require_once 'views/plansepare/ver.php';
      require_once 'views/layout/copy.php';
   }
   public function abonar() {
      require_once 'views/layout/menu.php';
      if (isset($_GET['id'])) {
         $id = $_GET['id'];
         $cuenta = new PlanSepare();
         $cuenta->setId($id);
         $listaEstado = $cuenta->Ver();
      } else {
         echo'<script>

					swal({
						  type: "error",
						  title: "¡Debe selecionar cliente!",
						  showConfirmButton: true,
						  confirmButtonText: "Cerrar"
						  }).then(function(result){
							if (result.value) {

							window.location = "index";

							}
						})

			  	</script>';
      }


      require_once 'views/plansepare/abonarfactura.php';
      require_once 'views/layout/copy.php';
   }

   public function guardarabono() {
      if (isset($_POST['id'])) {

         $id_factura = $_POST['id'];
         $id_sucursal = $_POST['idsucursal'];
         $valor = (int) $_POST['valor'];
         $descripcion = $_POST['descripcion'];
         $fecha = $_POST['fecha'];
        

         if ($id_factura && $valor && $fecha) {
            $saldoVenta = new PlanSepare();
            $saldoVenta->setId($id_factura);
            
            $valorSald = $saldoVenta->Ver();

            while ($row = $valorSald->fetch_object()) {
               $saldoPendiente = (int) $row->saldo;
            }
            if ($saldoPendiente > $valor) {

               $nuevoSaldo = $saldoPendiente - $valor;
               $newAbono = new PlanSepare();
               $newAbono->setId($id_factura);
               $newAbono->setSaldo($nuevoSaldo);
               $reptA = $newAbono->Abonar();

               $abono = new AbonosPlansepare();
               $abono->setId_factura($id_factura);
               $abono->setId_sucursal($id_sucursal);
               $abono->setValor($valor);
               $abono->setDescripcion($descripcion);
               $abono->setFecha($fecha);
 
               $reptB = $abono->RegistrarAbono();
              
               
            
               if ($reptA && $reptB) {
                  echo'<script>

						swal({
							  type: "success",
							  title: "Abono registrado Correctamente",
							  showConfirmButton: true,
							  confirmButtonText: "Cerrar"
							  }).then(function(result){
								if (result.value) {

								window.location = "abonos&id=' . $_POST['id'] . '";

								}
							})

						</script>';
               }
            } else {
               echo'<script>

						swal({
							  type: "warning",
							  title: "¡El abono es superior al saldo pendiente!",
							  showConfirmButton: true,
							  confirmButtonText: "Cerrar"
							  }).then(function(result){
								if (result.value) {

								window.location = "abonarfactura&id=' . $_POST['id'] . '";

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

								window.location = "editarabono&id=' . $id_factura . '";

								}
							})

				</script>';
         }
      }
   }

   public function abonos() {
      require_once 'views/layout/menu.php';
      if (isset($_GET['id'])) {

         $id_factura = $_GET['id'];

         $abonos = new AbonosPlanSepare();
         $abonos->setId_factura($id_factura);
         $listaAbono = $abonos->MostrarAbonosId();

         $saldoCompra = new PlanSepare();
         $saldoCompra->setId($id_factura);
         $valorSald = $saldoCompra->Ver();
      } else {
         echo'<script>

					swal({
						  type: "error",
						  title: "¡Debe selecionar una factura !",
						  showConfirmButton: true,
						  confirmButtonText: "Cerrar"
						  }).then(function(result){
							if (result.value) {

							window.location = "estadocuentacliente";

							}
						})

			  	</script>';
      }
      require_once 'views/plansepare/abonosfactura.php';
      require_once 'views/layout/copy.php';
   }

   public function editarAbono() {
      require_once 'views/layout/menu.php';
      if (isset($_GET['id'])) {
         $id = $_GET['id'];
         $abono = new AbonosPlanSepare();
         $abono->setId($id);
         $DatosAbono = $abono->VerAbonoId();
      } else {
         echo'<script>

					swal({
						  type: "error",
						  title: "¡Debe selecionar una factura !",
						  showConfirmButton: true,
						  confirmButtonText: "Cerrar"
						  }).then(function(result){
							if (result.value) {

							window.location = "estadocuentacliente";

							}
						})

			  	</script>';
      }
      require_once 'views/plansepare/editarabonos.php';
      require_once 'views/layout/copy.php';
   }

   public function ActualizarAbono() {
      if ($_POST['id']) {

         $id = isset($_POST['id']) ? $_POST['id'] : FALSE;
         $abonoValor = isset($_POST['valor']) ? $_POST['valor'] : FALSE;
         $descripcion = $_POST['descripcion'];
         $fecha = isset($_POST['fecha']) ? $_POST['fecha'] : FALSE;
         if ($id && $abonoValor && $fecha) {
            $abono = new AbonosPlanSepare();
            $abono->setId($id);
            $DatosAbono = $abono->VerAbonoId();

            while ($row = $DatosAbono->fetch_object()) {
               $id_venta = $row->id_registro;
               $abonoanterior = (int) $row->valor;
            }

            $plansepare = new PlanSepare();
            $plansepare->setId($id_venta);
            $datoPlansepare = $plansepare->MostrarId();

            while ($row1 = $datoPlansepare->fetch_object()) {
               $saldo = (int) $row1->saldo;
            }
            $nuevosaldo = $saldo + $abonoanterior;

            if ($saldo >= $abonoValor) {

               $plansepare->setSaldo($nuevosaldo);
               $plansepare->Abonar();

               $nuevovalorA = $nuevosaldo - (int) $abonoValor;

               $plansepare->setSaldo($nuevovalorA);
               $plansepare->Abonar();

               $abono->setId($id);
               $abono->setValor($abonoValor);
               $abono->setDescripcion($descripcion);
               $abono->setFecha($fecha);
               $respt = $abono->EditarAbono();
               if ($respt) {
                  echo'<script>

						swal({
							  type: "success",
							  title: "Abono actualizado Correctamente",
							  showConfirmButton: true,
							  confirmButtonText: "Cerrar"
							  }).then(function(result){
								if (result.value) {

								window.location = "abonos&id=' . $id_venta . '";

								}
							})

						</script>';
               } else {
                  echo'<script>

						swal({
							  type: "error",
							  title: "¡No se pudo registar abono!",
							  showConfirmButton: true,
							  confirmButtonText: "Cerrar"
							  }).then(function(result){
								if (result.value) {

								window.location = "abonos&id=' . $id_venta . '";

								}
							})

					</script>';
               }
            } else {
               echo'<script>

						swal({
							  type: "warning",
							  title: "¡El abono es superior al saldo pendiente!",
							  showConfirmButton: true,
							  confirmButtonText: "Cerrar"
							  }).then(function(result){
								if (result.value) {

								window.location = "editarabono&id=' . $_POST['id'] . '";

								}
							})

					</script>';
            }
         } else {
            echo'<script>

						swal({
							  type: "warning",
							  title: "¡No debes tener campos vacios!",
							  showConfirmButton: true,
							  confirmButtonText: "Cerrar"
							  }).then(function(result){
								if (result.value) {

								window.location = "editarabono&id=' . $_POST['id'] . '";

								}
							})

				</script>';
         }
      } else {
         echo'<script>

					swal({
						  type: "error",
						  title: "¡Debe selecionar una factura para realizar el pago!",
						  showConfirmButton: true,
						  confirmButtonText: "Cerrar"
						  }).then(function(result){
							if (result.value) {

							window.location = "listado";

							}
						})

			  	</script>';
      }
   }

   public function EliminarAbono() {
      if ($_GET['id']) {

         $id = $_GET['id'];


         $abono = new AbonosPlanSepare();
         $abono->setId($id);
         $DatosAbono = $abono->VerAbonoId();

         while ($row = $DatosAbono->fetch_object()) {
            $id_venta = $row->id_registro;
            $abonoanterior = (int) $row->valor;
         }

         $plansepare = new PlanSepare();
         $plansepare->setId($id_venta);
         $datoVenta = $plansepare->MostrarId();

         while ($row1 = $datoVenta->fetch_object()) {
            $saldo = (int) $row1->saldo;
         }
         $nuevosaldo = $saldo + $abonoanterior;

         $plansepare->setSaldo($nuevosaldo);
         $plansepare->Abonar();

         $abono->setId($id);

         $respt = $abono->Eliminarbono();

         if ($respt) {
            echo'<script>

					swal({
						  type: "success",
						  title: "Abono Eliminado Correctamente",
						  showConfirmButton: true,
						  confirmButtonText: "Cerrar"
						  }).then(function(result){
							if (result.value) {

							window.location = "abonos&id=' . $id_venta . '";

							}
						})

					</script>';
         } else {
            
         }
      } else {
         echo'<script>

					swal({
						  type: "error",
						  title: "¡Debe selecionar pago relizado !",
						  showConfirmButton: true,
						  confirmButtonText: "Cerrar"
						  }).then(function(result){
							if (result.value) {

							window.location = "listar";

							}
						})

			  	</script>';
      }
   }

}
