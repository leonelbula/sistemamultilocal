<?php

require_once 'models/Administracion.php';
require_once 'models/Venta.php';

class administracionController {

   public function index() {
      require_once 'views/admin/menu.php';      
      require_once 'views/admin/index.php';
      require_once 'views/layout/copy.php';
   }
   public function venta() {
      require_once 'views/admin/menu.php'; 
      $sucursal = new Administracion();
      $listaSucursal = $sucursal->MostrarSucursal();
      require_once 'views/admin/venta.php';
      require_once 'views/layout/copy.php';
   }
   public function detallesventasucursal() {
      require_once 'views/admin/menu.php';       
      require_once 'views/admin/detallesVenta.php';
      require_once 'views/layout/copy.php';
   }
   public function detallesproductos() {
      require_once 'views/admin/menu.php';  
      $sucursal = new Administracion();
      $listaSucursal = $sucursal->MostrarSucursal();
      require_once 'views/admin/productosSucursal.php';
      require_once 'views/layout/copy.php';
   }
   public function productosucursal() {
      require_once 'views/admin/menu.php';       
      require_once 'views/inventario/inventario.php';
      require_once 'views/layout/copy.php';
   }
     public function Editar() {
      if ($_GET['id']) {
         require_once 'views/layout/menu.php';
         $id_producto = $_GET['id'];
         $producto = new Inventario();
         $producto->setId_producto($id_producto);
         $detallesProductos = $producto->MostrarProductosId();

         require_once 'views/inventario/editar.php';
         require_once 'views/layout/copy.php';
      } else {
         echo'<script>

					swal({
						  type: "error",
						  title: "¡No A seleccionado un producto !",
						  showConfirmButton: true,
						  confirmButtonText: "Cerrar"
						  }).then(function(result){
							if (result.value) {

							window.location = "index";

							}
						})

			  	</script>';
      }
   }
    public function listaventa() {
      require_once 'views/admin/menu.php';    
         if (isset($_GET["fechaInicial"])) {
         $id = $_GET['id'];
         $fechaInicial = $_GET["fechaInicial"];
         $fechaFinal = $_GET["fechaFinal"];

         $ventas = new Venta();
         $detalleVentasSucursal = $ventas->ReportesVentas($id,$fechaInicial, $fechaFinal);
      } 
      require_once 'views/ventas/listaventas.php';
      require_once 'views/layout/copy.php';
   }
   public function reportes() {
      require_once 'views/admin/menu.php';  
      $sucursal = new Administracion();
      $listaSucursal = $sucursal->MostrarSucursal();
      require_once 'views/admin/reportes.php';
      require_once 'views/layout/copy.php';
   }
   public function reportessucursal() {
      require_once 'views/admin/menu.php';  
     require_once 'views/reportes/reporte.php';
      require_once 'views/layout/copy.php';
   }
    public function utilidades() {
      require_once 'views/admin/menu.php';
  
      require_once 'views/reportes/utilidades.php';
      require_once 'views/layout/copy.php';
   }
  public function estganaciaperdidas() {
      require_once 'views/admin/menu.php';
      require_once 'views/reportes/estganaciaperdidas.php';
      require_once 'views/layout/copy.php';
   }
   public function valorinventario() {
      require_once 'views/admin/menu.php';     

      require_once 'views/reportes/valorinventario.php';
      require_once 'views/layout/copy.php';
   }
    public function usuariosucursal() {

      require_once 'views/admin/menu.php';
      $sucursal = new Administracion();
      $listaSucursal = $sucursal->MostrarSucursal();
      require_once 'views/admin/usuarios.php';
      require_once 'views/layout/copy.php';
   }
     public function usuarios() {

      require_once 'views/admin/menu.php';      
       require_once 'views/usuario/listausuario.php';
      require_once 'views/layout/copy.php';
   }

}
