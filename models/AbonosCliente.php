<?php

require_once 'config/DataBase.php';

class AbonosCliente {

   private $db;
   private $id;
   private $id_sucursal;
   private $id_factura;
   private $valor;
   private $descripcion;
   private $fecha;

   function getId() {
      return $this->id;
   }

   function getId_factura() {
      return $this->id_factura;
   }

   function getId_sucursal() {
      return $this->id_sucursal;
   }

   function getValor() {
      return $this->valor;
   }

   function getDescripcion() {
      return $this->descripcion;
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

   function setId_factura($id_factura) {
      $this->id_factura = $id_factura;
   }

   function setValor($valor) {
      $this->valor = $valor;
   }

   function setDescripcion($descripcion) {
      $this->descripcion = $descripcion;
   }

   function setFecha($fecha) {
      $this->fecha = $fecha;
   }

   public function __construct() {
      $this->db = Database::connect();
   }

   public function RegistrarAbono() {
      $sql = "INSERT INTO abono_venta VALUES (NULL,{$this->getId_sucursal()},{$this->getId_factura()},{$this->getValor()},'{$this->getDescripcion()}','{$this->getFecha()}')";
      $resp = $this->db->query($sql);
      $respt = FALSE;
      if ($resp) {
         $respt = TRUE;
      }
      return $sql;
   }

   public function MostrarAbonosId() {
      $sql = "SELECT * FROM abono_venta WHERE id_factura = {$this->getId_factura()} ORDER BY id DESC";
      $resp = $this->db->query($sql);
      return $resp;
   }

   public function VerAbonoId() {
      $sql = "SELECT * FROM abono_venta WHERE id = {$this->getId()}";
      $resp = $this->db->query($sql);
      return $resp;
   }

   public function EditarAbono() {
      $sql = "UPDATE abono_venta SET valor = {$this->getValor()},descripcion = '{$this->getDescripcion()}',fecha='{$this->getFecha()}' WHERE id = {$this->getId()};";
      $resp = $this->db->query($sql);
      $result = FALSE;
      if ($resp) {
         $result = TRUE;
      }
      return $result;
   }

   public function Eliminarbono() {
      $sql = "DELETE FROM abono_venta  WHERE id = {$this->getId()};";
      $resp = $this->db->query($sql);
      $result = FALSE;
      if ($resp) {
         $result = TRUE;
      }
      return $result;
   }

   public function AbonosDiarios($idsucursal, $fechaInicial, $fechaFinal) {


      if ($fechaInicial == $fechaFinal) {

         $sql = "SELECT SUM(valor) as total FROM abono_venta WHERE fecha like '%$fechaFinal%'  AND id_sucursal = $idsucursal";
      } else {

         $fechaActual = new DateTime();
         $fechaActual->add(new DateInterval("P1D"));
         $fechaActualMasUno = $fechaActual->format("Y-m-d");

         $fechaFinal2 = new DateTime($fechaFinal);
         $fechaFinal2->add(new DateInterval("P1D"));
         $fechaFinalMasUno = $fechaFinal2->format("Y-m-d");

         if ($fechaFinalMasUno == $fechaActualMasUno) {

            $sql = "SELECT SUM(valor) as total FROM abono_venta WHERE fecha BETWEEN '$fechaInicial' AND '$fechaFinalMasUno'  AND id_sucursal = $idsucursal";
         } else {

            $sql = "SELECT SUM(valor) as total FROM abono_venta WHERE fecha BETWEEN '$fechaInicial' AND '$fechaFinal'  AND id_sucursal = $idsucursal";
         }
      }


      $resul = $this->db->query($sql);
      return $resul;
   }

}
