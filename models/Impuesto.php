<?php

require_once 'ModeloBase.php';

class Impuesto extends ModeloBase{
	
	private $id;
	private $nombre;
	private $porcentaje;
	
	function getId() {
		return $this->id;
	}

	function getNombre() {
		return $this->nombre;
	}

	function getPorcentaje() {
		return $this->porcentaje;
	}

	function setId($id) {
		$this->id = $id;
	}

	function setNombre($nombre) {
		$this->nombre = $nombre;
	}

	function setPorcentaje($porcentaje) {
		$this->porcentaje = $porcentaje;
	}

	public function __construct() {
		parent::__construct();
	}
	public function ListarImpuesto() {
		$sql = "SELECT * FROM impuesto";
		$resp = $this->db->query($sql);
		return $resp;
	}
	public function Guardar() {
		$sql = "INSERT INTO impuesto VALUES (NULL,'{$this->getNombre()}',{$this->getPorcentaje()})";
		$resp = $this->db->query($sql);
		$resul = FALSE;
		if($resp){
			$resul = TRUE;
		}
	}
}