<?php

require_once 'config/DataBase.php';

class Notificaciones{
	
	public $db;
	private $id;
    private $id_sucursal;
	private $producto_stock;
	private $clientes_mora;
	
	function getId() {
           return $this->id;
        }

        function getId_sucursal() {
           return $this->id_sucursal;
        }

        function getProducto_stock() {
           return $this->producto_stock;
        }

        function getClientes_mora() {
           return $this->clientes_mora;
        }

        function setId($id) {
           $this->id = $id;
        }

        function setId_sucursal($id_sucursal) {
           $this->id_sucursal = $id_sucursal;
        }

        function setProducto_stock($producto_stock) {
           $this->producto_stock = $producto_stock;
        }

        function setClientes_mora($clientes_mora) {
           $this->clientes_mora = $clientes_mora;
        }

		
	public function __construct() {
		$this->db = Database::connect();
	}
	public function MostrarNotificacione() {
		$sql = "SELECT * FROM notificaciones WHERE id_sucursal = {$this->getId_sucursal()}";
		$resul = $this->db->query($sql);
		return $resul;
	}	
	public function NuevaNotificacionProductos() {
		$sql = "UPDATE notificaciones SET producto_stock = {$this->getProducto_stock()}";
		$resul = $this->db->query($sql);
		if($resul){
			$resp = TRUE;
		}else{
			$resp = FALSE;
		}
		return $resp;
	}
	public function NuevaNotificacionCliente() {
		$sql = "UPDATE notificaciones SET cliente_mora = {$this->getClientes_mora()}";
		$resul = $this->db->query($sql);
		if($resul){
			$resp = TRUE;
		}else{
			$resp = FALSE;
		}
		return $resp;
	}
	
	
}


