<?php

require_once 'config/DataBase.php';

class Venta{
	
	public $db;
	
	private $id;
        private $id_sucursal;
        private $codigo;
	private $fecha;
	private $hora;
	private $tipo;
	private $id_plazo;
	private $fecha_vencimiento;
	private $id_cliente;
	private $detalle_venta;	
	private $total;
	private $saldo;
	private $utilidad;

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

        function getHora() {
           return $this->hora;
        }

        function getTipo() {
           return $this->tipo;
        }

        function getId_plazo() {
           return $this->id_plazo;
        }

        function getFecha_vencimiento() {
           return $this->fecha_vencimiento;
        }

        function getId_cliente() {
           return $this->id_cliente;
        }

        function getDetalle_venta() {
           return $this->detalle_venta;
        }

        function getTotal() {
           return $this->total;
        }

        function getSaldo() {
           return $this->saldo;
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

        function setCodigo($codigo) {
           $this->codigo = $codigo;
        }

        function setFecha($fecha) {
           $this->fecha = $fecha;
        }

        function setHora($hora) {
           $this->hora = $hora;
        }

        function setTipo($tipo) {
           $this->tipo = $tipo;
        }

        function setId_plazo($id_plazo) {
           $this->id_plazo = $id_plazo;
        }

        function setFecha_vencimiento($fecha_vencimiento) {
           $this->fecha_vencimiento = $fecha_vencimiento;
        }

        function setId_cliente($id_cliente) {
           $this->id_cliente = $id_cliente;
        }

        function setDetalle_venta($detalle_venta) {
           $this->detalle_venta = $detalle_venta;
        }

        function setTotal($total) {
           $this->total = $total;
        }

        function setSaldo($saldo) {
           $this->saldo = $saldo;
        }

        function setUtilidad($utilidad) {
           $this->utilidad = $utilidad;
        }

                
	public function __construct() {
		$this->db = Database::connect();
	}
	public function MostrarVentasSucursal() {
		$sql = "SELECT * FROM venta WHERE id_sucursal = {$this->getId_sucursal()} ORDER BY id DESC";
		$resul = $this->db->query($sql);
		return $resul;
	}	
	public function MostrarVentasSucursalGrafico() {
		$sql = "SELECT * FROM venta WHERE id_sucursal = {$this->getId_sucursal()}";
		$resul = $this->db->query($sql);
		return $resul;
	}	
	public function TotalVentas() {
		$sql = "SELECT SUM(total) as total FROM venta WHERE id_sucursal = {$this->getId_sucursal()}";
		$resul = $this->db->query($sql);
		return $resul;
	}
	public function TotalUtilidad() {
		$sql = "SELECT SUM(utilidad) as total FROM venta WHERE id_sucursal = {$this->getId_sucursal()}";
		$resul = $this->db->query($sql);
		return $resul;
	}
	public function MostrarVentasCliente() {
		$sql = "SELECT id_cliente, SUM(total) AS total,SUM(saldo) AS saldo FROM venta WHERE id_sucursal = {$this->getId_sucursal()} GROUP BY id_cliente";
		$resul = $this->db->query($sql);
		return $resul;
	}
	public function MostrarComprasCliente() {
		$sql = "SELECT * FROM venta WHERE id_cliente = {$this->getId_cliente()} ORDER BY id DESC";
		$resul = $this->db->query($sql);
		return $resul;
	}
	public function MostrarVentasId() {
		$sql = "SELECT * FROM venta WHERE id = {$this->getId()}";
		$resul = $this->db->query($sql);
		return $resul;
	}
	public function GuardarVenta() {
		$sql = "INSERT INTO venta VALUES ("
                        . "NULL,{$this->getId_sucursal()},"
                        . "{$this->getCodigo()},"
                        . "'{$this->getFecha()}',"
                        . "'{$this->getHora()}',"
                        . "{$this->getTipo()},"
                        . "{$this->getId_plazo()},"
                        . "'{$this->getFecha_vencimiento()}',"
                        . "{$this->getId_cliente()},"
                        . "'{$this->getDetalle_venta()}',"
                        . "{$this->getTotal()},"
                        . "{$this->getSaldo()},"
                        . "{$this->getUtilidad()})";
                        
		$resp = $this->db->query($sql);
		$link = $this->db;
		$resul = mysqli_insert_id($link);
//		if($resp){
//			$resul = TRUE;
//		}
		return $resul;
	}
	public function VerUltimaVenta() {
		$sql = "SELECT * FROM venta WHERE id_sucursal = {$this->getId_sucursal()} ORDER BY id DESC LIMIT 1";
		$resp = $this->db->query($sql);
		return $resp;
	}
	public function VerVenta() {
		$sql = "SELECT * FROM venta WHERE id = {$this->getId()}";
		$resp = $this->db->query($sql);
		return $resp;
	}
	public function Actulizar() {
		$sql = "UPDATE venta SET "
                        . "fecha='{$this->getFecha()}',"
                        . "hora='{$this->getHora()}',"
                        . "tipo={$this->getTipo()},"
                        . "id_plazo={$this->getId_plazo()},"
                        . "fecha_vencimiento='{$this->getFecha_vencimiento()}',"
                        . "id_cliente = {$this->getId_cliente()},"
                        . "detalle_venta='{$this->getDetalle_venta()}',"                                              
                        . "total={$this->getTotal()},"
                        . "saldo={$this->getSaldo()},"
                        . "utilidad={$this->getUtilidad()} "
                        . "WHERE id = {$this->getId()}";
                        
		$resp = $this->db->query($sql);
		$resul = FALSE;
		if($resp){
			$resul = TRUE;
		}
		return $resul;
	}
	public function EliminarVenta() {
		$sql = "DELETE FROM venta WHERE id = {$this->getId()}";
		$resp = $this->db->query($sql);
		$resul = FALSE;
		if($resp){
			$resul = TRUE;
		}
		return $resul;
	}
	public function VerVentaCodigo() {
		$sql = "SELECT * FROM venta WHERE codigo = {$this->getCodigo()}";
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
			
			$sql = "SELECT SUM(total) as total FROM venta WHERE  id_sucursal =  $idsucursal AND fecha like '%$fechaFinal%'  AND tipo = 0";
			
		} else {
			
			$fechaActual = new DateTime();
			$fechaActual->add(new DateInterval("P1D"));
			$fechaActualMasUno = $fechaActual->format("Y-m-d");

			$fechaFinal2 = new DateTime($fechaFinal);
			$fechaFinal2->add(new DateInterval("P1D"));
			$fechaFinalMasUno = $fechaFinal2->format("Y-m-d");

			if ($fechaFinalMasUno == $fechaActualMasUno) {

				$sql = "SELECT SUM(total) as total FROM venta WHERE id_sucursal =  $idsucursal AND fecha BETWEEN '$fechaInicial' AND '$fechaFinalMasUno' AND tipo = 0 ";
			} else {

				$sql = "SELECT SUM(total) as total FROM venta WHERE id_sucursal =  $idsucursal AND fecha BETWEEN '$fechaInicial' AND '$fechaFinal' AND tipo = 0";
			}
		}
		
		
		$resul = $this->db->query($sql);
		return $resul;
	}
	public function otros($idsucursal,$fechaInicial,$fechaFinal) {
		
		
		if($fechaInicial == $fechaFinal){
			
			$sql = "SELECT SUM(total) as total FROM id_sucursal =  $idsucursal AND venta WHERE fecha like '%$fechaFinal%'  AND tipo = 2";
			
		} else {
			
			$fechaActual = new DateTime();
			$fechaActual->add(new DateInterval("P1D"));
			$fechaActualMasUno = $fechaActual->format("Y-m-d");

			$fechaFinal2 = new DateTime($fechaFinal);
			$fechaFinal2->add(new DateInterval("P1D"));
			$fechaFinalMasUno = $fechaFinal2->format("Y-m-d");

			if ($fechaFinalMasUno == $fechaActualMasUno) {

				$sql = "SELECT SUM(total) as total FROM venta WHERE id_sucursal =  $idsucursal AND fecha BETWEEN '$fechaInicial' AND '$fechaFinalMasUno' AND tipo = 2";
			} else {

				$sql = "SELECT SUM(total) as total FROM venta WHERE id_sucursal =  $idsucursal AND fecha BETWEEN '$fechaInicial' AND '$fechaFinal' AND tipo = 2";
			}
		}
		
		
		$resul = $this->db->query($sql);
		return $resul;
	}
	public function MostrarSumaVentas(){
		$sql = "SELECT SUM(total) as total FROM venta";
		$resul = $this->db->query($sql);
		return $resul;
		
	}
	public function Abonar() {
		$sql = "UPDATE venta SET saldo = {$this->getSaldo()} WHERE id = {$this->getId()}";
		$resp = $this->db->query($sql);
		$result = FALSE;
		if($resp){
			$result = TRUE;
		}
		return $result;
	}
}

