<?php

require_once 'config/DataBase.php';

class AbonosProveedor{
	
	private $db;
	
	private $id;
	private $id_factura;
	private $valor;
	private $descripcion;
	private $fecha; 


	function getId() {
		return $this->id;
	}

	function getId_factura() {
		return $this->id_factura;
	}

	function getValor() {
		return $this->valor;
	}

	function getDescripcion() {
		return $this->descripcion;
	}
	function getFecha() {
		return $this->fecha;
	}

	function setId($id) {
		$this->id = $id;
	}

	function setId_factura($id_factura) {
		$this->id_factura = $id_factura;
	}

	function setValor($valor) {
		$this->valor = $valor;
	}

	function setDescripcion($descripcion) {
		$this->descripcion = $descripcion;
	}
	function setFecha($fecha) {
		$this->fecha = $fecha;
	}

	public function __construct() {
		$this->db = Database::connect();
	}
	public function RegistrarAbono() {
		$sql = "INSERT INTO abono_compras VALUES (NULL,{$this->getId_factura()},{$this->getValor()},'{$this->getDescripcion()}','{$this->getFecha()}')";
		$resp = $this->db->query($sql);
		$respt = FALSE;
		if($resp){
			$respt = TRUE;
		}
		return $sql;
	}
	public function MostrarAbonosId() {
		$sql = "SELECT * FROM abono_compras WHERE id_factura = {$this->getId_factura()} ORDER BY id DESC";
		$resp = $this->db->query($sql);
		return $resp;
	}
	public function VerAbonoId() {
		$sql = "SELECT * FROM abono_compras WHERE id = {$this->getId()}";
		$resp = $this->db->query($sql);
		return $resp;
	}
	public function EditarAbono() {
		$sql = "UPDATE abono_compras SET valor = {$this->getValor()},descripcion = '{$this->getDescripcion()}',fecha='{$this->getFecha()}' WHERE id = {$this->getId()};";
		$resp = $this->db->query($sql);
		$result = FALSE;
		if($resp){
			$result = TRUE;
		}
		return $result;
	}
	public function Eliminarbono() {
		$sql = "DELETE FROM abono_compras  WHERE id = {$this->getId()};";
		$resp = $this->db->query($sql);
		$result = FALSE;
		if($resp){
			$result = TRUE;
		}
		return $result;
	}
	
}