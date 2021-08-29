<?php
require_once '../config/DataBase.php';
require_once '../config/parameters.php';

class ListaProducto {
	
	public $db;
	
	public function __construct() {
		$this->db = Database::connect();
	}	

	public function Mostrar() {
		$sql = "SELECT * FROM product";
		$resul = $this->db->query($sql);
		return $resul;
	}
	
}

class ProductoAjax {
	public function MostrarProducto() {
		$producto = new ListaProducto();
		$lista = $producto->Mostrar();
		
		
		 $datosJson = '{
		  "data": [';
		 $i = 1;
		 while ($row = $lista->fetch_object()) {		
				
			  
  			$botones = "<button type='button' class='btn btn-primary agregarProducto recuperarBoton' idProducto='".$row->id."'>Agregar</button>"; 
  			
  		
		  	$datosJson .='[
			      "'.($i++).'",
			      "'.$row->codigo.'",
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
$producto = new ProductoAjax();
$producto->MostrarProducto();
