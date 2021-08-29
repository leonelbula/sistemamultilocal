<?php

require_once 'config/DataBase.php';

class DatosEmpresa{
	
	public $db;
	
	private $id;
	private $id_sucursal;
	private $nit;
	private $nombre;
	private $direccion;
	private $departamento;
	private $ciudad;
	private $telefono;
	private $celular;
	private $email;
	private $regimen;
	private $eslogan;
	
	function getId() {
		return $this->id;
	}
	
	function getId_sucursal() {
		return $this->id_sucursal;
	}

	function getNit() {
		return $this->nit;
	}

	function getNombre() {
		return $this->nombre;
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

	function getTelefono() {
		return $this->telefono;
	}

	function getCelular() {
		return $this->celular;
	}

	function getEmail() {
		return $this->email;
	}

	function getRegimen() {
		return $this->regimen;
	}

	function getEslogan() {
		return $this->eslogan;
	}

	function setId($id) {
		$this->id = $id;
	}
	
	function setId_sucursal($id_sucursal) {
		$this->id_sucursal = $id_sucursal;
	}

	function setNit($nit) {
		$this->nit = $nit;
	}

	function setNombre($nombre) {
		$this->nombre = $nombre;
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

	function setTelefono($telefono) {
		$this->telefono = $telefono;
	}

	function setCelular($celular) {
		$this->celular = $celular;
	}

	function setEmail($email) {
		$this->email = $email;
	}

	function setRegimen($regimen) {
		$this->regimen = $regimen;
	}

	function setEslogan($eslogan) {
		$this->eslogan = $eslogan;
	}

	public function __construct() {
		$this->db = Database::connect();
	}
	
	public function MostrarInformacion() {
		$sql = "SELECT * FROM datos_empresa WHERE id_sucursal = {$this->getId_sucursal()}";
		$resul = $this->db->query($sql);
		return $resul;
	}
	public function Registrar() {
		$sql = "INSERT INTO datos_empresa VALUES (NULL, '{$this->getNit()}', '{$this->getNombre()}',"
				. "'{$this->getDireccion()}', '{$this->getDepartamento()}', '{$this->getCiudad()}',"
				. " '{$this->getTelefono()}', '{$this->getCelular()}', '{$this->getEmail()}', '{$this->getRegimen()}',"
				. " '{$this->getEslogan()}')";
		$resul = $this->db->query($sql);
		$resp = FALSE;
		if ($resul) {
			$resp = TRUE;
		}
		return $resp;
	}
	public function Actualizar() {
		$sql = "UPDATE datos_empresa SET nombre='{$this->getNombre()}',nit='{$this->getNit()}',direccion='{$this->getDireccion()}',"
		. "departamento='{$this->getDepartamento()}',ciudad='{$this->getCiudad()}',email='{$this->getEmail()}',telefono='{$this->getTelefono()}',"
		. "celular='{$this->getCelular()}',regimen='{$this->getRegimen()}', eslogan='{$this->getEslogan()}' WHERE id = {$this->getId()}";
		$resp = $this->db->query($sql);
		$result = FALSE;
		if($resp){
			$result = TRUE;
		}
		return $result;
	}
}
