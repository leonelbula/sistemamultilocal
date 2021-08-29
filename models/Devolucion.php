<?php


require_once 'config/DataBase.php';

class Devolucion{

	public $db;
	
	private $id;
        private $id_sucursal;
        private $fecha;
        private $detalles;
        private $total;
        private $descripcion;
        private $utilidad;
                
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

        function getUtilidad() {
           return $this->utilidad;
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

        function setUtilidad($utilidad) {
           $this->utilidad = $utilidad;
        }

                
        public function __construct() {
		$this->db = Database::connect();
	}
        public function verId() {
           $sql = "SELECT * FROM devolucion WHERE id = {$this->getId()} AND id_sucursal = {$this->getId_sucursal()}";
           $resul = $this->db->query($sql);
           return $resul;
        }
        
        public function save() {
           $sql = "INSERT INTO devolucion VALUE(NULL,"
                   . "{$this->getId_sucursal()},"
                   . "'{$this->getFecha()}',"
                   . "'{$this->getDetalles()}',"
                   . "{$this->total},"
                   . "'{$this->getDescripcion()}',"
                   . "{$this->getUtilidad()})";
                   
          $reslt = $this->db->query($sql);
          $respo = false;
          if($reslt){
             $respo = true;
          }
          return $respo;
           
        }
        public function update() {
           $sql = "UPDATE devolucion SET fecha = '{$this->getFecha()}',"
           . "detalles = '{$this->getDetalles()}',"
           . "total= {$this->getTotal()},"
           . "descripcion = '{$this->getDescripcion()}'"
           . "utilidad = {$this->getUtilidad()}"
           . " WHERE id = {$this->getId()} AND id_sucursal = {$this->getId_sucursal()}";
                   
          $reslt = $this->db->query($sql);
          $respo = false;
          if($reslt){
             $respo = true;
          }
          return $respo;
           
        }
        public function delete() {
           $sql = "DELETE FROM devolucion WHERE id = {$this->getId()} AND id_sucursal = {$this->getId_sucursal()}";
                   
          $reslt = $this->db->query($sql);
          $respo = false;
          if($reslt){
             $respo = true;
          }
          return $respo;
           
        }
        public function DevolucionDiarias($idsucursal, $fechaInicial, $fechaFinal) {


      if ($fechaInicial == $fechaFinal) {

         $sql = "SELECT SUM(total) as total FROM devolucion WHERE fecha like '%$fechaFinal%'  AND id_sucursal = $idsucursal";
      } else {

         $fechaActual = new DateTime();
         $fechaActual->add(new DateInterval("P1D"));
         $fechaActualMasUno = $fechaActual->format("Y-m-d");

         $fechaFinal2 = new DateTime($fechaFinal);
         $fechaFinal2->add(new DateInterval("P1D"));
         $fechaFinalMasUno = $fechaFinal2->format("Y-m-d");

         if ($fechaFinalMasUno == $fechaActualMasUno) {

            $sql = "SELECT SUM(total) as total FROM devolucion WHERE fecha BETWEEN '$fechaInicial' AND '$fechaFinalMasUno'  AND id_sucursal = $idsucursal";
         } else {

            $sql = "SELECT SUM(total) as total FROM devolucion WHERE fecha BETWEEN '$fechaInicial' AND '$fechaFinal'  AND id_sucursal = $idsucursal";
         }
      }


      $resul = $this->db->query($sql);
      return $resul;
   }
}