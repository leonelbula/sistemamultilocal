<?php

require_once 'config/DataBase.php';

class CompraCliente {
	
	public $db;
	
	private $id;
        private $id_sucursal;
        private $id_cliente;
	private $valor;
	private $num_factura;
	private $fecha;
	
	function getId() {
           return $this->id;
        }

        function getId_sucursal() {
           return $this->id_sucursal;
        }

        function getId_cliente() {
           return $this->id_cliente;
        }

        function getValor() {
           return $this->valor;
        }

        function getNum_factura() {
           return $this->num_factura;
        }

        function getFecha() {
           return $this->fecha;
        }

        function setId($id) {
           $this->id = $id;
        }

        function setId_sucursal($id_sucursal) {
           $this->id_sucursal = $id_sucursal;
        }

        function setId_cliente($id_cliente) {
           $this->id_cliente = $id_cliente;
        }

        function setValor($valor) {
           $this->valor = $valor;
        }

        function setNum_factura($num_factura) {
           $this->num_factura = $num_factura;
        }

        function setFecha($fecha) {
           $this->fecha = $fecha;
        }

        	
	public function __construct() {
		$this->db = Database::connect();
	}
	public function NuevaCompraRealizada() {
		$sql = "INSERT INTO compras_cliente VALUES (NULL,"
                        . "{$this->getId_sucursal()},"
                        . "{$this->getId_cliente()},"
                        . "{$this->getValor()},"
                        . "{$this->getNum_factura()},"
                        . "'{$this->getFecha()}')";
                        
		$resp = $this->db->query($sql);
		$resul = FALSE;
		if($resp){
			$resul = TRUE;
		}
		return $resul;
	}
	public function ActulizarCompraRealizada() {
		$sql = "UPDATE compras_cliente SET valor={$this->getValor()} WHERE num_factura = {$this->getNum_factura()}";
		$resp = $this->db->query($sql);
		$resul = FALSE;
		if($resp){
			$resul = TRUE;
		}
		return $resul;
	}
	public function EliminarVenta() {
		$sql = "DELETE FROM compras_cliente WHERE num_factura = {$this->getNum_factura()}";
		$resp = $this->db->query($sql);
		$resul = FALSE;
		if($resp){
			$resul = TRUE;
		}
		return $resul;
	}
}