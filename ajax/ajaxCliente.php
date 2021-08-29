<?php
require_once '../config/DataBase.php';

class ListaClienteFactura {
	
	public $db;
	


	public function __construct() {
		$this->db = Database::connect();
	}	

	public function MostrarClienteId($id) {
		$sql = "SELECT * FROM cliente WHERE id = $id";
		$resul = $this->db->query($sql);
		return $resul->fetch_object();
	}
	
}

class AjaxClientes{
	
	public $idCliente;
	
	public function MostrarClienteId() {
		$id = $this->idCliente;
		$cliente = new ListaClienteFactura();
		$respuesta = $cliente->MostrarClienteId($id);
		echo json_encode($respuesta);
	}

}
if(isset($_POST["idCliente"])){

  $Cliente = new AjaxClientes();
  $Cliente -> idCliente = $_POST["idCliente"];
  $Cliente ->MostrarClienteId();

}