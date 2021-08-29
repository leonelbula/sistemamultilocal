<?php

require_once 'config/DataBase.php';

class Administracion{
	
	public $db;
	
	private $id;
	private $id_sucursal;
        
        function getId() {
           return $this->id;
        }

        function getId_sucursal() {
           return $this->id_sucursal;
        }

        function setId($id) {
           $this->id = $id;
        }

        function setId_sucursal($id_sucursal) {
           $this->id_sucursal = $id_sucursal;
        }

        public function __construct() {
           $this->db = Database::connect();
        }
        
        public function MostrarSucursal() {
		$sql = "SELECT id_sucursal,nombre FROM datos_empresa";
		$resul = $this->db->query($sql);
		return $resul;
	}
        
        public function MostrarInformacionSucursal() {
		$sql = "SELECT * FROM datos_empresa WHERE id_sucursal = {$this->getId_sucursal()}";
		$resul = $this->db->query($sql);
		return $resul;
	}
        
}
