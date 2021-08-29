<?php

require_once 'config/DataBase.php';

class CompraProveedor {
	
	public $db;
	
	private $id;
	private $id_Proveedor;
        private $id_sucursal;
        private $valor;
	private $num_factura;
	private $fecha;
	
	function getId() {
		return $this->id;
	}

	function getId_Proveedor() {
		return $this->id_Proveedor;
	}

	function getValor() {
		return $this->valor;
	}

	function getNum_factura() {
		return $this->num_factura;
	}

	function getFecha() {
		return $this->fecha;
	}

	function setId($id) {
		$this->id = $id;
	}

	function setId_Proveedor($id_Proveedor) {
		$this->id_Proveedor = $id_Proveedor;
	}

	function setValor($valor) {
		$this->valor = $valor;
	}

	function setNum_factura($num_factura) {
		$this->num_factura = $num_factura;
	}

	function setFecha($fecha) {
		$this->fecha = $fecha;
	}

	public function __construct() {
		$this->db = Database::connect();
	}
	public function NuevaCompraRealizada() {
		$sql = "INSERT INTO compra_proveedor VALUES (NULL,"
                        . "{$this->getId_Proveedor()},"
                        . "{$this->getValor()},"
                        . "{$this->getNum_factura()},"
                        . "'{$this->getFecha()}')";
		$resp = $this->db->query($sql);
		$resul = FALSE;
		if($resp){
			$resul = TRUE;
		}
		return $resul;
	}
	public function ActulizarCompraRealizada() {
		$sql = "UPDATE compra_proveedor SET "
                        . "valor={$this->getValor()}"
                        . " WHERE numero_factura = {$this->getNum_factura()}";
		$resp = $this->db->query($sql);
		$resul = FALSE;
		if($resp){
			$resul = TRUE;
		}
		return $resul;
	}
	public function EliminarCompra() {
		$sql = "DELETE FROM compra_proveedor WHERE numero_factura = {$this->getNum_factura()}";
		$resp = $this->db->query($sql);
		$resul = FALSE;
		if($resp){
			$resul = TRUE;
		}
		return $resul;
	}
	
}