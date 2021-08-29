<?php

require_once 'models/IniciarVenta.php';
require_once 'models/VentasSucursal.php';
require_once 'models/AbonoEntregadosPrestamosSucursal.php';
require_once 'models/Gastos.php';
require_once 'models/DatosCierre.php';

class puntoventaController {

	public function index() {
		require_once 'views/layout/menu.php';
		$IniciarVentas = new IniciarVenta();		
		$listacierres = $IniciarVentas->MostrarCierres();
		require_once 'views/puntoventa/IniciarVentas.php';
		require_once 'views/layout/copy.php';
	}
	static public function ventasActivas($id_sucursal) {		
		$IniciarVentas = new IniciarVenta();
		$IniciarVentas->setId_sucursal($id_sucursal);
		$detalles = $IniciarVentas->ventasActivas();
		return $detalles;
		
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

							window.location = "IniciarVentas";

							}
						})

			  	</script>';
		}

		require_once 'views/layout/copy.php';
	}

	public function guardarinicioventa() {
		if ($_POST['basecaja']) {
			$fechainicio = date('Y-m-d');
			$fechacierre = date('Y-m-d');
			$basecaja = $_POST['basecaja'];
			$id_sucursal = $_POST['id_sucursal'];
			$totalingresos = 0;
			$totalgastos = 0;
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
			$inicioventa->setMontoentregado($montoentregado);
			$inicioventa->setDiferencia($diferencia);
			$inicioventa->setEstado($estado);
			$resp = $inicioventa->IniciarVenta();

			if ($resp) {
				echo'<script>

					swal({
						  type: "success",
						  title: "Punto Venta iniciado  Correctamente",
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
						  title: "¡No se pudo inicar punto de venta !",
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
						  title: "¡No a Elegido una venta !",
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

	public function guardarcierreventa() {
		require_once 'views/layout/menu.php';
		if ($_POST['caja']) {

			$fechacierre = date('Y-m-d');
			$montoentregado = (int) $_POST['caja'];
			$id_sucursal = $_POST['id_sucursal'];

			$cerrarventa = new IniciarVenta();
			$cerrarventa->setId_sucursal($id_sucursal);
			$detalles = $cerrarventa->ventasActivas();
			
			while ($row = $detalles->fetch_object()) {
				$id = $row->id;
				$basecaja = (int) $row->basecaja;
				$fechainicio = $row->fecha_inicio;
			}

			$ventas = new VentasSucursal();
			$totalVentas = $ventas->VentasProductos($fechainicio, $fechacierre,$id_sucursal);
			
			if (isset($totalVentas->num_rows) != 0) {
				while ($row1 = $totalVentas->fetch_object()) {
					$ventatotal = (int) $row1->total;
				}
			} else {
				$ventatotal = 0;
			}
			$totalVentaServicio = $ventas->VentasServicios($fechainicio, $fechacierre,$id_sucursal);
			
			if (isset($totalVentaServicio->num_rows) != 0) {
				while ($row1 = $totalVentaServicio->fetch_object()) {
					$ventatotalServicio = (int) $row1->total;
				}
			} else {
				$ventatotalServicio = 0;
			}

			$abonos = new AbonoEntregadosPrestamosSucursal();
			$totalAbonos = $abonos->AbonosDiarios($fechainicio, $fechacierre,$id_sucursal);

			while ($row3 = $totalAbonos->fetch_object()) {
				$valorAbonos = $row3->total;
			}

			$gastos = new Gastos();
			$totalGastos = $gastos->Gastos($fechainicio, $fechacierre);
			while ($row2 = $totalGastos->fetch_object()) {
				$gastoGenerado = (int) $row2->total;
			}
			
			
			
			$resultado1 = $montoentregado + $gastoGenerado ;
			$montoDiario = ($ventatotal + $valorAbonos + $ventatotalServicio) - $gastoGenerado;
			$diferencia = $resultado1 - $montoDiario;

			$resp = TRUE;


			require_once 'views/puntoventa/confirmarcierre.php';
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

							window.location = "index";

							}
						})

			  	</script>';
		}
	}

	public function guardarcierre() {
		if ($_POST['id']) {
			$id = $_POST['id'];
			$id_sucursal = $_POST['id_sucursal'];
			$fechacierre = date('Y-m-d');
			$totalingresos = $_POST['ventatotal'];
			$totalgastos = $_POST['gastototal'];
			$montoentregado = $_POST['montoentregado'];
			$diferencia = $_POST['diferencia'];
			$estado = 0;
			
			
			$fechacierre = date('Y-m-d');			
		

			$cerrarventa = new IniciarVenta();
			
			$cerrarventa->setId_sucursal($id_sucursal);
			$detalles = $cerrarventa->ventasActivas();
			
			while ($row = $detalles->fetch_object()) {
				$id = $row->id;
				$basecaja = (int) $row->basecaja;
				$fechainicio = $row->fecha_inicio;
			}
						
			$ventas = new VentasSucursal();
			$totalVentas = $ventas->VentasProductos($fechainicio, $fechacierre,$id_sucursal);
			
			if (isset($totalVentas->num_rows) != 0) {
				while ($row1 = $totalVentas->fetch_object()) {
					$ventatotal = (int) $row1->total;
				}
			} else {
				$ventatotal = 0;
			}
			$totalVentaServicio = $ventas->VentasServicios($fechainicio, $fechacierre,$id_sucursal);
			
			if (isset($totalVentaServicio->num_rows) != 0) {
				while ($row1 = $totalVentaServicio->fetch_object()) {
					$ventatotalServicio = (int) $row1->total;
				}
			} else {
				$ventatotalServicio = 0;
			}
			
			$datoscierre = new DatosCierre();
			$datoscierre->setId_cierre($id);
			$datoscierre->setTotalproducto($ventatotal);
			$datoscierre->setTotalservicio($ventatotalServicio);
			$datoscierre->Guardar();
			
			

			$cierre = new IniciarVenta();

			$cierre->setId($id);
			$cierre->setId_sucursal($id_sucursal);
			$cierre->setFechacierre($fechacierre);
			$cierre->setTotalingresos($totalingresos);
			$cierre->setMontoentregado($montoentregado);
			$cierre->setTotalgastos($totalgastos);
			$cierre->setDiferencia($diferencia);
			$cierre->setEstado($estado);

			$ventas = new VentasSucursal();
			$ventas->setId_sucursal($id_sucursal);
			$ventas->CerrarVentasProducto();
			$ventas->CerrarVentasServicio();
			$ventas->CerrarAbonos();
			
			$resp = $cierre->CerrarVenta();

			if ($resp) {
				echo'<script>

					swal({
						  type: "success",
						  title: "Punto Venta cerrado Correctamente",
						  showConfirmButton: true,
						  confirmButtonText: "Cerrar"
						  }).then(function(result){
							if (result.value) {

							window.location = "IniciarVentas";

							}
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

							window.location = "IniciarVentas";

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

							window.location = "IniciarVentas";

							}
						})

			  	</script>';
		}
	}

}
