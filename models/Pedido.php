<?php

require_once 'config/DataBase.php';

class Pedido{
	
	public $db;
	
	private $id;	
	private $codigo;
	private $fecha;
	private $hora;
	private $tipo;
	private $id_plazo;
	private $fecha_vencimiento;
	private $id_cliente;
	private $detalle_venta;
	private $sub_total;
	private $iva;
	private $total;
	private $utilidad;
	
	function getId() {
		return $this->id;
	}

	function getCodigo() {
		return $this->codigo;
	}

	function getFecha() {
		return $this->fecha;
	}
	function getHora() {
		return $this->hora;
	}

	function getTipo() {
		return $this->tipo;
	}

	function getId_plazo() {
		return $this->id_plazo;
	}

	function getFecha_vencimiento() {
		return $this->fecha_vencimiento;
	}

	function getId_cliente() {
		return $this->id_cliente;
	}

	function getDetalle_venta() {
		return $this->detalle_venta;
	}

	function getSub_total() {
		return $this->sub_total;
	}

	function getIva() {
		return $this->iva;
	}

	function getTotal() {
		return $this->total;
	}

	function getUtilidad() {
		return $this->utilidad;
	}

	function setId($id) {
		$this->id = $id;
	}

	function setCodigo($codigo) {
		$this->codigo = $codigo;
	}

	function setFecha($fecha) {
		$this->fecha = $fecha;
	}
	function setHora($hora) {
		$this->hora = $hora;
	}

	function setTipo($tipo) {
		$this->tipo = $tipo;
	}

	function setId_plazo($id_plazo) {
		$this->id_plazo = $id_plazo;
	}

	function setFecha_vencimiento($fecha_vencimiento) {
		$this->fecha_vencimiento = $fecha_vencimiento;
	}

	function setId_cliente($id_cliente) {
		$this->id_cliente = $id_cliente;
	}

	function setDetalle_venta($detalle_venta) {
		$this->detalle_venta = $detalle_venta;
	}

	function setSub_total($sub_total) {
		$this->sub_total = $sub_total;
	}

	function setIva($iva) {
		$this->iva = $iva;
	}

	function setTotal($total) {
		$this->total = $total;
	}

	function setUtilidad($utilidad) {
		$this->utilidad = $utilidad;
	}

	public function __construct() {
		$this->db = Database::connect();
	}
	public function MostrarPedido() {
		$sql = "SELECT * FROM venta  ORDER BY id DESC";
		$resul = $this->db->query($sql);
		return $resul;
	}
	public function GuardarPedido() {
		$sql = "INSERT INTO pedido VALUES (NULL,{$this->getCodigo()},'{$this->getFecha()}','{$this->getHora()}',{$this->getTipo()},"
		. "{$this->getId_plazo()},'{$this->getFecha_vencimiento()}',{$this->getId_cliente()},'{$this->getDetalle_venta()}',"
		. "{$this->getSub_total()},{$this->getIva()},{$this->getTotal()},{$this->getUtilidad()})";
		$resp = $this->db->query($sql);
		$resul = FALSE;
		if($resp){
			$resul = TRUE;
		}
		return $resul;
	}
	public function VerUltimoPedido() {
		$sql = "SELECT * FROM pedido ORDER BY id DESC LIMIT 1";
		$resp = $this->db->query($sql);
		return $resp;
	}
	public function VerPedido() {
		$sql = "SELECT * FROM pedido WHERE id = {$this->getId()}";
		$resp = $this->db->query($sql);
		return $resp;
	}
	public function Actulizar() {
		$sql = "UPDATE pedido SET fecha='{$this->getFecha()}',hora='{$this->getHora()}',tipo={$this->getTipo()},id_plazo={$this->getId_plazo()},"
		. "fecha_vencimiento='{$this->getFecha_vencimiento()}',detalle_venta='{$this->getDetalle_venta()}',"
		. "sub_total={$this->getSub_total()},iva={$this->getIva()},total={$this->getTotal()},utilidad={$this->getUtilidad()} WHERE id = {$this->getId()}";
		$resp = $this->db->query($sql);
		$resul = FALSE;
		if($resp){
			$resul = TRUE;
		}
		return $resul;
	}
	public function EliminarPedido() {
		$sql = "DELETE FROM pedido WHERE id = {$this->getId()}";
		$resp = $this->db->query($sql);
		$resul = FALSE;
		if($resp){
			$resul = TRUE;
		}
		return $resul;
	}
	public function VerVentaCodigo() {
		$sql = "SELECT * FROM venta WHERE codigo = {$this->getCodigo()}";
		$resul = $this->db->query($sql);
		return $resul;
	}
}
