<?php
require_once '../config/DataBase.php';

class ListaProducto {
	
	public $db;
	
	public function __construct() {
		$this->db = Database::connect();
	}	

	public function MostrarProductos() {
		$sql = "SELECT * FROM product";
		$resul = $this->db->query($sql);
		return $resul;
	}
	public function categoriaId($id) {
		$sql = "SELECT * FROM categoria  WHERE id = $id";
		$resul = $this->db->query($sql);
		return $resul;
	}
}

class ProductosAjax {
	public function MostrarProdcutos() {
		$inventario = new ListaProducto();
		$listaproducto = $inventario->MostrarProductos();
		
		
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
			      "'.$row->costo.'",				 		     
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
$productos = new ProductosAjax();
$productos->MostrarProdcutos();
