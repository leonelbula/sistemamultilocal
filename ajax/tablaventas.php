<?php
require_once '../config/DataBase.php';

class ListaVentas {
	
	public $db;
	
	public function __construct() {
		$this->db = Database::connect();
	}	

	public function MostrarVentas() {
		$sql = "SELECT * FROM venta  ORDER BY id DESC";
		$resul = $this->db->query($sql);
		return $resul;
	}
	public function clientesId($id) {
		$sql = "SELECT * FROM cliente  WHERE id = $id";
		$resul = $this->db->query($sql);
		return $resul;
	}
}
class ajaxTablaventas{
	public function MostrarVentas() {
			
		
		 $datosJson = '{
		  "data":[';
		 $i = 1;
		 $ventas = new ListaVentas();
		$listaVentas = $ventas->MostrarVentas();
		 while ($row = $listaVentas->fetch_object()) {		
				
			 $id = $row->id_cliente;
			 $clientes = $ventas->clientesId($id);
			 
			 while ($row1 = $clientes->fetch_object()) {
				 $Nomclientes = $row1->nombre;
			 }

  			if($row->tipo == 1){

  				$tipo = "<button class='btn btn-primary btn-xs'>Credito</button>";
  			
  			}else{

  				$tipo = "<button class='btn btn-info btn-xs'>Contado</button>";

  			}

		  	/*=============================================
 	 		TRAEMOS LAS ACCIONES
  			=============================================*/ 
  			

  			$botones =  "<div class='btn-group'><button class='btn btn-info btnImprimirFactura' codigoVenta='".$row->codigo."'><i class='fa fa-print'></i></button><a href='editarventa&id=".$row->id."'><button class='btn btn-warning  btnEditarVenta'><i class='fa fa-pencil'></i></button></a><button class='btn btn-danger btnEliminarVenta' idVenta='".$row->id."'><i class='fa fa-times'></i></button></div>"; 
  			$Dian =  "<div class='btn-group'><a><button class='btn btn-success btnEnviarVenta'>Enviar</button></a></div>"; 

  			//$redir = "href='ver&id=".$row->id."'";

  		

		 
		  	$datosJson .='[
			      "'.($i++).'",
			      "'.$row->codigo.'",
			      "'.$Nomclientes.'",
			      "'.$row->fecha.'",			     
			      "'.$row->fecha_vencimiento.'",
				  "'.$row->total.'",
				  "'.$tipo.'",
				  "'.$botones.'",
			      "'.$Dian.'"
			    ],';

		  }

		  $datosJson = substr($datosJson, 0, -1);

		 $datosJson .=   '] 

		 }';
		
		echo $datosJson;


	

	}	
}

$ventas = new ajaxTablaventas();
$ventas->MostrarVentas();