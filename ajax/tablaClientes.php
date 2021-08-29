<?php
require_once '../config/DataBase.php';
require_once '../config/parameters.php';

class clienteAjax {
	
	public $db;
	
	public function __construct() {
		$this->db = Database::connect();
	}	

	public function Mostrarcliente($idSucursal) {
		$sql = "SELECT * FROM cliente WHERE id_sucursal = $idSucursal ORDER BY nombre ";
		$resul = $this->db->query($sql);
		return $resul;
	}
	
}

class ClienteVentaAjax {
	public function MostrarCliente() {
           
                $idSucursal = $_GET['idsucursal'];
                 
		$cliente = new clienteAjax();
		$listacliente = $cliente->Mostrarcliente($idSucursal);
				
		 $datosJson = '{
		  "data": [';
		 
		 while ($row = $listacliente->fetch_object()) {		
		
		$url = URL_BASE.'cliente';
                
                $nombre = "<a href='$url/ver&id=$row->id'>$row->nombre</a>";

  		$botones = "<div class='btn-group'><a href='$url/editar&id=$row->id'><button class='btn btn-warning'><i class='fa fa-pencil'></i></button></a><a href='$url/eliminar&id=$row->id'><button class='btn btn-danger'><i class='fa fa-times'></i></button></a></div>";
  				
		 
		  	$datosJson .='[
			      "'.$row->id.'",			      
			      "'.$nombre.'",
			      "'.$row->nit.'",
				  "'.$row->direccion.'",
				  "'.$row->ciudad.'",
				  "'.$row->departamento.'",
				  "'.$row->telefono.'",	
				  "'.$row->email.'",	
			      "'.$botones.'"
			    ],';

		  }

		  $datosJson = substr($datosJson, 0, -1);

		 $datosJson .=   '] 

		 }';
		
		echo $datosJson;


	

	}	
}

$cliente = new ClienteVentaAjax();
$cliente->MostrarCliente();

