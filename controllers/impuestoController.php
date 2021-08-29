<?php

require_once 'models/Impuesto.php';

class ImpuestoController{
	public function Index() {
		require_once 'views/layout/menu.php';
		$impuesto = new Impuesto();
		$listaImpuesto = $impuesto->ListarImpuesto();
		require_once 'views/proveedor/listaproveedor.php';
	}
	static public function listaImpuesto() {
		$impuesto = new Impuesto();
		$listaImpuesto = $impuesto->ListarImpuesto();
		return $listaImpuesto;
	}
}