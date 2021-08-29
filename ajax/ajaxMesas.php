<?php
require_once '../config/DataBase.php';

class ListaMesaPedido {
	
	public $db;
	


	public function __construct() {
		$this->db = Database::connect();
	}	

	public function MostrarMesaId($id) {
		$sql = "SELECT * FROM mesa WHERE id_mesa = $id";
		$resul = $this->db->query($sql);
		return $resul->fetch_object();
	}
	
}

class AjaxMesa{
	
	public $idMesa;
	
	public function MostrarMesaId() {
		$id = $this->idMesa;
		$mesa= new ListaMesaPedido();
		$respuesta = $mesa->MostrarMesaId($id);
		echo json_encode($respuesta);
	}

}
if(isset($_POST["idMesa"])){

  $mesa = new AjaxMesa();
  $mesa -> idMesa = $_POST["idMesa"];
  $mesa ->MostrarMesaId();

}