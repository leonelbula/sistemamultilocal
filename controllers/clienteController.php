<?php

require_once 'models/Cliente.php';
require_once 'models/Venta.php';
require_once 'models/AbonosCliente.php';

class ClienteController {

   public function Index() {
      require_once 'views/layout/menu.php';
      $cliente = new Cliente();
      $listaCliente = $cliente->listarClientes();
      require_once 'views/cliente/listaclientes.php';
      require_once 'views/layout/copy.php';
   }

   static public function MostrarCliente() {
      $cliente = new Cliente();
      $listaCliente = $cliente->listarClientes();
      return $listaCliente;
   }

   static public function MostrarClienteId($id) {
      $cliente = new Cliente();
      $cliente->setId($id);
      $listaCliente = $cliente->listarClienteId();
      return $listaCliente;
   }

   public function registrar() {
      require_once 'views/layout/menu.php';
      require_once 'views/cliente/registrar.php';
      require_once 'views/layout/copy.php';
   }

   public function editar() {
      require_once 'views/layout/menu.php';
      if (isset($_GET['id'])) {
         $id = $_GET['id'];
         $cliente = new Cliente();
         $cliente->setId($id);
         $detallesCliente = $cliente->listarClienteId();
         require_once 'views/cliente/editar.php';
         require_once 'views/layout/copy.php';
      } else {
         echo'<script>

					swal({
						  type: "error",
						  title: "¡Debe selecionar cliente a Editar!",
						  showConfirmButton: false,
                           timer: 1500,                                                   
                            }).then(function() {
                                  window.location = "index";
                            })

			  	</script>';
      }
   }

   public function Guardar() {
      if ($_POST) {
         $id_sucursal = isset($_POST['idsucursal']) ? $_POST['idsucursal'] : FALSE;
         $nombre = isset($_POST['nombre']) ? $_POST['nombre'] : FALSE;
         $nit = isset($_POST['nit']) ? $_POST['nit'] : FALSE;
         $direccion = isset($_POST['direccion']) ? $_POST['direccion'] : FALSE;
         $departamento = isset($_POST['departamento']) ? $_POST['departamento'] : FALSE;
         $ciudad = isset($_POST['ciudad']) ? $_POST['ciudad'] : FALSE;
         $telefono = isset($_POST['telefono']) ? $_POST['telefono'] : FALSE;
         $email = isset($_POST['email']) ? $_POST['email'] : FALSE;



         if ($nombre && $nit && $direccion && $ciudad) {
            $cliente = new Cliente();
            $cliente->setId_sucursal($id_sucursal);
            $cliente->setNombre(strtoupper($nombre));
            $cliente->setNit($nit);
            $cliente->setDireccion($direccion);
            $cliente->setDepartamento(strtoupper($departamento));
            $cliente->setCiudad(strtoupper($ciudad));
            $cliente->setTelefono($telefono);
            $cliente->setEmail($email);

            
            $resp = $cliente->Guargar();
            
            
            if ($resp) {
               echo'<script>

					swal({
						  type: "success",
						  title: "Cliente Guardado Correctamente",
						   showConfirmButton: false,
                           timer: 1500,                                                   
                            }).then(function() {
                                  window.location = "index";
                            })

					</script>';
            } else {
               echo'<script>

					swal({
						  type: "error",
						  title: "¡Registro no Guardado !",
						  showConfirmButton: false,
                           timer: 1500,                                                   
                            }).then(function() {
                                  window.location = "index";
                            })

			  	</script>';
            }
         }
      }
   }

   public function Actualizar() {
      if (!empty($_POST['id'])) {
         $id = $_POST['id'];
         $nombre = isset($_POST['nombre']) ? $_POST['nombre'] : FALSE;
         $nit = isset($_POST['nit']) ? $_POST['nit'] : FALSE;
         $direccion = isset($_POST['direccion']) ? $_POST['direccion'] : FALSE;
         $departamento = isset($_POST['departamento']) ? $_POST['departamento'] : FALSE;
         $ciudad = isset($_POST['ciudad']) ? $_POST['ciudad'] : FALSE;
         $telefono = isset($_POST['telefono']) ? $_POST['telefono'] : FALSE;
         $email = isset($_POST['email']) ? $_POST['email'] : FALSE;



         if ($id && $nombre && $nit) {
            $cliente = new Cliente();
            $cliente->setId($id);
            $cliente->setNombre(strtoupper($nombre));
            $cliente->setNit($nit);
            $cliente->setDireccion($direccion);
            $cliente->setDepartamento(strtoupper($departamento));
            $cliente->setCiudad(strtoupper($ciudad));
            $cliente->setTelefono($telefono);
            $cliente->setEmail($email);
            $resp = $cliente->Actualizar();

            if ($resp) {
               echo'<script>

					swal({
						  type: "success",
						  title: "Informacion Guardada Correctamente",
						 showConfirmButton: false,
                           timer: 1500,                                                   
                            }).then(function() {
                                  window.location = "index";
                            })

					</script>';
            } else {
               echo'<script>

					swal({
						  type: "error",
						  title: "¡Registro no Guardado !",
						  showConfirmButton: false,
                           timer: 1500,                                                   
                            }).then(function() {
                                  window.location = "index";
                            })

			  	</script>';
            }
         }
      } else {
         echo'<script>

					swal({
						  type: "error",
						  title: "¡Registro no Guardado !",
						  showConfirmButton: false,
                           timer: 1500,                                                   
                            }).then(function() {
                                  window.location = "index";
                            })

		</script>';
      }
   }

