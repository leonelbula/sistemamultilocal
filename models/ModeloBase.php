<?php

/* 
 * modelo de Conexion a la base de datos
 */
require_once 'config/DataBase.php';

class ModeloBase{
	
	public  $db;
	
	public function __construct() {
		$this->db = Database::connect();
	}		
  
    
}

