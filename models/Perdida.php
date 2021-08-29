<?php


require_once 'config/DataBase.php';

class Perdida{

	public $db;
	
	private $id;
        private $id_sucursal;
        private $fecha;
        private $detalles;
        private $total;
        private $descripcion;
                
        function getId() {
           return $this->id;
        }

        function getId_sucursal() {
           return $this->id_sucursal;
        }

        function getFecha() {
           return $this->fecha;
        }

        function getDetalles() {
           return $this->detalles;
        }

        function getTotal() {
           return $this->total;
        }

        function getDescripcion() {
           return $this->descripcion;
        }

        function setId($id) {
           $this->id = $id;
        }

        function setId_sucursal($id_sucursal) {
           $this->id_sucursal = $id_sucursal;
        }

        function setFecha($fecha) {
           $this->fecha = $fecha;
        }

        function setDetalles($detalles) {
           $this->detalles = $detalles;
        }

        function setTotal($total) {
           $this->total = $total;
        }

        function setDescripcion($descripcion) {
           $this->descripcion = $descripcion;
        }

        
        public function __construct() {
		$this->db = Database::connect();
	}
        public function verId() {
           $sql = "SELECT * FROM perdida WHERE id = {$this->getId()} AND id_sucursal = {$this->getId_sucursal()}";
           $resul = $this->db->query($sql);
           return $resul;
        }
        
        public function save() {
           $sql = "INSERT INTO perdida VALUE(NULL,"
                   . "{$this->getId_sucursal()},"
                   . "'{$this->getFecha()}',"
                   . "'{$this->getDetalles()}',"
                   . "{$this->total},"
                   . "'{$this->getDescripcion()}')";
                   
          $reslt = $this->db->query($sql);
          $respo = false;
          if($reslt){
             $respo = true;
          }
          return $respo;
           
        }
        public function update() {
           $sql = "UPDATE perdida SET fecha = '{$this->getFecha()}',"
           . "detalles = '{$this->getDetalles()}',"
           . "total= {$this->getTotal()},"
           . "descripcion = '{$this->getDescripcion()}'"
           . " WHERE id = {$this->getId()} AND id_sucursal = {$this->getId_sucursal()}";
                   
          $reslt = $this->db->query($sql);
          $respo = false;
          if($reslt){
             $respo = true;
          }
          return $respo;
           
        }
        public function delete() {
           $sql = "DELETE FROM perdida WHERE id = {$this->getId()} AND id_sucursal = {$this->getId_sucursal()}";
                   
          $reslt = $this->db->query($sql);
          $respo = false;
          if($reslt){
             $respo = true;
          }
          return $respo;
           
        }
}