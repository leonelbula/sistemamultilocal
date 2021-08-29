<?php

require_once 'config/DataBase.php';

class Conteo{
   
   public $db;
   private $id;
   private $id_registro;
   private $id_producto;
   private $nombre;
   private $costo;
   private $cantidad_actual;
   private $contado;
   private $diferencia;
   private $valor_diferencia;
   
   function getId() {
      return $this->id;
   }

   function getId_registro() {
      return $this->id_registro;
   }

   function getId_producto() {
      return $this->id_producto;
   }

   function getNombre() {
      return $this->nombre;
   }

   function getCosto() {
      return $this->costo;
   }

   function getCantidad_actual() {
      return $this->cantidad_actual;
   }

   function getContado() {
      return $this->contado;
   }

   function getDiferencia() {
      return $this->diferencia;
   }

   function getValor_diferencia() {
      return $this->valor_diferencia;
   }

   function setId($id) {
      $this->id = $id;
   }

   function setId_registro($id_registro) {
      $this->id_registro = $id_registro;
   }

   function setId_producto($id_producto) {
      $this->id_producto = $id_producto;
   }

   function setNombre($nombre) {
      $this->nombre = $nombre;
   }

   function setCosto($costo) {
      $this->costo = $costo;
   }

   function setCantidad_actual($cantidad_actual) {
      $this->cantidad_actual = $cantidad_actual;
   }

   function setContado($contado) {
      $this->contado = $contado;
   }

   function setDiferencia($diferencia) {
      $this->diferencia = $diferencia;
   }

   function setValor_diferencia($valor_diferencia) {
      $this->valor_diferencia = $valor_diferencia;
   }

   public function __construct() {
      $this->db = Database::connect();
   }
   
   public function verificar() {
      $sql = "SELECT * FROM conteo WHERE id_producto = {$this->getId_producto()}";
      $resul = $this->db->query($sql);
      return $resul;
   }
   
   public function MostrarConteo() {
      $sql = "SELECT * FROM conteo";
      $resul = $this->db->query($sql);
      return $resul;
   }
     public function MostrarDescuadre() {
      $sql = "SELECT * FROM conteo WHERE diferencia < 0 OR diferencia > 0";
      $resul = $this->db->query($sql);
      return $resul;
   }
    public function MostrarConteoId() {
      $sql = "SELECT * FROM conteo WHERE id_producto = {$this->getId_producto()}";
      $resul = $this->db->query($sql);
      return $resul;
   }
   
   public function Save() {
      $sql = "INSERT INTO conteo  VALUES (NULL, "
              . "{$this->getId_registro()},"
              . " {$this->getId_producto()}, "
              . "'{$this->getNombre()}',"
              . " {$this->getCosto()},"
              . " {$this->getCantidad_actual()},"
              . "{$this->getContado()},"
              . " {$this->getDiferencia()},"
              . "{$this->getValor_diferencia()})";
              
      $rept = $this->db->query($sql);
      $resul = false;
      if($rept){
         $resul = true;
      }
      return $resul;
   }
   
   public function update() {
      $sql = "UPDATE conteo SET contado ={$this->getContado()},"
                      . " diferencia ={$this->getDiferencia()},"
                      . " valor_diferencia = {$this->getValor_diferencia()}"
                      . " WHERE id_producto = {$this->getId_producto()}";
              
      $rept = $this->db->query($sql);
      $resul = false;
      if($rept){
         $resul = true;
      }
      return $resul;
   }
   
}