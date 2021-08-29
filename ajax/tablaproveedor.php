<?php
require_once '../config/DataBase.php';

class proveedorAjax {
	
	public $db;
	
	public function __construct() {
		$this->db = Database::connect();
	}	

	public function Mostrarproveedor() {
		$sql = "SELECT * FROM proveedor ";
		$resul = $this->db->query($sql);
		return $resul;
	}
	
}

class ProveedorCompraAjax {
	public function MostrarProveedor() {
		$proveedor = new proveedorAjax();
		$listaproveedor = $proveedor->Mostrarproveedor();
				
		 $datosJson = '{
		  "data": [';
		 $i = 1;
		 while ($row = $listaproveedor->fetch_object()) {		
				

  		$botones = "<button type='button' class='btn btn-primary agregarProveedor recuperarBotonP' idProveedor='".$row->id."'>Agregar</button>";
  				
		 
		  	$datosJson .='[
			      "'.($i+1).'",
			      "'.$row->id.'",
			      "'.$row->nombre.'",
			      "'.$row->nit.'",	   
			      "'.$botones.'"
			    ],';

		  }

		  $datosJson = substr($datosJson, 0, -1);

		 $datosJson .=   '] 

		 }';
		
		echo $datosJson;


	

	}	
}
$proveedor = new ProveedorCompraAjax();
$proveedor->MostrarProveedor();

