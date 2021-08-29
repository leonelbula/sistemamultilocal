<?php

require_once 'config/DataBase.php';

class Gastos{
	
	public $db;
	private $id;
        private $id_sucursal;
        private $fecha;
	private $descripcion;
	private $valor;
	
        function getId() {
           return $this->id;
        }

        function getId_sucursal() {
           return $this->id_sucursal;
        }

        function getFecha() {
           return $this->fecha;
        }

        function getDescripcion() {
           return $this->descripcion;
        }

        function getValor() {
           return $this->valor;
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

        function setDescripcion($descripcion) {
           $this->descripcion = $descripcion;
        }

        function setValor($valor) {
           $this->valor = $valor;
        }

        	
	public function __construct() {
		$this->db = Database::connect();
	}
	public function MostrarGastos() {
		$sql = "SELECT * FROM gastos WHERE id_sucursal = {$this->getId_sucursal()} ORDER BY id DESC";
		$resul = $this->db->query($sql);
		return $resul;
	}
	public function TotalGastos() {
		$sql = "SELECT SUM(valor) as total FROM gastos WHERE id_sucursal = {$this->getId_sucursal()}";
		$resul = $this->db->query($sql);
		return $resul;
	}
	public function MostrarGastoId() {
		$sql = "SELECT * FROM gastos WHERE id = {$this->getId()}";
		$resul = $this->db->query($sql);
		return $resul;
	}
	public function Guardar() {
		$sql = "INSERT INTO gastos VALUES (NULL,"
                        . "{$this->getId_sucursal()},"
                        . "'{$this->getFecha()}',"
                        . "'{$this->getDescripcion()}',"
                        . "{$this->getValor()})";
                        
		$resul = $this->db->query($sql);
		$respt = FALSE;
		
		if($resul){
			$respt = TRUE;
		}
		return $respt;
	}
	public function Actulizar() {
		$sql = "UPDATE gastos SET "
                        . "fecha='{$this->getFecha()}',"
                        . "descripcion='{$this->getDescripcion()}',"
                        . "valor={$this->getValor()} WHERE id = {$this->getId()}";
                        
		$resul = $this->db->query($sql);
		$respt = FALSE;
		
		if($resul){
			$respt = TRUE;
		}
		return $respt;
	}
	public function Eliminar() {
		$sql = "DELETE FROM gastos WHERE id = {$this->getId()}";
		$resul = $this->db->query($sql);
		$respt = FALSE;
		
		if($resul){
			$respt = TRUE;
		}
		return $respt;
	}
	public function Gastos($idsucursal,$fechaInicial,$fechaFinal) {
		
		
		if($fechaInicial == $fechaFinal){
			
			$sql = "SELECT SUM(valor) as total FROM gastos WHERE fecha like '%$fechaFinal%' AND id_sucursal = $idsucursal";
			
		} else {
			
			$fechaActual = new DateTime();
			$fechaActual->add(new DateInterval("P1D"));
			$fechaActualMasUno = $fechaActual->format("Y-m-d");

			$fechaFinal2 = new DateTime($fechaFinal);
			$fechaFinal2->add(new DateInterval("P1D"));
			$fechaFinalMasUno = $fechaFinal2->format("Y-m-d");

			if ($fechaFinalMasUno == $fechaActualMasUno) {

				$sql = "SELECT SUM(valor) as total FROM gastos WHERE fecha BETWEEN '$fechaInicial' AND '$fechaFinalMasUno'  AND id_sucursal = $idsucursal";
			} else {

				$sql = "SELECT SUM(valor) as total FROM gastos WHERE fecha BETWEEN '$fechaInicial' AND '$fechaFinal'  AND id_sucursal = $idsucursal";
			}
		}
		
		
		$resul = $this->db->query($sql);
		return $resul;
	}
}

