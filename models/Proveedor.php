<?php

require_once 'ModeloBase.php';

class Proveedor extends ModeloBase{

	private $id;
	private $id_sucursal;
	private $nombre;
	private $nit;
	private $direccion;
	private $departamento;
	private $ciudad; 
	private $email;
	private $telefono;
	private $vendedor; 
	private $tel_vendedor; 
	private $impuesto;
	private $retencion;
	private $cuenta_contable;

	function getId() {
		return $this->id;
	}
	
	function getId_sucursal() {
		return $this->id_sucursal;
	}

	function getNombre() {
		return $this->nombre;
	}

	function getNit() {
		return $this->nit;
	}

	function getDireccion() {
		return $this->direccion;
	}

	function getDepartamento() {
		return $this->departamento;
	}

	function getCiudad() {
		return $this->ciudad;
	}

	function getEmail() {
		return $this->email;
	}

	function getTelefono() {
		return $this->telefono;
	}

	function getVendedor() {
		return $this->vendedor;
	}

	function getTel_vendedor() {
		return $this->tel_vendedor;
	}

	function getImpuesto() {
		return $this->impuesto;
	}

	function getRetencion() {
		return $this->retencion;
	}

	function getCuenta_contable() {
		return $this->cuenta_contable;
	}

	function setId($id) {
		$this->id = $id;
	}
	function setId_sucursal($id_sucursal) {
		$this->id_sucursal = $id_sucursal;
	}

	function setNombre($nombre) {
		$this->nombre = $nombre;
	}

	function setNit($nit) {
		$this->nit = $nit;
	}

	function setDireccion($direccion) {
		$this->direccion = $direccion;
	}

	function setDepartamento($departamento) {
		$this->departamento = $departamento;
	}

	function setCiudad($ciudad) {
		$this->ciudad = $ciudad;
	}

	function setEmail($email) {
		$this->email = $email;
	}

	function setTelefono($telefono) {
		$this->telefono = $telefono;
	}

	function setVendedor($vendedor) {
		$this->vendedor = $vendedor;
	}

	function setTel_vendedor($tel_vendedor) {
		$this->tel_vendedor = $tel_vendedor;
	}

	function setImpuesto($impuesto) {
		$this->impuesto = $impuesto;
	}

	function setRetencion($retencion) {
		$this->retencion = $retencion;
	}

	function setCuenta_contable($cuenta_contable) {
		$this->cuenta_contable = $cuenta_contable;
	}

	
	public function __construct() {
		parent::__construct();
	}
	public function listarProveedor() {
		$sql = "SELECT * FROM proveedor";
		$resul = $this->db->query($sql);
		return $resul;
	}
	public function listarProveedorId() {
		$sql = "SELECT * FROM proveedor WHERE id = {$this->getId()}";
		$resul = $this->db->query($sql);
		return $resul;
	}
	public function Guargar() {
		$sql = "INSERT INTO proveedor VALUES (NULL,{$this->getId_sucursal()},'{$this->getNombre()}','{$this->getNit()}','{$this->getDireccion()}',"
			 . " '{$this->getDepartamento()}','{$this->getCiudad()}','{$this->getEmail()}','{$this->getTelefono()}',"
			 . " '{$this->getVendedor()}', '{$this->getTel_vendedor()}')";
		$resp = $this->db->query($sql);
		$resul = FALSE;
		if($resp){
			$resul = TRUE;
		}		
		return $resul;
	}
	public function Actualizar() {
		$sql = "UPDATE proveedor SET nombre='{$this->getNombre()}',nit='{$this->getNit()}',direccion='{$this->getDireccion()}',"
		. "departamento='{$this->getDepartamento()}',ciudad='{$this->getCiudad()}',email='{$this->getEmail()}',telefono='{$this->getTelefono()}',"
		. "vendedor='{$this->getVendedor()}',tel_vendedor='{$this->getTel_vendedor()}' WHERE id = {$this->getId()}";
		$resp = $this->db->query($sql);
		$result = FALSE;
		if($resp){
			$result = TRUE;
		}
		return $result;
	}
	public function Eliminar() {
		$sql = "DELETE FROM proveedor WHERE  id = {$this->getId()}";
		$resp = $this->db->query($sql);
		$resul = FALSE;
		if($resp){
			$resul = TRUE;
		}
		return $resul;
	}
}
