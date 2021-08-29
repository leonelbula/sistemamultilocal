<?php
require_once '../config/DataBase.php';

class MesaAjax {
	
	public $db;
	
	public function __construct() {
		$this->db = Database::connect();
	}	

	public function MostrarMesa() {
		$sql = "SELECT * FROM mesa ";
		$resul = $this->db->query($sql);
		return $resul;
	}
	
}

class mesaPedidoAjax {
	public function MostrarMesa() {
		$mesa = new MesaAjax();
		$listamesa = $mesa->MostrarMesa();
				
		 $datosJson = '{
		  "data": [';
		 $i = 1;
		 while ($row = $listamesa->fetch_object()) {		
				

  		$botones = "<button type='button' class='btn btn-primary agregarMesa recuperarBoton' idMesa='".$row->id_mesa."'>Agregar</button>";
  				
		 
		  	$datosJson .='[
			      "'.($i+1).'",
			      "'.$row->id_mesa.'",
			      "'.$row->nombre.'",			     
			      "'.$botones.'"
			    ],';

		  }

		  $datosJson = substr($datosJson, 0, -1);

		 $datosJson .=   '] 

		 }';
		
		echo $datosJson;


	

	}	
}
$mesa = new mesaPedidoAjax();
$mesa->MostrarMesa();


