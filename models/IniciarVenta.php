<?php

require_once 'config/DataBase.php';

class IniciarVenta {

	public $db;
	
	private $id;
        private $id_sucursal;
        private $fechainicio;
	private $fechacierre;
	private $basecaja;
	private $totalingresos;
	private $totalgastos;
        private $otrosmedio;
        private $noexistente;
        private $plansepare;
        private $abonocliente;
        private $devolucion;
        private $montoentregado;
	private $diferencia;
	private $estado;
        
        
        function getId() {
           return $this->id;
        }

        function getId_sucursal() {
           return $this->id_sucursal;
        }

        function getFechainicio() {
           return $this->fechainicio;
        }

        function getFechacierre() {
           return $this->fechacierre;
        }

        function getBasecaja() {
           return $this->basecaja;
        }

        function getTotalingresos() {
           return $this->totalingresos;
        }

        function getTotalgastos() {
           return $this->totalgastos;
        }

        function getOtrosmedio() {
           return $this->otrosmedio;
        }

        function getNoexistente() {
           return $this->noexistente;
        }

        function getPlansepare() {
           return $this->plansepare;
        }

        function getAbonocliente() {
           return $this->abonocliente;
        }

        function getDevolucion() {
           return $this->devolucion;
        }

        function getMontoentregado() {
           return $this->montoentregado;
        }

        function getDiferencia() {
           return $this->diferencia;
        }

        function getEstado() {
           return $this->estado;
        }

        function setId($id) {
           $this->id = $id;
        }

        function setId_sucursal($id_sucursal) {
           $this->id_sucursal = $id_sucursal;
        }

        function setFechainicio($fechainicio) {
           $this->fechainicio = $fechainicio;
        }

        function setFechacierre($fechacierre) {
           $this->fechacierre = $fechacierre;
        }

        function setBasecaja($basecaja) {
           $this->basecaja = $basecaja;
        }

        function setTotalingresos($totalingresos) {
           $this->totalingresos = $totalingresos;
        }

        function setTotalgastos($totalgastos) {
           $this->totalgastos = $totalgastos;
        }

        function setOtrosmedio($otrosmedio) {
           $this->otrosmedio = $otrosmedio;
        }

        function setNoexistente($noexistente) {
           $this->noexistente = $noexistente;
        }

        function setPlansepare($plansepare) {
           $this->plansepare = $plansepare;
        }

        function setAbonocliente($abonocliente) {
           $this->abonocliente = $abonocliente;
        }

        function setDevolucion($devolucion) {
           $this->devolucion = $devolucion;
        }

        function setMontoentregado($montoentregado) {
           $this->montoentregado = $montoentregado;
        }

        function setDiferencia($diferencia) {
           $this->diferencia = $diferencia;
        }

        function setEstado($estado) {
           $this->estado = $estado;
        }

                	
	
	public function __construct() {
		$this->db = Database::connect();
	}
	
	public function MostrarCierres() {
		$sql = "SELECT * FROM iniciar_punto_venta  WHERE id_sucursal = {$this->getId_sucursal()} AND estado = 0 ORDER BY id DESC";
		$resul = $this->db->query($sql);
		return $resul;
	}
        public function MostrarCierresActivos() {
		$sql = "SELECT * FROM iniciar_punto_venta  "
                        . "WHERE id_sucursal = {$this->getId_sucursal()} "
                        . "AND estado = 1";                        
		$resul = $this->db->query($sql);
		return $resul;
	}
	public function VerCierres() {
		$sql = "SELECT * FROM iniciar_punto_venta  WHERE id = {$this->getId()}";
		$resul = $this->db->query($sql);
		return $resul;
	}
        public function VerificarFecha($id,$fechaFinal) {
		$sql = "SELECT * FROM iniciar_punto_venta WHERE fecha_inicio like '%$fechaFinal%' AND id_sucursal = $id";
		$resul = $this->db->query($sql);                
		return $resul;
	}
	public function ventasActivas() {
		$sql = "SELECT * FROM iniciar_punto_venta  WHERE id_sucursal = {$this->getId_sucursal()} AND estado = 1 ";
		$resul = $this->db->query($sql);
		return $resul;
	}
	public function IniciarVenta() {
		$sql = "INSERT INTO iniciar_punto_venta VALUES (NULL,"
                        . "{$this->getId_sucursal()},"
                        . "'{$this->getFechainicio()}',"
                        . "'{$this->getFechacierre()}',"
                        . "{$this->getBasecaja()},"
                        . "{$this->getTotalingresos()},"
                        . "{$this->getTotalgastos()},"
                        . "{$this->getOtrosmedio()},"
                        . "{$this->getNoexistente()},"
                        . "{$this->getPlansepare()},"
                        . "{$this->getAbonocliente()},"
                        . "{$this->getDevolucion()},"           
                        . "{$this->getMontoentregado()},"
                        . "{$this->getDiferencia()},"
                        . "{$this->getEstado()})";
                        
		$resul = $this->db->query($sql);
		$respt = FALSE;
		if($resul){
			$respt = TRUE;
		}
		return $respt;
	}
	public function CerrarVenta() {
		$sql = "UPDATE iniciar_punto_venta SET "
                        . "fecha_cierre='{$this->getFechacierre()}',"
                        . "totalingresos={$this->getTotalingresos()},"
                        . "totalgastos={$this->getTotalgastos()},"
                        . "otrosmedio = {$this->getOtrosmedio()},"
                        . "noexistente = {$this->getNoexistente()},"
                        . "plansepare = {$this->getPlansepare()},"
                        . "abonoscliente = {$this->getAbonocliente()},"
                        . "devolucion= {$this->getDevolucion()},"
                        . "montoentregado={$this->getMontoentregado()},"
                        . "diferencia={$this->getDiferencia()}, "
                        . "estado={$this->getEstado()} "
                        . "WHERE id = {$this->getId()}";
                        
		$resul = $this->db->query($sql);
		$respt = FALSE;
		if($resul){
			$respt = TRUE;
		}
		return $respt;
	}
}
