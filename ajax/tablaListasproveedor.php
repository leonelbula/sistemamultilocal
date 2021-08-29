<?php
require_once '../config/DataBase.php';
require_once '../config/parameters.php';

class Proveedor {
	
	public $db;
	
	public function __construct() {
		$this->db = Database::connect();
	}	

	public function MostrarProveedor() {
		$sql = "SELECT * FROM proveedor ORDER BY nombre ";
		$resul = $this->db->query($sql);
		return $resul;
	}
	
}

class ProveedorAjax {
	public function MostrarProveedor() {
		$proveedor = new Proveedor();
		$listaproveedor = $proveedor->MostrarProveedor();
				
		 $datosJson = '{
		  "data": [';
		 
		 while ($row = $listaproveedor->fetch_object()) {		
		
		$url = URL_BASE.'proveedor';

  		$botones = "<div class='btn-group'><a href='$url/editar&id=$row->id'><button class='btn btn-warning'><i class='fa fa-pencil'></i></button></a><a href='$url/eliminar&id=$row->id'><button class='btn btn-danger'><i class='fa fa-times'></i></button></a></div>";
  				
		 
		  	$datosJson .='[
			      "'.$row->id.'",			      
			      "'.$row->nombre.'",
			      "'.$row->nit.'",
				  "'.$row->direccion.'",
				  "'.$row->ciudad.'",
				  "'.$row->departamento.'",
				  "'.$row->telefono.'",	
				  "'.$row->email.'",
				  "'.$row->vendedor.'",
				  "'.$row->tel_vendedor.'",
			      "'.$botones.'"
			    ],';

		  }

		  $datosJson = substr($datosJson, 0, -1);

		 $datosJson .=   '] 

		 }';
		
		echo $datosJson;


	

	}	
}
$proveedor = new ProveedorAjax();
$proveedor->MostrarProveedor();

