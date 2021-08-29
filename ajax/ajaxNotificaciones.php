<?php
require_once '../config/DataBase.php';

class Notificaciones {
	
	public $db;
	


	public function __construct() {
		$this->db = Database::connect();
	}	

	public function ActulizarNotificacion($item) {
		$sql = "UPDATE notificaciones SET $item = 0 ";
		$resul = $this->db->query($sql);
		if($resul){
			$respuesta = "ok";
		}else{
			$respuesta = "error";
		}
		
		return $respuesta;
	}
	
}

class AjaxNotificacion {

	public $item;
	
	public function ActulizarNotificacion() {
		$item = $this->item;
		$notificacion = new Notificaciones();
		$rest = $notificacion->ActulizarNotificacion($item);
		
		echo $rest;
	}

}
if(isset($_POST["item"])){
$notificacion = new AjaxNotificacion();
$notificacion->item=$_POST["item"];
$notificacion->ActulizarNotificacion();
}