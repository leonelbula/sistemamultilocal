<?php

require_once 'config/DataBase.php';

class Componente {

   public $db;
   private $id_producto;
   private $id_sucursal;
   private $detalles;

   function getId_producto() {
      return $this->id_producto;
   }

   function getId_sucursal() {
      return $this->id_sucursal;
   }

   function getDetalles() {
      return $this->detalles;
   }

   function setId_producto($id_producto) {
      $this->id_producto = $id_producto;
   }

   function setId_sucursal($id_sucursal) {
      $this->id_sucursal = $id_sucursal;
   }

   function setDetalles($detalles) {
      $this->detalles = $detalles;
   }

   public function __construct() {
      $this->db = Database::connect();
   }

   public function verDetallesComponenteProducto() {
      $sql = "SELECT * FROM componentes_producto "
              . "WHERE id_producto = {$this->getId_producto()}";

      $respt = $this->db->query($sql);
      return $respt;
   }

   public function Guardar() {
      $sql = "INSERT INTO componentes_producto VALUES ("
              . "NULL,{$this->getId_producto()},"
              . "'{$this->getDetalles()}')";

      $resp = $this->db->query($sql);
      $result = FALSE;

      if ($resp) {
         $result = TRUE;
      }
      return $result;
   }

   public function Actulizar() {
      $sql = "";
      $resp = $this->db->query($sql);
      $result = FALSE;
      if ($resp) {
         $result = TRUE;
      }
      return $result;
   }

   public function Eliminar() {
      $sql = "DELETE FROM componentes_producto WHERE id_producto = {$this->getId_producto()}";
      $resp = $this->db->query($sql);
      $result = FALSE;
      if ($resp) {
         $result = TRUE;
      }
      return $result;
   }

}
