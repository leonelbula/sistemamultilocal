<?php

require_once 'models/Gastos.php';
require_once 'models/Venta.php';
require_once 'models/Inventario.php';

class reporteController {

   public function index() {
       require_once 'views/layout/menu.php';
       require_once 'views/reportes/reporte.php';
       
   }

   public function utilidades() {
      require_once 'views/layout/menu.php';
  
      require_once 'views/reportes/utilidades.php';
      require_once 'views/layout/copy.php';
   }

   public function estganaciaperdidas() {
      require_once 'views/layout/menu.php';
      require_once 'views/reportes/estganaciaperdidas.php';
      require_once 'views/layout/copy.php';
   }
     static public function totalventasucursal($id_sucursal) {
      $ventas = new Venta();
      $ventas->setId_sucursal($id_sucursal);
      $totalVentas = $ventas->TotalVentas();
      return $totalVentas;
   }
   static public function totalganaciasucursal($id_sucursal) {
      $ventas = new Venta();
      $ventas->setId_sucursal($id_sucursal);
      $total = $ventas->TotalUtilidad();
      return $total;
   }
    static public function totalgastosucursal($id_sucursal) {
      $gastos = new Gastos();
      $gastos->setId_sucursal($id_sucursal);
      $valor = $gastos->TotalGastos();      
      return $valor;
   }

   public function valorinventario() {
      require_once 'views/layout/menu.php';
      $inventario = new Inventario();

      $valorInventario = $inventario->ValorInventario();

      require_once 'views/reportes/valorinventario.php';
      require_once 'views/layout/copy.php';
   }
   static public function totalInventarioActual($id_sucursal) {
      $inventario = new Inventario();
      $inventario->setId_sucursal($id_sucursal);
      $valorInventario = $inventario->ValorInventario();
      return $valorInventario;
   }
   
  
}
