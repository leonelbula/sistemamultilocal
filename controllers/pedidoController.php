<?php

require_once 'models/Pedido.php';
require_once 'models/Proveedor.php';

class PedidoController{
	public function index() {
		require_once 'views/layout/menu.php';
		$proveedor = new Proveedor();
		$listaproveedor = $proveedor->listarProveedor();		
		require_once 'views/pedido/listapedido.php';
		require_once 'views/layout/copy.php';
	}
	public function NuevoPedido() {
		require_once 'views/layout/menu.php';
		require_once 'views/pedido/nuevoPedido.php';		
		require_once 'views/layout/copy.php';
		
	}
}