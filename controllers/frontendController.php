<?php

require_once 'models/Venta.php';
require_once 'models/Compra.php';
require_once 'models/Cliente.php';
require_once 'models/Inventario.php';
require_once 'models/Notificaciones.php';


class frontendController{
	
	public function index() {
		
		require_once 'views/login/login.php';
		
	}	
	public function Principal() {		
		
		require_once 'views/layout/menu.php';
		require_once 'views/layout/principal.php';
		require_once 'views/layout/copy.php';
		
	}
	static public function Notificaciones($id_sucursal) {
		$notificaciones = new Notificaciones();
        $notificaciones->setId_sucursal($id_sucursal);
		$Notificacion = $notificaciones->MostrarNotificacione();
		return $Notificacion;
	}
}

