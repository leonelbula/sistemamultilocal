<?php

//require_once 'ModeloBase.php';
require_once 'config/DataBase.php';

class Inventario {

   public $db;
   private $id_producto;
   private $id_sucursal;
   private $codigo;
   private $nombre;
   private $costo;
   private $precio;
   private $utilidad;
   private $id_categoria;
   private $cantidad_Inicial;
   private $imagen;
   private $codigo_vendedor;
   private $cantidad_minima;
   private $id_proveedor;

   function getId_producto() {
      return $this->id_producto;
   }

   function getId_sucursal() {
      return $this->id_sucursal;
   }

   function getCodigo() {
      return $this->codigo;
   }

   function getNombre() {
      return $this->nombre;
   }

   function getCosto() {
      return $this->costo;
   }

   function getPrecio() {
      return $this->precio;
   }

   function getUtilidad() {
      return $this->utilidad;
   }

   function getId_categoria() {
      return $this->id_categoria;
   }

   function getCantidad_Inicial() {
      return $this->cantidad_Inicial;
   }

   function getImagen() {
      return $this->imagen;
   }

   function getCodigo_vendedor() {
      return $this->codigo_vendedor;
   }

   function getCantidad_minima() {
      return $this->cantidad_minima;
   }

   function getId_proveedor() {
      return $this->id_proveedor;
   }

   function setId_producto($id_producto) {
      $this->id_producto = $id_producto;
   }

   function setId_sucursal($id_sucursal) {
      $this->id_sucursal = $id_sucursal;
   }

   function setCodigo($codigo) {
      $this->codigo = $codigo;
   }

   function setNombre($nombre) {
      $this->nombre = $nombre;
   }

   function setCosto($costo) {
      $this->costo = $costo;
   }

   function setPrecio($precio) {
      $this->precio = $precio;
   }

   function setUtilidad($utilidad) {
      $this->utilidad = $utilidad;
   }

   function setId_categoria($id_categoria) {
      $this->id_categoria = $id_categoria;
   }

   function setCantidad_Inicial($cantidad_Inicial) {
      $this->cantidad_Inicial = $cantidad_Inicial;
   }

   function setImagen($imagen) {
      $this->imagen = $imagen;
   }

   function setCodigo_vendedor($codigo_vendedor) {
      $this->codigo_vendedor = $codigo_vendedor;
   }

   function setCantidad_minima($cantidad_minima) {
      $this->cantidad_minima = $cantidad_minima;
   }

   function setId_proveedor($id_proveedor) {
      $this->id_proveedor = $id_proveedor;
   }

   public function __construct() {
      $this->db = Database::connect();
   }

   public function MostrarProductosId() {
      $sql = "SELECT * FROM product WHERE id = {$this->getId_producto()}";
      $resul = $this->db->query($sql);
      return $resul;
   }

   public function TotalProductos() {
      $sql = "SELECT COUNT(id) as total FROM product ";
      $resul = $this->db->query($sql);
      return $resul;
   }

   public function MostrarProductos() {
      $sql = "SELECT * FROM product ";
      $resul = $this->db->query($sql);
      return $resul;
   }

   public function MostrarUltimoProductos() {
      $sql = "SELECT p.id , p.codigo FROM product p ORDER by id DESC LIMIT 1";
      $resul = $this->db->query($sql);
      return $resul;
   }

   public function Guardar() {
      $sql = "INSERT INTO product VALUES("
              . "NULL,{$this->getId_sucursal()}, "
              . "{$this->getId_proveedor()},"
              . "'{$this->getCodigo()}',"
              . "'{$this->getNombre()}',"
              . "{$this->getCosto()},"
              . "{$this->getPrecio()},"
              . "{$this->getUtilidad()},"
              . "{$this->getId_categoria()},"
              . "{$this->getCantidad_Inicial()},"
              . "'{$this->getImagen()}',"
              . "'{$this->getCodigo_vendedor()}',"
              . "{$this->getCantidad_minima()}"
              . ")";

      $resp = $this->db->query($sql);

      $resul = FALSE;

      if ($resp) {

         $resul = TRUE;
      }
      return $resul;
   }

   public function Actulizar() {

      $sql = "UPDATE product SET "
              . "id_vendor = {$this->getId_proveedor()},"
              . "codigo='{$this->getCodigo()}',"
              . "nombre='{$this->getNombre()}',"
              . "costo={$this->getCosto()},"
              . "precioventa={$this->getPrecio()},"
              . "utilidad={$this->getUtilidad()},"
              . "id_categoria={$this->getId_categoria()},"
              . "can_inicial={$this->getCantidad_Inicial()},"
              . "imagen='{$this->getImagen()}',"
              . "codigo_fabr='{$this->getCodigo_vendedor()}',"
              . "cantidad_min={$this->getCantidad_minima()} "
              . "WHERE id = {$this->getId_producto()}";

      $resp = $this->db->query($sql);

      $resul = FALSE;

      if ($resp) {
         $resul = TRUE;
      }
      return $resul;
   }

   public function Eliminar() {

      $sql = "DELETE FROM product WHERE id = {$this->getId_producto()}";
      $resp = $this->db->query($sql);

      $resul = FALSE;

      if ($resp) {
         $resul = TRUE;
      }
      return $resul;
   }

   public function VercantidadProducto() {
      $sql = "SELECT can_inicial FROM product WHERE id = {$this->getId_producto()}";
      $resp = $this->db->query($sql);

      return $resp;
   }

   public function CostoProducto() {
      $sql = "SELECT costo FROM product WHERE id = {$this->getId_producto()}";
      $resp = $this->db->query($sql);

      return $resp;
   }

   public function ActulizarStock() {

      $sql = "UPDATE product SET "
              . "can_inicial={$this->getCantidad_Inicial()} "
              . " WHERE id = {$this->getId_producto()}";

      $resp = $this->db->query($sql);

      $resul = FALSE;

      if ($resp) {

         $resul = TRUE;
      }

      return $resul;
   }
   public function ActulizarCosto() {

      $sql = "UPDATE product SET "
              . "costo={$this->getCosto()} "
              . " WHERE id = {$this->getId_producto()}";

      $resp = $this->db->query($sql);

      $resul = FALSE;

      if ($resp) {

         $resul = TRUE;
      }

      return $resul;
   }

   public function VentaProductos() {

      $sql = "SELECT p.nombre, COUNT(v.cantidad) AS cantidad FROM vanta_producto v INNER JOIN product p ON v.id_producto=p.id GROUP BY v.id_producto";
      $resp = $this->db->query($sql);

      return $resp;
   }

   public function ValorInventario() {
      $sql = "SELECT SUM(costo*can_inicial) as resultado FROM product WHERE id_sucursal = {$this->getId_sucursal()} ";
      $resp = $this->db->query($sql);

      return $resp;
   }

   public function stock() {
      $sql = "SELECT COUNT(id) AS total  FROM product WHERE cantidad_min >= can_inicial";
      $resp = $this->db->query($sql);

      return $resp;
   }

}
