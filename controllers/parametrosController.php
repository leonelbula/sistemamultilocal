<?php

require_once 'models/DatosEmpresa.php';
require_once 'models/Parametros.php';

class ParametrosController{
	
	public function index() {
		require_once 'views/layout/menu.php';
		require_once 'views/parametros/datosEmpresa.php';
		require_once 'views/layout/copy.php';
	}
	static public function MostrarInformacion($id_sucursal){
	    	$informacion = new DatosEmpresa();
	    	$informacion->setId_sucursal($id_sucursal);
    		$detallesEmpresa = $informacion ->MostrarInformacion();
    		return $detallesEmpresa;
		
	}
	
	static public function MostrarParrametro($id_sucursal){
	    
	    		
    		$parametros = new Parametros();
    		$parametros->setId_sucursal($id_sucursal);
    		$datosParametros = $parametros->MostrarParrametro();
    		$editarParametros = $parametros->MostrarParrametro();
	    	
    		return $editarParametros;
		
	}
	
	
	static public function Parrametros() {
		$informacion = new Parametros();
		$detallesEmpresa = $informacion ->MostrarParrametro();
		return $detallesEmpresa;
	}
	public function Guardar() {
		if($_POST){
			$nit = isset($_POST['nit']) ? $_POST['nit']:FALSE;
			$nombre = isset($_POST['nombre']) ? $_POST['nombre']:FALSE;
			$direccion = isset($_POST['direccion']) ? $_POST['direccion']:FALSE;
			$departamento = isset($_POST['departamento']) ? $_POST['departamento']:FALSE;
			$ciudad = isset($_POST['ciudad']) ? $_POST['ciudad']:FALSE;
			$telefono = isset($_POST['telefono']) ? $_POST['telefono']:FALSE;
			$celular = isset($_POST['celular']) ? $_POST['celular']:FALSE;
			$email = isset($_POST['email']) ? $_POST['email']:FALSE;
			$regimen = isset($_POST['regimen']) ? $_POST['regimen']:FALSE;
			$eslogan = isset($_POST['eslogan']) ? $_POST['eslogan']:FALSE;
			
			if($nit && $nombre && $direccion){
				$datosEmp = new DatosEmpresa();
				$datosEmp->setNit($nit);
				$datosEmp->setNombre(strtoupper($nombre));
				$datosEmp->setDireccion($direccion);
				$datosEmp->setDepartamento(ucwords($departamento));
				$datosEmp->setCiudad(ucwords($ciudad));
				$datosEmp->setTelefono($telefono);
				$datosEmp->setCelular($celular);
				$datosEmp->setEmail($email);
				$datosEmp->setRegimen($regimen);
				$datosEmp->setEslogan($eslogan);
				
				$respt = $datosEmp->Registrar();
				
				if($respt){
					echo'<script>

					swal({
						  type: "success",
						  title: "Informacion Registrada Correctamente",
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
			}
		}
	}
	public function Actulizar() {
		if($_POST['id']){
			$id = $_POST['id'];
			$nit = isset($_POST['nit']) ? $_POST['nit']:FALSE;
			$nombre = isset($_POST['nombre']) ? $_POST['nombre']:FALSE;
			$direccion = isset($_POST['direccion']) ? $_POST['direccion']:FALSE;
			$departamento = isset($_POST['departamento']) ? $_POST['departamento']:FALSE;
			$ciudad = isset($_POST['ciudad']) ? $_POST['ciudad']:FALSE;
			$telefono = isset($_POST['telefono']) ? $_POST['telefono']:FALSE;
			$celular = isset($_POST['celular']) ? $_POST['celular']:FALSE;
			$email = isset($_POST['email']) ? $_POST['email']:FALSE;
			$regimen = isset($_POST['regimen']) ? $_POST['regimen']:FALSE;
			$eslogan = isset($_POST['eslogan']) ? $_POST['eslogan']:FALSE;
			
			if($nit && $nombre && $direccion){
				$datosEmp = new DatosEmpresa();
				$datosEmp->setId($id);
				$datosEmp->setNit($nit);
				$datosEmp->setNombre(strtoupper($nombre));
				$datosEmp->setDireccion($direccion);
				$datosEmp->setDepartamento(ucwords($departamento));
				$datosEmp->setCiudad(ucwords($ciudad));
				$datosEmp->setTelefono($telefono);
				$datosEmp->setCelular($celular);
				$datosEmp->setEmail($email);
				$datosEmp->setRegimen($regimen);
				$datosEmp->setEslogan($eslogan);
				
				$respt = $datosEmp->Actualizar();
								
				if($respt){
					echo'<script>

					swal({
						  type: "success",
						  title: "Informacion Actulizada Correctamente",
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
						  title: "¡Registro no Actulizado !",
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
	public function Actulizarconfig() {
		if($_POST['id']){
			$id = $_POST['id'];
			$num_inicio_factura = isset($_POST['num_inicio_factura']) ? $_POST['num_inicio_factura']:FALSE;								
			if($_POST['generar_codigo'] == 'on'){
				$generar_codigo = 1;
			}else{
				$generar_codigo = 0;
			}			
			$codigo_prod = isset($_POST['codigo_prod']) ? $_POST['codigo_prod']:FALSE;
			
			$parametro = new Parametros();
			
			$parametro->setId($id);
			$parametro->setNum_inicio_factura($num_inicio_factura);			
			$parametro->setGenerar_codigo($generar_codigo);
			$parametro->setCodigo_prod($codigo_prod);
			
			$respt = $parametro->ActualizarConfig();
			
			if($respt){
			echo'<script>

					swal({
						  type: "success",
						  title: "Informacion Actulizada Correctamente",
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
						  title: "¡Registro no Actulizado !",
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