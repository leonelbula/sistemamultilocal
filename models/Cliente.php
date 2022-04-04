<?php

require_once 'config/DataBase.php';

class Cliente{

	public $db;
	
	private $id;
        private $id_sucursal;
        private $nombre;
	private $nit;
	private $direccion;
	private $departamento;
	private $ciudad; 
	private $email;
	private $telefono;
	private $tipo; 
	private $precio_facturar; 
	private $interes;	
	private $cuenta_contable;

	function getId() {
           return $this->id;
        }

        function getId_sucursal() {
           return $this->id_sucursal;
        }

        function getNombre() {
           return $this->nombre;
        }

        function getNit() {
           return $this->nit;
        }

        function getDireccion() {
           return $this->direccion;
        }

        function getDepartamento() {
           return $this->departamento;
        }

        function getCiudad() {
           return $this->ciudad;
        }

        function getEmail() {
           return $this->email;
        }

        function getTelefono() {
           return $this->telefono;
        }

        function getTipo() {
           return $this->tipo;
        }

        function getPrecio_facturar() {
           return $this->precio_facturar;
        }

        function getInteres() {
           return $this->interes;
        }

        function getCuenta_contable() {
           return $this->cuenta_contable;
        }

        function setId($id) {
           $this->id = $id;
        }

        function setId_sucursal($id_sucursal) {
           $this->id_sucursal = $id_sucursal;
        }

        function setNombre($nombre) {
           $this->nombre = $nombre;
        }

        function setNit($nit) {
           $this->nit = $nit;
        }

        function setDireccion($direccion) {
           $this->direccion = $direccion;
        }

        function setDepartamento($departamento) {
           $this->departamento = $departamento;
        }

        function setCiudad($ciudad) {
           $this->ciudad = $ciudad;
        }

        function setEmail($email) {
           $this->email = $email;
        }

        function setTelefono($telefono) {
           $this->telefono = $telefono;
        }

        function setTipo($tipo) {
           $this->tipo = $tipo;
        }

        function setPrecio_facturar($precio_facturar) {
           $this->precio_facturar = $precio_facturar;
        }

        function setInteres($interes) {
           $this->interes = $interes;
        }

        function setCuenta_contable($cuenta_contable) {
           $this->cuenta_contable = $cuenta_contable;
        }

        	
	
	public function __construct() {
		$this->db = Database::connect();
	}
	public function listarClientes() {
		$sql = "SELECT * FROM cliente";
		$resul = $this->db->query($sql);
		return $resul;
	}
	public function TotalClientes() {
		$sql = "SELECT COUNT(id) as total FROM cliente";
		$resul = $this->db->query($sql);
		return $resul;
	}
	public function listarClienteId() {
		$sql = "SELECT * FROM cliente WHERE id = {$this->getId()}";
		$resul = $this->db->query($sql);
		return $resul;
	}
   public function ventasAsociadas(){
      $sql = "SELECT * FROM venta WHERE id_cliente = {$this->getId()}";
      $result = $this->db->query($sql);    
      return $result;
   }
	public function Guargar() {
		$sql = "INSERT INTO cliente VALUES (NULL,"
                        . "{$this->getId_sucursal()},"
                        . "'{$this->getNombre()}',"
                        . "'{$this->getNit()}',"
                        . "'{$this->getDireccion()}',"
			. " '{$this->getDepartamento()}',"
                        . "'{$this->getCiudad()}',"
                        . "'{$this->getEmail()}',"
                        . "'{$this->getTelefono()}')";
                        
		$resp = $this->db->query($sql);
		$resul = FALSE;
		if($resp){
			$resul = TRUE;
		}		
		return $resul;
	}
	public function Actualizar() {
		$sql = "UPDATE cliente SET nombre='{$this->getNombre()}',nit='{$this->getNit()}',direccion='{$this->getDireccion()}',"
		. "departamento='{$this->getDepartamento()}',ciudad='{$this->getCiudad()}',email='{$this->getEmail()}',telefono='{$this->getTelefono()}'"
		. " WHERE id = {$this->getId()}";
		$resp = $this->db->query($sql);
		$result = FALSE;
		if($resp){
			$result = TRUE;
		}
		return $result;
	}
	public function Eliminar() {
		$sql = "DELETE FROM cliente WHERE  id = {$this->getId()}";
		$resp = $this->db->query($sql);
		$resul = FALSE;
		if($resp){
			$resul = TRUE;
		}
		return $resul;
	}
}
