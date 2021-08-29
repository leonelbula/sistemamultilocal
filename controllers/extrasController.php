<?php

require_once 'models/Retenciones.php';
require_once 'models/Intereses.php';
require_once 'models/Plazo.php';

class ExtrasController{
	public function Index() {
		require_once 'views/layout/menu.php';
		$retencion = new Retenciones();
		$listaReten = $retencion->ListarRetenciones();
		
		$Intereses = new Intereses();
		$listaIntereses = $Intereses->ListarIntereses();
		require_once 'views/extras/listaretenciones.php';
		require_once 'views/layout/copy.php';
	}
	public function listaRetenciones() {
		$retenciones = new Retenciones();
		$listRetencion = $retenciones->ListarRetenciones();
		return $listRetencion;
	}
	public function listaIntereses() {
		$Intereses = new Intereses();
		$listIntereses = $Intereses->ListarIntereses();
		return $listIntereses;
	}
	public function GuardarRetencion() {
		
	}
	public function GuardarInteres() {
		if($_POST){
			$nombre = isset($_POST['nombreInteres']) ? $_POST['nombreInteres']:FALSE;
			$porcentaje = isset($_POST['porcentaje']) ? $_POST['porcentaje']:FALSE;
			
			if($nombre && $porcentaje){
				$interes = new Intereses();
				$interes->setNombre($nombre);
				$interes->setPorcentaje($porcentaje);
				$resp = $interes->Guardar();				
				
				if ($resp) {
					echo'<script>

					swal({
						  type: "success",
						  title: "Registro Guardado Correctamente",
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
	public function eliminarinteres() {
		if(!empty($_GET['idi'])){
			$id = $_GET['idi'];
			$interes = new Intereses();
			$interes->setId($id);
			$resp = $interes->Eliminar();
			if ($resp) {
					echo'<script>

					swal({
						  type: "success",
						  title: "Registar Eliminado Correctamente",
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
	static public function MostrarPlazos() {
		$plazos = new Plazo();
		$respt = $plazos->MostrarPlazo();
		return $respt;
	}
}