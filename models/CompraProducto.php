<?php

require_once 'config/DataBase.php';

class CompraProduto {
	
	public $db;
	
	private $id;
	private $id_producto;
        private $id_sucursal;
        private $cantidad;
	private $num_factura;
	private $fecha;
	
	function getId() {
           return $this->id;
        }

        function getId_producto() {
           return $this->id_producto;
        }

        function getId_sucursal() {
           return $this->id_sucursal;
        }

        function getCantidad() {
           return $this->cantidad;
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

        function setId_producto($id_producto) {
           $this->id_producto = $id_producto;
        }

        function setId_sucursal($id_sucursal) {
           $this->id_sucursal = $id_sucursal;
        }

        function setCantidad($cantidad) {
           $this->cantidad = $cantidad;
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
	public function CompraProductoRealizada() {
		$sql = "INSERT INTO compra_producto VALUES(NULL,{$this->getId_sucursal()},{$this->getId_producto()}, {$this->getCantidad()},{$this->getNum_factura()}, '{$this->getFecha()}')";
		$resp = $this->db->query($sql);
		$resul = FALSE;
		if($resp){
			$resul = TRUE;
		}
		return $resul;
	}
	public function EliminarC() {
		$sql = "DELETE FROM compra_producto WHERE numero_factura = {$this->getNum_factura()}";
		$result = $this->db->query($sql);
		return $result;
	}
}