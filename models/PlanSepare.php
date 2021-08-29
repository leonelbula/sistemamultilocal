<?php

require_once 'config/DataBase.php';

class PlanSepare{
	
	public $db;
	
	private $id;
        private $id_sucursal;
        private $codigo;
	private $fecha;	
	private $plazo;
	private $fecha_vencimiento;
	private $id_cliente;
	private $detalle;	
	private $total;
        private $saldo;
	
        function getId() {
           return $this->id;
        }

        function getId_sucursal() {
           return $this->id_sucursal;
        }

        function getCodigo() {
           return $this->codigo;
        }

        function getFecha() {
           return $this->fecha;
        }

        function getPlazo() {
           return $this->plazo;
        }

        function getFecha_vencimiento() {
           return $this->fecha_vencimiento;
        }

        function getId_cliente() {
           return $this->id_cliente;
        }

        function getDetalle() {
           return $this->detalle;
        }

        function getTotal() {
           return $this->total;
        }

        function getSaldo() {
           return $this->saldo;
        }

        function setId($id) {
           $this->id = $id;
        }

        function setId_sucursal($id_sucursal) {
           $this->id_sucursal = $id_sucursal;
        }

        function setCodigo($codigo) {
           $this->codigo = $codigo;
        }

        function setFecha($fecha) {
           $this->fecha = $fecha;
        }

        function setPlazo($plazo) {
           $this->plazo = $plazo;
        }

        function setFecha_vencimiento($fecha_vencimiento) {
           $this->fecha_vencimiento = $fecha_vencimiento;
        }

        function setId_cliente($id_cliente) {
           $this->id_cliente = $id_cliente;
        }

        function setDetalle($detalle) {
           $this->detalle = $detalle;
        }

        function setTotal($total) {
           $this->total = $total;
        }

        function setSaldo($saldo) {
           $this->saldo = $saldo;
        }

                        
	public function __construct() {
		$this->db = Database::connect();
	}
	public function Mostrar() {
		$sql = "SELECT * FROM plansepare WHERE id_sucursal = {$this->getId_sucursal()} ORDER BY id DESC";
		$resul = $this->db->query($sql);
		return $resul;
	}
        public function MostrarId() {
		$sql = "SELECT * FROM plansepare WHERE id = {$this->getId()}";
		$resul = $this->db->query($sql);
		return $resul;
	}
	public function TotalVentas() {
		$sql = "SELECT SUM(total) as total FROM plansepare";
		$resul = $this->db->query($sql);
		return $resul;
	}
		
	public function MostrarComprasCliente() {
		$sql = "SELECT * FROM plansepare WHERE id_cliente = {$this->getId_cliente()}";
		$resul = $this->db->query($sql);
		return $resul;
	}
	
