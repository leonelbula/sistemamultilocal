<?php

require_once 'models/CuentasContable.php';

class CuentasContableController {

	public function Index() {
		require_once 'views/layout/menu.php';
		$cuentas = new CuentasContable();
		$listacuenta = $cuentas->ListarCuentas();
		require_once 'views/cuentascontable/listacuentas.php';
	}
	static public function ListarCuentas() {
		$cuentas = new CuentasContable();
		$resp = $cuentas->ListarCuentas();
		return $resp;
	}
	public function registrarcuenta() {
		if($_POST['numeroCuenta']){
			$num_cuenta = isset($_POST['numeroCuenta'])?$_POST['numeroCuenta']:FALSE;
			$descripcion = isset($_POST['nombreCuenta'])?$_POST['nombreCuenta']:FALSE;
			
			if($num_cuenta && $descripcion){
				$cuenta = new CuentasContable();
				$cuenta->setNum_cuenta($num_cuenta);
				$cuenta->setDescripcion($descripcion);
				$resp = $cuenta->GuardarCuenta();
				if($resp){
					echo'<script>

					swal({
						  type: "success",
						  title: "Cuenta Creada Correctamente",
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
			}else{
				header('location:index');
			}
		}
	}
	
}