   public function Eliminar() {
      if (!empty($_GET['id'])) {
         $id = $_GET['id'];
         $Cliente = new Cliente();
         $Cliente->setId($id);
         $resul = $Cliente->ventasAsociadas();
        
         if ($resul->num_rows != 0) {
             echo'<script>
         
                     swal({
                          type: "error",
                          title: "¡Cliente no Eliminado, tiene ventas Registradas !",
                           showConfirmButton: false,
                           timer: 2000,                                                   
                            }).then(function() {
                                  window.location = "index";
                            })

					</script>';
         } else {            
            $resp = $Cliente->Eliminar();
            if ($resp) {
               echo'<script>
   
                  swal({
                       type: "success",
                       title: "Cliente Eliminado Correctamente",
                      showConfirmButton: false,
                           timer: 1500,                                                   
                            }).then(function() {
                                  window.location = "index";
                            })
   
                  </script>';
               } else {
                  echo'<script>
         
                     swal({
                          type: "error",
                          title: "¡Registro no Eliminado !",
                           showConfirmButton: false,
                           timer: 1500,                                                   
                            }).then(function() {
                                  window.location = "index";
                            })         
                    </script>';
               }
         }
         
      } else {
         echo'<script>

					swal({
						  type: "error",
						  title: "¡Registro no Eliminado!",
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

   public function ver() {
      require_once 'views/layout/menu.php';
      if (isset($_GET['id'])) {
         $id = $_GET['id'];
         $cliente = new Cliente;
         $cliente->setId($id);
         $detallesCliente = $cliente->listarClienteId();
         require_once 'views/cliente/ver.php';
         require_once 'views/layout/copy.php';
      } else {
         echo'<script>

					swal({
						  type: "error",
						  title: "¡Debe selecionar un registro a Editar!",
						  showConfirmButton: false,
                           timer: 1500,                                                   
                            }).then(function() {
                                  window.location = "index";
                            })

			  	</script>';
      }
   }

   public function ComprasClientes() {
      require_once 'views/layout/menu.php';
      require_once 'views/cliente/comprasclientes.php';
      require_once 'views/layout/copy.php';
   }

   public function ReportesClientes() {
      require_once 'views/layout/menu.php';
      require_once 'views/cliente/reportesClientes.php';
      require_once 'views/layout/copy.php';
   }

   public function estadoCuenta() {
      require_once 'views/layout/menu.php';      
      require_once 'views/cliente/estadoCuenta.php';
      require_once 'views/layout/copy.php';
   }
   static public function estadoCuentaClienteSucursal($id_sucursal) {
      $cuenta = new Venta();
      $cuenta->setId_sucursal($id_sucursal);
      $listaEstado = $cuenta->MostrarVentasCliente();
      return $listaEstado;
   }

   public function verestadocuentacliente() {
      require_once 'views/layout/menu.php';
      if (isset($_GET['id'])) {
         $id_cliente = $_GET['id'];
         $cuenta = new Venta();
         $cuenta->setId_cliente($id_cliente);
         $listaEstado = $cuenta->MostrarComprasCliente();
      } else {
         echo'<script>

					swal({
						  type: "error",
						  title: "¡Debe selecionar cliente a Editar!",
						   showConfirmButton: false,
                           timer: 1500,                                                   
                            }).then(function() {
                                  window.location = "index";
                            })

			  	</script>';
      }


      require_once 'views/cliente/estadoCuentaCliente.php';
      require_once 'views/layout/copy.php';
   }

   public function abonarfactura() {
      require_once 'views/layout/menu.php';
      if (isset($_GET['id'])) {
         $id = $_GET['id'];
         $cuenta = new Venta();
         $cuenta->setId($id);
         $listaEstado = $cuenta->MostrarVentasId();
      } else {
         echo'<script>

					swal({
						  type: "error",
						  title: "¡Debe selecionar cliente!",
						  showConfirmButton: false,
                           timer: 1500,                                                   
                            }).then(function() {
                                  window.location = "index";
                            })
			  	</script>';
      }


      require_once 'views/cliente/abonarfactura.php';
      require_once 'views/layout/copy.php';
   }

   public function guardarabono() {
      if (isset($_POST['id'])) {

         $id_factura = $_POST['id'];
         $id_sucursal = $_POST['idsucursal'];
         $abono = (int) $_POST['valor'];
         $descripcion = $_POST['descripcion'];
         $fecha = $_POST['fecha'];

         if ($id_factura && $abono && $fecha) {
            $saldoVenta = new Venta();
            $saldoVenta->setId($id_factura);
            $valorSald = $saldoVenta->MostrarVentasId();
           
            while ($row = $valorSald->fetch_object()) {
               $saldoPendiente = (int) $row->saldo;
            }
             
           

            if ($saldoPendiente >= $abono) {
                

               $nuevoSaldo = $saldoPendiente - $abono;
              
               $ventaAbono = new Venta();
               $ventaAbono->setId($id_factura);
               $ventaAbono->setSaldo($nuevoSaldo);
               $reptA = $ventaAbono->Abonar();

               $abonoVenta = new AbonosCliente();
               $abonoVenta->setId_sucursal($id_sucursal);
               $abonoVenta->setId_factura($id_factura);
               $abonoVenta->setValor($abono);
               $abonoVenta->setDescripcion($descripcion);
               $abonoVenta->setFecha($fecha);

               $reptB = $abonoVenta->RegistrarAbono();

               if ($reptA && $reptB) {
                  echo'<script>

						swal({
							  type: "success",
							  title: "Abono registrado Correctamente",
							  showConfirmButton: true,
							  confirmButtonText: "Cerrar"
							  }).then(function(result){
								if (result.value) {

								window.location = "abonosfactura&id=' . $_POST['id'] . '";

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

   public function abonosfactura() {
      require_once 'views/layout/menu.php';
      if (isset($_GET['id'])) {

         $id_factura = $_GET['id'];

         $abonos = new AbonosCliente();
         $abonos->setId_factura($id_factura);
         $listaAbono = $abonos->MostrarAbonosId();

         $saldoCompra = new Venta();
         $saldoCompra->setId($id_factura);
         $valorSald = $saldoCompra->MostrarVentasId();
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
      require_once 'views/cliente/abonosfactura.php';
      require_once 'views/layout/copy.php';
   }

   public function editarAbono() {
      require_once 'views/layout/menu.php';
      if (isset($_GET['id'])) {
         $id = $_GET['id'];
         $abono = new AbonosCliente();
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
      require_once 'views/cliente/editarabonos.php';
      require_once 'views/layout/copy.php';
   }

   public function ActualizarAbono() {
      if ($_POST['id']) {

         $id = isset($_POST['id']) ? $_POST['id'] : FALSE;
         $abonoValor = isset($_POST['valor']) ? $_POST['valor'] : FALSE;
         $descripcion = $_POST['descripcion'];
         $fecha = isset($_POST['fecha']) ? $_POST['fecha'] : FALSE;
         if ($id && $abonoValor && $fecha) {
            $abono = new AbonosCliente();
            $abono->setId($id);
            $DatosAbono = $abono->VerAbonoId();

            while ($row = $DatosAbono->fetch_object()) {
               $id_venta = $row->id_factura;
               $abonoanterior = (int) $row->valor;
            }

            $venta = new Venta();
            $venta->setId($id_venta);
            $datoVenta = $venta->MostrarVentasId();

            while ($row1 = $datoVenta->fetch_object()) {
               $saldo = (int) $row1->saldo;
            }
            $nuevosaldo = $saldo + $abonoanterior;

            if ($saldo >= $abonoValor) {

               $venta->setSaldo($nuevosaldo);
               $venta->Abonar();

               $nuevovalorA = $nuevosaldo - (int) $abonoValor;

               $venta->setSaldo($nuevovalorA);
               $venta->Abonar();

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

								window.location = "abonosfactura&id=' . $id_venta . '";

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

								window.location = "abonosfactura&id=' . $id_venta . '";

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

							window.location = "estadocuentacliente";

							}
						})

			  	</script>';
      }
   }

   public function EliminarAbono() {
      if ($_GET['id']) {

         $id = $_GET['id'];


         $abono = new AbonosCliente();
         $abono->setId($id);
         $DatosAbono = $abono->VerAbonoId();

         while ($row = $DatosAbono->fetch_object()) {
            $id_venta = $row->id_factura;
            $abonoanterior = (int) $row->valor;
         }

         $venta = new Venta();
         $venta->setId($id_venta);
         $datoVenta = $venta->MostrarVentasId();

         while ($row1 = $datoVenta->fetch_object()) {
            $saldo = (int) $row1->saldo;
         }
         $nuevosaldo = $saldo + $abonoanterior;

         $venta->setSaldo($nuevosaldo);
         $venta->Abonar();

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

							window.location = "abonosfactura&id=' . $id_venta . '";

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

							window.location = "estadocuentaproveedor";

							}
						})

			  	</script>';
      }
   }

}
