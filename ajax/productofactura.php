<?php
require_once '../config/DataBase.php';

class ListaProductoFactura {
	
	public $db;
	
	public function __construct() {
		$this->db = Database::connect();
	}	

	public function MostrarProductos($id_sucursal) {
		$sql = "SELECT * FROM product WHERE id_sucursal = $id_sucursal";
		$resul = $this->db->query($sql);
		return $resul;
	}
	public function categoriaId($id) {
		$sql = "SELECT * FROM categoria  WHERE id = $id";
		$resul = $this->db->query($sql);
		return $resul;
	}
}

class InventarioAjax {
	public function MostrarProdcutos() {
                  
                $id_sucursal = $_GET['idsucursal'];
		$inventario = new ListaProductoFactura();
		$listaproducto = $inventario->MostrarProductos($id_sucursal);
		
		
		 $datosJson = '{
		  "data": [';
		 $i = 1;
		 while ($row = $listaproducto->fetch_object()) {		
					 
			 

  			if($row->can_inicial< $row->cantidad_min){

  				$stock = "<button class='btn btn-danger'>".$row->can_inicial."</button>";
  			
  			}else{

  				$stock = "<button class='btn btn-success'>".$row->can_inicial."</button>";

  			}

		  	/*=============================================
 	 		TRAEMOS LAS ACCIONES
  			=============================================*/ 
 			
  			$botones = "<button type='button' class='btn btn-primary agregarProducto recuperarBoton' idProducto='".$row->id."'>Agregar</button>"; 
  			 		 		

		 
		  	$datosJson .='[
			      "'.($i++).'",
			      "'.$row->codigo.'",
			      "'.$row->nombre.'",      
			      "'.$row->precioventa.'",				 		     
			      "'.$stock.'",
			      "'.$botones.'"
			    ],';

		  }

		  $datosJson = substr($datosJson, 0, -1);

		 $datosJson .=   '] 

		 }';
		
		echo $datosJson;


	

	}	
}
$productos = new InventarioAjax();
$productos->MostrarProdcutos();
