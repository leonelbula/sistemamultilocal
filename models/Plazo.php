<?php

require_once 'config/DataBase.php';

class Plazo{
	public $db;
	private $id;
	private $descripcion;
	private $dia;
	
	function getDb() {
		return $this->db;
	}

	function getId() {
		return $this->id;
	}

	function getDescripcion() {
		return $this->descripcion;
	}

	function getDia() {
		return $this->dia;
	}

	function setDb($db) {
		$this->db = $db;
	}

	function setId($id) {
		$this->id = $id;
	}

	function setDescripcion($descripcion) {
		$this->descripcion = $descripcion;
	}

	function setDia($dia) {
		$this->dia = $dia;
	}
		
	public function __construct() {
		$this->db = Database::connect();
	}
	public function MostrarPlazo() {
		$sql = "SELECT * FROM plazo";
		$resul = $this->db->query($sql);
		return $resul;
	}
	public function MostrarPlazoId() {
		$sql = "SELECT * FROM plazo WHERE id = {$this->getId()}";
		$resul = $this->db->query($sql);
		return $resul;
	}
}

