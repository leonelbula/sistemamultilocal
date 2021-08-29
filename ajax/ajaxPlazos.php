<?php
require_once '../config/DataBase.php';

class ListaPlazos {
	
	public $db;
	
	public function __construct() {
		$this->db = Database::connect();
	}	

	public function MostrarPlazo() {
		$sql = "SELECT * FROM plazo";
		$resul = $this->db->query($sql);
		return $resul;
	}
	
}

class AjaxPlazo{	
		
	public function MostrarPlazo() {
		
		$plazo = new ListaPlazos();
		$respuesta = $plazo->MostrarPlazo();
		
		echo json_encode($respuesta);
	}

}
if(isset($_POST["tipo"])){

  $plazo = new AjaxPlazo();  
  $plazo ->MostrarPlazo();

}