	public function Guardar() {
		$sql = "INSERT INTO plansepare VALUES ("
                        . "NULL,{$this->getId_sucursal()},"
                        . "{$this->getCodigo()},"
                        . "'{$this->getFecha()}',"                        
                        . "{$this->getPlazo()},"
                        . "'{$this->getFecha_vencimiento()}',"
                        . "{$this->getId_cliente()},"
                        . "'{$this->getDetalle()}',"
                        . "{$this->getTotal()},"
                        . "{$this->getSaldo()})";
                      
                        
		$resp = $this->db->query($sql);
		$resul = false;
                
		if($resp){
			$resul = TRUE;
		}
		return $resul;
	}
	public function VerUltima() {
		$sql = "SELECT * FROM plansepare WHERE id_sucursal = {$this->getId_sucursal()} ORDER BY id DESC LIMIT 1";
		$resp = $this->db->query($sql);
		return $resp;
	}
	public function Ver() {
		$sql = "SELECT * FROM plansepare WHERE id = {$this->getId()}";
		$resp = $this->db->query($sql);
		return $resp;
	}
	public function Actulizar() {
		$sql = "UPDATE plansepare SET "
                        . "fecha='{$this->getFecha()}',"                     
                        . "plazo={$this->getPlazo()},"
                        . "fecha_vencimiento='{$this->getFecha_vencimiento()}',"
                        . "id_cliente = {$this->getId_cliente()},"
                        . "detalle_venta='{$this->getDetalle()}',"                                              
                        . "total={$this->getTotal()},"
                        . "saldo={$this->getSaldo()}"                        
                        . " WHERE id = {$this->getId()}";
                        
		$resp = $this->db->query($sql);
		$resul = FALSE;
		if($resp){
			$resul = TRUE;
		}
		return $resul;
	}
	public function Eliminar() {
		$sql = "DELETE FROM plansepare WHERE id = {$this->getId()}";
		$resp = $this->db->query($sql);
		$resul = FALSE;
		if($resp){
			$resul = TRUE;
		}
		return $resul;
	}
	public function verPlanSepare() {
		$sql = "SELECT * FROM plansepare WHERE id = {$this->getId()}";
		$resul = $this->db->query($sql);
		return $resul;
	}
	public function ReportesVentas($id,$fechaInicial,$fechaFinal) {
		
		
		if($fechaInicial == $fechaFinal){
			
			$sql = "SELECT * FROM venta WHERE fecha like '%$fechaFinal%' AND id_sucursal = $id";
			
		} else {
			
			$fechaActual = new DateTime();
			$fechaActual->add(new DateInterval("P1D"));
			$fechaActualMasUno = $fechaActual->format("Y-m-d");

			$fechaFinal2 = new DateTime($fechaFinal);
			$fechaFinal2->add(new DateInterval("P1D"));
			$fechaFinalMasUno = $fechaFinal2->format("Y-m-d");

			if ($fechaFinalMasUno == $fechaActualMasUno) {

				$sql = "SELECT * FROM venta WHERE  fecha BETWEEN '$fechaInicial' AND '$fechaFinalMasUno'  AND id_sucursal = $id";
			} else {

				$sql = "SELECT * FROM venta WHERE fecha BETWEEN '$fechaInicial' AND '$fechaFinal'  AND id_sucursal = $id";
			}
		}
		
		
		$resul = $this->db->query($sql);
		return $resul;
	}
	public function Ventas($idsucursal,$fechaInicial,$fechaFinal) {
		
		
		if($fechaInicial == $fechaFinal){
			
			$sql = "SELECT SUM(total) as total FROM venta WHERE fecha like '%$fechaFinal%'  AND id_plazo = 0  AND id_sucursal = $idsucursal";
			
		} else {
			
			$fechaActual = new DateTime();
			$fechaActual->add(new DateInterval("P1D"));
			$fechaActualMasUno = $fechaActual->format("Y-m-d");

			$fechaFinal2 = new DateTime($fechaFinal);
			$fechaFinal2->add(new DateInterval("P1D"));
			$fechaFinalMasUno = $fechaFinal2->format("Y-m-d");

			if ($fechaFinalMasUno == $fechaActualMasUno) {

				$sql = "SELECT SUM(total) as total FROM venta WHERE fecha BETWEEN '$fechaInicial' AND '$fechaFinalMasUno' AND id_plazo = 0  AND id_sucursal = $idsucursal";
			} else {

				$sql = "SELECT SUM(total) as total FROM venta WHERE fecha BETWEEN '$fechaInicial' AND '$fechaFinal' AND id_plazo = 0  AND id_sucursal = $idsucursal";
			}
		}
		
		
		$resul = $this->db->query($sql);
		return $resul;
	}
	public function MostrarSumaVentas(){
		$sql = "SELECT SUM(total) as total FROM plansepare";
		$resul = $this->db->query($sql);
		return $resul;
		
	}
	public function Abonar() {
		$sql = "UPDATE plansepare SET saldo = {$this->getSaldo()} WHERE id = {$this->getId()}";
		$resp = $this->db->query($sql);
		$result = FALSE;
		if($resp){
			$result = TRUE;
		}
		return $result;
	}
}

