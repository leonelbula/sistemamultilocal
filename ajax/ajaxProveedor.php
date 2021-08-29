<?php
require_once '../config/DataBase.php';

class ListaProveedorCompra {
	
	public $db;
	


	public function __construct() {
		$this->db = Database::connect();
	}	

	public function MostrarProveedorId($id) {
		$sql = "SELECT * FROM proveedor WHERE id = $id";
		$resul = $this->db->query($sql);
		return $resul->fetch_object();
	}
	
}

class AjaxProveedor{
	
	public $idProveedor;
	
	public function MostrarProveedorId() {
		$id = $this->idProveedor;
		$proveedor = new ListaProveedorCompra();
		$respuesta = $proveedor->MostrarProveedorId($id);
		echo json_encode($respuesta);
	}

}
if(isset($_POST["idProveedor"])){

  $proveedor = new AjaxProveedor();
  $proveedor -> idProveedor = $_POST["idProveedor"];
  $proveedor ->MostrarProveedorId();

}