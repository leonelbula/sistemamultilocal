<?php
require_once 'ModeloBase.php';

class CuentasContable extends ModeloBase{
	
	private $id;
	private $num_cuenta;
	private $descripcion;
	
	function getId() {
		return $this->id;
	}

	function getNum_cuenta() {
		return $this->num_cuenta;
	}

	function getDescripcion() {
		return $this->descripcion;
	}

	function setId($id) {
		$this->id = $id;
	}

	function setNum_cuenta($num_cuenta) {
		$this->num_cuenta = $num_cuenta;
	}

	function setDescripcion($descripcion) {
		$this->descripcion = $descripcion;
	}

	public function __construct() {
		parent::__construct();
	}
	public function ListarCuentas() {
		$sql = "SELECT * FROM plandecuenta_puc";
		$resp = $this->db->query($sql);
		return $resp;
	}
	public function GuardarCuenta() {
		$sql = "INSERT INTO plandecuenta_puc VALUES (NULL,{$this->getNum_cuenta()},'{$this->getDescripcion()}')";
		$resp = $this->db->query($sql);
		$resul = FALSE;
		if($resp){
			$resul = TRUE;
		}
		return $resul;
	}
	
}