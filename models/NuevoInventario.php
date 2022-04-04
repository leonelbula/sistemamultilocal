<?php

require_once 'config/DataBase.php';

class NuevoInventario{
   
   public $db;
   
   private $id;
   private $fechainicio;
   private $fechafinal;
   private $estado;
   
   function getId() {
      return $this->id;
   }

   function getFechainicio() {
      return $this->fechainicio;
   }

   function getFechafinal() {
      return $this->fechafinal;
   }

   function getEstado() {
      return $this->estado;
   }

   function setId($id) {
      $this->id = $id;
   }

   function setFechainicio($fechainicio) {
      $this->fechainicio = $fechainicio;
   }

   function setFechafinal($fechafinal) {
      $this->fechafinal = $fechafinal;
   }

   function setEstado($estado) {
      $this->estado = $estado;
   }

   public function __construct() {
      $this->db = Database::connect();
   }
   
   public function verActivos() {
      $sql = "SELECT * FROM nuevoinventario";
      $rept = $this->db->query($sql);
      return $rept;
   }
   public function verActivosId() {
      $sql = "SELECT * FROM nuevoinventario WHERE id = {$this->getId()}";
      $rept = $this->db->query($sql);
      return $rept;
   }
     public function Save() {
      $sql = "INSERT INTO nuevoinventario VALUES (NULL,"
              . "'{$this->getFechainicio()}',"
              . "'{$this->getFechafinal()}',"
              . "{$this->getEstado()})";
      $rept = $this->db->query($sql);
      
      $resul = false;
      if($rept){
         $resul = true;
      }
      return $sql;
   }
   public function Update() {
      $sql = "UPDATE nuevoinventario SET fechafinal='{$this->getFechafinal()}',estado = {$this->getEstado()} WHERE estado = 1";
      $rept = $this->db->query($sql);
      
      $resul = false;
      if($rept){
         $resul = true;
      }
      return $resul;
   }
   
}