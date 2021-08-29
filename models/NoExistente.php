<?php

require_once 'config/DataBase.php';

class NoExistente{
   
   public $db;
   
   private $id;
   private $id_sucursal;
   private $fecha;
   private $valor;
   private $detalle;
   
   function getId() {
      return $this->id;
   }

   function getId_sucursal() {
      return $this->id_sucursal;
   }

   function getFecha() {
      return $this->fecha;
   }

   function getValor() {
      return $this->valor;
   }

   function getDetalle() {
      return $this->detalle;
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

   function setValor($valor) {
      $this->valor = $valor;
   }

   function setDetalle($detalle) {
      $this->detalle = $detalle;
   }

      
   public function __construct() {
      $this->db = Database::connect();
   }
   public function listar() {
      $sql = "SELECT * FROM noexistente WHERE id_sucursal = {$this->getId_sucursal()}";
      $resul = $this->db->query($sql);
      return $resul;
   }
      public function verId() {
      $sql = "SELECT * FROM noexistente WHERE id = {$this->getId()}";
      $resul = $this->db->query($sql);
      return $resul;
   }
   public function guardar() {
      $sql = "INSERT INTO noexistente VALUE(NULL,"
              . "{$this->getId_sucursal()},"
              . "'{$this->getFecha()}',"
              . "{$this->valor},"
              . "'{$this->getDetalle()}')";
              
      $resul = $this->db->query($sql);
      $resp = false;
      if($resul){
         $resp = true;
      }
      return $resp;
   }
   public function actulizar() {
      $sql = "UPDATE noexistente SET fecha = '{$this->getFecha()}',"
                                 . " valor = {$this->getValor()},"
                                 . " detalles = '{$this->getDetalle()}'"
                                 . " WHERE id = {$this->getId()} AND id_sucursal = {$this->getId_sucursal()}";
      $resp = $this->db->query($sql);
      $resul = false;
      if($resp){
         $resul = true;
      }
      return $resul;
   }
   public function eliminar() {
      $sql ="DELETE FROM noexistente WHERE id = {$this->getId()} AND id_sucursal = {$this->getId_sucursal()}";
      $resp = $this->db->query($sql);
      $resul = false;
      if($resp){
         $resul = true;
      }
      return $resul;
   }
   public function recibidos($idsucursal,$fechaInicial,$fechaFinal) {
		
		
		if($fechaInicial == $fechaFinal){
			
			$sql = "SELECT SUM(valor) as total FROM noexistente WHERE fecha like '%$fechaFinal%' AND id_sucursal = $idsucursal";
			
		} else {
			
			$fechaActual = new DateTime();
			$fechaActual->add(new DateInterval("P1D"));
			$fechaActualMasUno = $fechaActual->format("Y-m-d");

			$fechaFinal2 = new DateTime($fechaFinal);
			$fechaFinal2->add(new DateInterval("P1D"));
			$fechaFinalMasUno = $fechaFinal2->format("Y-m-d");

			if ($fechaFinalMasUno == $fechaActualMasUno) {

				$sql = "SELECT SUM(valor) as total FROM noexistente WHERE fecha BETWEEN '$fechaInicial' AND '$fechaFinalMasUno'  AND id_sucursal = $idsucursal";
			} else {

				$sql = "SELECT SUM(valor) as total FROM noexistente WHERE fecha BETWEEN '$fechaInicial' AND '$fechaFinal'  AND id_sucursal = $idsucursal";
			}
		}
		
		
		$resul = $this->db->query($sql);
		return $resul;
	}
}
