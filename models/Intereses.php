<?php

require_once 'ModeloBase.php';

class Intereses extends ModeloBase{
	
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
	public function ListarIntereses() {
		$sql = "SELECT * FROM intereses";
		$resp = $this->db->query($sql);
		return $resp;
	}
	public function Guardar() {
		$sql = "INSERT INTO intereses VALUES (NULL,'{$this->getNombre()}',{$this->getPorcentaje()})";
		$resp = $this->db->query($sql);
		$resul = FALSE;
		if($resp){
			$resul = TRUE;
		}
		return $resul;
	}
	public function Eliminar() {
		$sql = "DELETE FROM intereses WHERE  id = {$this->getId()}";
		$resp = $this->db->query($sql);
		$resul = FALSE;
		if($resp){
			$resul = TRUE;
		}
		return $resul;
	}
}