<?php
require_once '../config/DataBase.php';
require_once '../config/parameters.php';

class registroAjax {
	
	public $db;
	
	public function __construct() {
		$this->db = Database::connect();
	}	

	public function Mostrar($idSucursal) {
		$sql = "SELECT * FROM perdida WHERE id_sucursal = $idSucursal ORDER BY id DESC ";
		$resul = $this->db->query($sql);
		return $resul;
	}
	
}

class RegistroTablaAjax {
	public function Mostrar() {
           
                $idSucursal = $_GET['idsucursal'];
                 
		$registro = new registroAjax();
		$lista = $registro->Mostrar($idSucursal);
				
		 $datosJson = '{
		  "data": [';
		 
		 while ($row = $lista->fetch_object()) {		
		
		$url = URL_BASE.'perdida';

  		$botones = "<div class='btn-group'><a href='$url/editar&id=$row->id'><button class='btn btn-warning'><i class='fa fa-pencil'></i></button></a><a href='$url/eliminar&id=$row->id&id_sucursal=$row->id_sucursal'><button class='btn btn-danger'><i class='fa fa-times'></i></button></a></div>";
  				
		 
		  	$datosJson .='[
			      "'.$row->id.'",			      
			      "'.$row->fecha.'",
			      "'.$row->total.'",				  
			      "'.$row->descripcion.'",	
			      "'.$botones.'"
			    ],';

		  }

		  $datosJson = substr($datosJson, 0, -1);

		 $datosJson .=   '] 

		 }';
		
		echo $datosJson;


	

	}	
}

$detalles = new RegistroTablaAjax();
$detalles->Mostrar();

