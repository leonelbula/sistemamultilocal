<?php

require_once '../config/DataBase.php';

class ListaCompras {

   public $db;

   public function __construct() {
      $this->db = Database::connect();
   }

   public function Mostrar($id_sucursal) {
      $sql = "SELECT * FROM compra  WHERE id_sucursal = $id_sucursal ORDER BY id DESC";
      $resul = $this->db->query($sql);
      return $resul;
   }

   public function proveedorId($id) {
      $sql = "SELECT * FROM proveedor  WHERE id = $id";
      $resul = $this->db->query($sql);
      return $resul;
   }

}

class ajaxTablaCompras {

   public function MostrarCompras() {

      $idSucursal = $_GET['idsucursal'];

      $datosJson = '{
		  "data":[';
      $i = 1;
      $compra = new ListaCompras();
      $listaCompra = $compra->Mostrar($idSucursal);
      while ($row = $listaCompra->fetch_object()) {

         $id = $row->id_proveedor;
         $detallesproveedor = $compra->proveedorId($id);

         while ($row1 = $detallesproveedor->fetch_object()) {
            $nomProveedor = $row1->nombre;
         }

         if ($row->tipo == 1) {

            $tipo = "<button class='btn btn-primary btn-xs'>Credito</button>";
         } else {

            $tipo = "<button class='btn btn-info btn-xs'>Contado</button>";
         }

         /* =============================================
           TRAEMOS LAS ACCIONES
           ============================================= */


         $botones = "<div class='btn-group'><button class='btn btn-info btnImprimirFactura' codigoVenta='" . $row->numero_factura . "'><i class='fa fa-print'></i></button><a href='editarventa&id=" . $row->id . "'><button class='btn btn-warning  btnEditarVenta'><i class='fa fa-pencil'></i></button></a><button class='btn btn-danger btnEliminarVenta' idVenta='" . $row->id . "'><i class='fa fa-times'></i></button></div>";
         $Dian = "<div class='btn-group'><a><button class='btn btn-success btnEnviarVenta'>Enviar</button></a></div>";

         //$redir = "href='ver&id=".$row->id."'";




         $datosJson .= '[
			      "' . ($i++) . '",
			      "' . $row->numero_factura . '",
			      "' . $nomProveedor . '",
			      "' . $row->fecha . '",			     
			      "' . $row->fecha_vencimiento . '",
				  "' . $row->total . '",
				  "' . $tipo . '",
				  "' . $botones . '",
			     
			    ],';
      }

      $datosJson = substr($datosJson, 0, -1);

      $datosJson .= '] 

		 }';

      echo $datosJson;
   }

}

$ventas = new ajaxTablaCompras();
$ventas->MostrarCompras();
