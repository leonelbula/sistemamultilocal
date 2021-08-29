<?php
require_once 'models/Categoria.php';

class CategoriaController{
	public function Index() {
		require_once 'views/layout/menu.php';
		require_once 'views/categoria/categoria.php';
		require_once 'views/layout/copy.php';
	}
	static  public function ListaMostrarCategoria($id_sucursal) {
		$categoria = new Categoria();
		$categoria->setId_sucursal($id_sucursal);
		$listCategoria = $categoria->MostrarCategoria();
		return $listCategoria;
	}
	public function RegistrarCategoria() {
		if ($_POST) {
	        $nombre = isset($_POST['nombreCategoria']) ? $_POST['nombreCategoria'] : FALSE;
			$id_sucursal = isset($_POST['idSucursal']) ? $_POST['idSucursal'] : FALSE;
			if ($nombre && $id_sucursal){
				
				$categoria = new Categoria();
                $categoria->setId_sucursal($id_sucursal);
				$categoria->setNombre($nombre);
				$resp = $categoria->GuardarCategoria();
			
				if ($resp) {
					echo'<script>

					swal({
						  type: "success",
						  title: "Categoria Creada Correctamente",
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

	static public function MostarCategoria($id) {
		if($id){
			$id_categoria = $id;
			$categoria = new Categoria();
			$categoria->setId_categoria($id_categoria);
			$detallesCategoria = $categoria->MostrarCategoriaId();
			return $detallesCategoria;
			
		}
	}
	public function Actulizar() {
		if ($_POST['IdCategoria']) {
			$id_categoria = $_POST['IdCategoria'];
			$nombre = isset($_POST['nombreCategoria']) ? $_POST['nombreCategoria'] : FALSE;
			
			if ($id_categoria && $nombre){
				
				$categoria = new Categoria();
				$categoria->setId_categoria($id_categoria);
				$categoria->setNombre($nombre);
				$resp = $categoria->EditarCategoria();
			
				if ($resp) {
					echo'<script>

					swal({
						  type: "success",
						  title: "Categoria Modificada Correctamente",
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
	public function Eliminar() {
		if($_GET['id']){
			$id_categoria = $_GET['id'];
			$cate = new Categoria();
			$cate->setId_categoria($id_categoria);
			$resp = $cate->EliminarCategoria();			
		
			if ($resp) {
					echo'<script>

					swal({
						  type: "success",
						  title: "Categoria Eliminada Correctamente",
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