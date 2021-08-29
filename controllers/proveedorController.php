<?php

require_once 'models/Proveedor.php';
require_once 'models/Compra.php';
require_once 'models/AbonosProveedor.php';

class ProveedorController {

	public function Index() {		
		require_once 'views/layout/menu.php';
		$proveedor = new Proveedor();
		$listaproveedor = $proveedor->listarProveedor();		
		require_once 'views/proveedor/listaproveedor.php';
		require_once 'views/layout/copy.php';
	}
	static public function listaProveedor() {
		$proveedor = new Proveedor();
		$listaproveedor = $proveedor->listarProveedor();
		return $listaproveedor;
	}
	static public function MostrarproveedorId($id) {
		$proveedor = new Proveedor();
		$proveedor->setId($id);
		$listaProveedor = $proveedor->listarProveedorId();
		return $listaProveedor;
	}
	public function registrar() {
		require_once 'views/layout/menu.php';
		require_once 'views/proveedor/registrar.php';
		require_once 'views/layout/copy.php';
	}
	public function editar() {
		require_once 'views/layout/menu.php';
		if(isset($_GET['id'])){
			$id = $_GET['id'];
			$proveedor = new Proveedor();
			$proveedor->setId($id);
			$detallesProveedor = $proveedor->listarProveedorId();
			require_once 'views/proveedor/editar.php';
		}else{
			echo'<script>

					swal({
						  type: "error",
						  title: "¡Debe selecionar proveedor a Editar!",
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
	public function Guardar() {
		if($_POST){
		    $id_sucursal = isset($_POST['idsucursal']) ? $_POST['idsucursal']:FALSE;
			$nombre = isset($_POST['nombre']) ? $_POST['nombre']:FALSE;
			$nit = isset($_POST['nit']) ? $_POST['nit']:FALSE;
			$direccion = isset($_POST['direccion']) ? $_POST['direccion']:FALSE;
			$departamento = isset($_POST['departamento']) ? $_POST['departamento']:FALSE;
			$ciudad = isset($_POST['ciudad']) ? $_POST['ciudad']:FALSE;
			$telefono = isset($_POST['telefono']) ? $_POST['telefono']:FALSE;
			$email = isset($_POST['email']) ? $_POST['email']:FALSE;
			$vendedor = isset($_POST['vendedor']) ? $_POST['vendedor']:FALSE;
			$tel_vendedor = isset($_POST['tel_vendedor']) ? $_POST['tel_vendedor']:FALSE;
				
			
			
			if($nombre && $nit && $direccion && $ciudad){
				$proveedor = new Proveedor();
				$proveedor->setId_sucursal($id_sucursal);
				$proveedor->setNombre($nombre);
				$proveedor->setNit($nit);
				$proveedor->setDireccion($direccion);
				$proveedor->setDepartamento($departamento);
				$proveedor->setCiudad($ciudad);
				$proveedor->setTelefono($telefono);
				$proveedor->setEmail($email);
				$proveedor->setVendedor($vendedor);
				$proveedor->setTel_vendedor($tel_vendedor);
						
				
				$resp = $proveedor->Guargar();
			
				if ($resp) {
					echo'<script>

					swal({
						  type: "success",
						  title: "Proveedor Guardado Correctamente",
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
			}
		}
	}
	public function Actualizar() {
		if(!empty($_POST['id'])){
			$id = $_POST['id'];
			$nombre = isset($_POST['nombre']) ? $_POST['nombre']:FALSE;
			$nit = isset($_POST['nit']) ? $_POST['nit']:FALSE;
			$direccion = isset($_POST['direccion']) ? $_POST['direccion']:FALSE;
			$departamento = isset($_POST['departamento']) ? $_POST['departamento']:FALSE;
			$ciudad = isset($_POST['ciudad']) ? $_POST['ciudad']:FALSE;
			$telefono = isset($_POST['telefono']) ? $_POST['telefono']:FALSE;
			$email = isset($_POST['email']) ? $_POST['email']:FALSE;
			$vendedor = isset($_POST['vendedor']) ? $_POST['vendedor']:FALSE;
			$tel_vendedor = isset($_POST['tel_vendedor']) ? $_POST['tel_vendedor']:FALSE;
			
			
			if($id && $nombre && $nit){
				$proveedor = new Proveedor();
				$proveedor->setId($id);
				$proveedor->setNombre($nombre);
				$proveedor->setNit($nit);
				$proveedor->setDireccion($direccion);
				$proveedor->setDepartamento($departamento);
				$proveedor->setCiudad($ciudad);
				$proveedor->setTelefono($telefono);
				$proveedor->setEmail($email);
				$proveedor->setVendedor($vendedor);
				$proveedor->setTel_vendedor($tel_vendedor);
				
			
				$resp = $proveedor->Actualizar();
				
				if ($resp) {
					echo'<script>

					swal({
						  type: "success",
						  title: "Proveedor Actualizado Correctamente",
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
			}
		}else{
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
	public function Eliminar() {
		if(!empty($_GET['id'])){
			$id = $_GET['id'];
			$proveedor = new Proveedor();
			$proveedor->setId($id);
			$resp = $proveedor->Eliminar();
			if ($resp) {
					echo'<script>

					swal({
						  type: "success",
						  title: "Proveedor Eliminado Correctamente",
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
		}else{
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
		if(isset($_GET['id'])){
			$id = $_GET['id'];
			$proveedor = new Proveedor();
			$proveedor->setId($id);
			$detallesProveedor = $proveedor->listarProveedorId();
			require_once 'views/proveedor/ver.php';
		}else{
			echo'<script>

					swal({
						  type: "error",
						  title: "¡Debe selecionar proveedor a Editar!",
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
	public function estadocuentaproveedor() {
		require_once 'views/layout/menu.php';
		$cuenta = new Compra();
		$listaEstado = $cuenta->MostrarComprasProv();		
		require_once 'views/proveedor/estadoCuenta.php';		
		require_once 'views/layout/copy.php';
	}
	public function verestadocuentaprov() {
		require_once 'views/layout/menu.php';
		if(isset($_GET['id'])){
			$id_proveedor = $_GET['id'];
			$cuenta = new Compra();
			$cuenta->setId_proveedor($id_proveedor);
			$listaEstado = $cuenta->MostrarComprasProveedor();
		}else{
			echo'<script>

					swal({
						  type: "error",
						  title: "¡Debe selecionar proveedor a Editar!",
						  showConfirmButton: true,
						  confirmButtonText: "Cerrar"
						  }).then(function(result){
							if (result.value) {

							window.location = "index";

							}
						})

			  	</script>';
		}
		
		
		require_once 'views/proveedor/estadoCuentaProvedor.php';		
		require_once 'views/layout/copy.php';
	}
	public function abonarfactura() {
		require_once 'views/layout/menu.php';
		if(isset($_GET['id'])){
			$id = $_GET['id'];
			$cuenta = new Compra();
			$cuenta->setId($id);
			$listaEstado = $cuenta->MostrarComprasId();
		}else{
			echo'<script>

					swal({
						  type: "error",
						  title: "¡Debe selecionar proveedor a Editar!",
						  showConfirmButton: true,
						  confirmButtonText: "Cerrar"
						  }).then(function(result){
							if (result.value) {

							window.location = "index";

							}
						})

			  	</script>';
		}
		
		
		require_once 'views/proveedor/abonarfactura.php';		
		require_once 'views/layout/copy.php';
	}
	public function guardarabono() {
		if (isset($_POST['id'])) {
			$id_factura = $_POST['id'];
			$abono = (int)$_POST['valor'];			
			$descripcion = $_POST['descripcion'];
			$fecha = $_POST['fecha'];
			
			if($id_factura && $abono && $fecha){
			
				$saldoCompra = new Compra();
				$saldoCompra->setId($id_factura);
				$valorSald = $saldoCompra->MostrarComprasId();

				while ($row = $valorSald->fetch_object()) {
					$saldoPendiente = (int)$row->saldo;
				}			
				if($saldoPendiente > $abono){

					$nuevoSaldo = $saldoPendiente - $abono;
					$CompraAbono = new Compra();
					$CompraAbono->setId($id_factura);
					$CompraAbono->setSaldo($nuevoSaldo);
					$reptA = $CompraAbono->Abonar();

					$abonoCompra = new AbonosProveedor();
					$abonoCompra->setId_factura($id_factura);
					$abonoCompra->setValor($abono);
					$abonoCompra->setDescripcion($descripcion);
					$abonoCompra->setFecha($fecha);

					$reptB = $abonoCompra->RegistrarAbono();

					if($reptA && $reptB){
						echo'<script>

						swal({
							  type: "success",
							  title: "Abono registrado Correctamente",
							  showConfirmButton: true,
							  confirmButtonText: "Cerrar"
							  }).then(function(result){
								if (result.value) {

								window.location = "verestadocuentaprov&id='.$_POST['id'].'";

								}
							})

						</script>';
					}
				}else{
					echo'<script>

						swal({
							  type: "warning",
							  title: "¡El abono es superior al saldo pendiente!",
							  showConfirmButton: true,
							  confirmButtonText: "Cerrar"
							  }).then(function(result){
								if (result.value) {

								window.location = "abonarfactura&id='.$_POST['id'].'";

								}
							})

					</script>';
				}
			}else{
				echo'<script>

						swal({
							  type: "warning",
							  title: "¡El no debe llenar todos los campos!",
							  showConfirmButton: true,
							  confirmButtonText: "Cerrar"
							  }).then(function(result){
								if (result.value) {

								window.location = "abonarfactura&id='.$_POST['id'].'";

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
			
			$abonos = new AbonosProveedor();
			$abonos->setId_factura($id_factura);
			$listaAbono = $abonos->MostrarAbonosId();
			
			$saldoCompra = new Compra();
			$saldoCompra->setId($id_factura);
			$valorSald = $saldoCompra->MostrarComprasId();		
				
			
		}else{
			echo'<script>

					swal({
						  type: "error",
						  title: "¡Debe selecionar una factura !",
						  showConfirmButton: true,
						  confirmButtonText: "Cerrar"
						  }).then(function(result){
							if (result.value) {

							window.location = "estadocuentaproveedor";

							}
						})

			  	</script>';
		}
		require_once 'views/proveedor/abonosfactura.php';		
		require_once 'views/layout/copy.php';
	}
	public function editarAbono() {
		require_once 'views/layout/menu.php';
		if(isset($_GET['id'])){
			$id = $_GET['id'];
			$abono = new AbonosProveedor();
			$abono->setId($id);
			$DatosAbono = $abono->VerAbonoId();
		}else{
			echo'<script>

					swal({
						  type: "error",
						  title: "¡Debe selecionar una factura !",
						  showConfirmButton: true,
						  confirmButtonText: "Cerrar"
						  }).then(function(result){
							if (result.value) {

							window.location = "estadocuentaproveedor";

							}
						})

			  	</script>';
		}
		require_once 'views/proveedor/editarabonos.php';		
		require_once 'views/layout/copy.php';
	}
	public function ActualizarAbono() {
		if($_POST['id']){
			
			$id = isset($_POST['id'])? $_POST['id']:FALSE;
			$abonoValor = isset($_POST['valor']) ? $_POST['valor']:FALSE;			
			$descripcion = $_POST['descripcion'];
			$fecha = isset($_POST['fecha']) ? $_POST['fecha']:FALSE;
			
			if($id && $abonoValor && $fecha){
				
			
				$abono = new AbonosProveedor();
				$abono->setId($id);
				$DatosAbono = $abono->VerAbonoId();

				while ($row =$DatosAbono-> fetch_object()) {
					$id_compra = $row->id_factura;
					$abonoanterior = (int)$row->valor;
				}

				$compra = new Compra();
				$compra->setId($id_compra);
				$datoCompra = $compra->MostrarComprasId();

				while ($row1 = $datoCompra->fetch_object()) {
					$saldo = (int)$row1->saldo;
				}
				if($saldo >= $abonoValor){
					
					$nuevosaldo = $saldo + $abonoanterior;

					$compra->setSaldo($nuevosaldo);
					$compra->Abonar();
					
					$nuevovalorA = $nuevosaldo - (int)$abonoValor;

					$compra->setSaldo($nuevovalorA);
					$compra->Abonar();

					$abono->setId($id);
					$abono->setValor($abonoValor);
					$abono->setDescripcion($descripcion);
					$abono->setFecha($fecha);
					$respt = $abono->EditarAbono();

					if($respt){
						echo'<script>

							swal({
								  type: "success",
								  title: "Abono actualizado Correctamente",
								  showConfirmButton: true,
								  confirmButtonText: "Cerrar"
								  }).then(function(result){
									if (result.value) {

									window.location = "abonosfactura&id='.$id_compra.'";

									}
								})

							</script>';
					} else {
						echo'<script>

							swal({
							type: "error",
							title: "¡Debe selecionar pago relizado !",
							showConfirmButton: true,
							confirmButtonText: "Cerrar"
							}).then(function(result){
							  if (result.value) {

							  window.location = "abonarfactura&id='.$id_compra.'";

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

								window.location = "editarabono&id='.$_POST['id'].'";

								}
							})

					</script>';
				}
			}else{
				echo'<script>

						swal({
							  type: "warning",
							  title: "¡No debes tener campos vacios!",
							  showConfirmButton: true,
							  confirmButtonText: "Cerrar"
							  }).then(function(result){
								if (result.value) {

								window.location = "editarabono&id='.$_POST['id'].'";

								}
							})

				</script>';
			}
			
			
			
		}else{
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
	public function EliminarAbono() {
		if($_GET['id']){
			
			$id = $_GET['id'];
			
			
			$abono = new AbonosProveedor();
			$abono->setId($id);
			$DatosAbono = $abono->VerAbonoId();
			
			while ($row =$DatosAbono-> fetch_object()) {
				$id_compra = $row->id_factura;
				$abonoanterior = (int)$row->valor;
			}
			
			$compra = new Compra();
			$compra->setId($id_compra);
			$datoCompra = $compra->MostrarComprasId();
			
			while ($row1 = $datoCompra->fetch_object()) {
				$saldo = (int)$row1->saldo;
			}
			$nuevosaldo = $saldo + $abonoanterior;
			
			$compra->setSaldo($nuevosaldo);
			$compra->Abonar();
			
			$abono->setId($id);
			
			$respt = $abono->Eliminarbono();
			
			if($respt){
				echo'<script>

					swal({
						  type: "success",
						  title: "Abono Eliminado Correctamente",
						  showConfirmButton: true,
						  confirmButtonText: "Cerrar"
						  }).then(function(result){
							if (result.value) {

							window.location = "abonosfactura&id='.$id_compra.'";

							}
						})

					</script>';
			} else {
				
			}
			
			
			
			
		}else{
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
