<?php

require_once '../../../config/DataBase.php';

class ListaPedido {
	
public $db;


public function __construct() {
$this->db = Database::connect();
}	
public function MostrarInformacionEmpresa() {
$sql = "SELECT * FROM datos_empresa ";
$resul = $this->db->query($sql);
return $resul;
}
public function VerProductoProveedor($id_proveedor) {
$sql = "SELECT * FROM product WHERE id_vendor = $id_proveedor AND cantidad_min >= can_inicial";
$resul = $this->db->query($sql);
return $resul;
}
public function MostrarProveedorId($id) {
$sql = "SELECT * FROM proveedor WHERE id = $id";
$resul = $this->db->query($sql);
return $resul;
}
	
}


//require_once '../../../controllers/ClienteController.php';
//require_once '../../../controllers/InventarioController.php';
class imprimirPedido{

public $id_proveedor;

public function realizarpedido(){
$id_proveedor = $this->id_proveedor;
$pedido = new ListaPedido();
$detalles = $pedido->VerProductoProveedor($id_proveedor);

$datosEmpresa = $pedido->MostrarInformacionEmpresa();

foreach ($datosEmpresa as $key => $valueE) {
$nomEmpresa = $valueE['nombre'];
$nitEmpresa = $valueE['nit'];
$dirEmpresa = $valueE['direccion'];
$ciuEmpresa = $valueE['ciudad'];
$depEmpresa = $valueE['departamento'];
$telEmpresa = $valueE['telefono'];
}

$datosProveedor = $pedido->MostrarProveedorId($id_proveedor);
while ($row1 = $datosProveedor->fetch_object()) {
$nombre = $row1->nombre;
$nit = $row1->nit;
$direccion = $row1->direccion;
$departamento = $row1->departamento;
$ciudad = $row1->ciudad;
$email = $row1->email;
$tel = $row1->telefono;
}
$date = date('Y-m-d');
require_once('tcpdf_include.php');

$pdf = new TCPDF(PDF_PAGE_ORIENTATION, PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);

//$pdf->setPrintHeader(false);
//$pdf->setPrintFooter(false);
$pdf->startPageGroup();

$pdf->AddPage();

$bloque1 = <<<EOF
<table>
		
		<tr>
			
			<td style="width:150px">$nomEmpresa</td>

			<td style="background-color:white; width:140px">
				
				<div style="font-size:8.5px; text-align:right; line-height:15px;">
					
					<br>
					$nitEmpresa

					<br>
					$dirEmpresa

				</div>

			</td>

			<td style="background-color:white; width:140px">

				<div style="font-size:8.5px; text-align:right; line-height:15px;">
					
					<br>
					$telEmpresa;
					
					<br>
					$ciuEmpresa - $depEmpresa

				</div>
				
			</td>

			<td style="background-color:white; width:110px; text-align:center; color:red"><br><br>DATOS PEDIDOS.<br></td>

		</tr>

	</table>

		
EOF;

$pdf->writeHTML($bloque1 ,false, false, false, false, '');
// ---------------------------------------------------------

$bloque2 = <<<EOF

	<table>
		
		<tr>
			
			<td style="width:540px"><img src="images/back.jpg"></td>
		
		</tr>

	</table>

	<table style="font-size:10px; padding:5px 10px;">
	
		<tr>
		
			<td style="border: 1px solid #666; background-color:white; width:390px">

				<strong>Cliente:</strong> $nombre
				<br>
				<strong>CC o NIT:</strong> $nit
				<br>
				<strong>Direccion:</strong> $direccion
				<br>
				<strong>Departamento:</strong> $departamento  <strong>Ciudad:</strong> $ciudad

			</td>

			<td style="border: 1px solid #666; background-color:white; width:150px; text-align:right">
			
				FECHA: $date

			</td>

		</tr>
		

		<tr>
		
		<td style="border-bottom: 1px solid #666; background-color:white; width:540px"></td>

		</tr>

	</table>

EOF;

$pdf->writeHTML($bloque2, false, false, false, false, '');

// ---------------------------------------------------------


$bloque3 = <<<EOF

	<table style="font-size:10px; padding:5px 10px;">

		<tr>
		<th style="border: 1px solid #666; background-color:white; width:55px; text-align:center; font-weight: bold">Cod.</th>
		<th style="border: 1px solid #666; background-color:white; width:240px; text-align:center; font-weight: bold">Descripcion</th>
		<th style="border: 1px solid #666; background-color:white; width:125px; text-align:center; font-weight: bold">Codigo Vendedor</th>
		<th style="border: 1px solid #666; background-color:white; width:40px; text-align:center; font-weight: bold">------</th>
		<th style="border: 1px solid #666; background-color:white; width:80px; text-align:center; font-weight: bold">Cant. Actual</th>		

		</tr>

	</table>

EOF;

$pdf->writeHTML($bloque3, false, false, false, false, '');
foreach ($detalles as $key => $item) {

$bloque4 = <<<EOF

	<table style="font-size:10px; padding:5px 10px;">

		<tr>
			<td style="border-bottom: 1px solid #9B9B9B; color:#333; background-color:white; width:55px; text-align:left">
			$item[id]
			</td>
		
			<td style="border-bottom: 1px solid #9B9B9B; color:#333; background-color:white; width:240px; text-align:left">
			$item[nombre]	
			</td>
							
			<td style="border-bottom: 1px solid #9B9B9B; color:#333; background-color:white; width:125px; text-align:center">
			$item[codigo_fabr]
			</td>
		
					
			<td style="border-bottom: 1px solid #9B9B9B; color:#333; background-color:white; width:40px; text-align:center">
			___
			</td>

			<td style="border: 1px solid #9B9B9B; color:#333; background-color:white; width:80px; text-align:center"> 
				$item[can_inicial]
			</td>


		</tr>

	</table>


EOF;

$pdf->writeHTML($bloque4, false, false, false, false, '');
}
// ---------------------------------------------------------


$bloque6 = <<<EOF

	<table style="font-size:10px; padding:5px 10px;">
		<tr>
		
			<td style=" color:#333; background-color:white; width:540px; text-align:left"></td>
		</tr>
		<tr>
		<td style="border: 1px solid #666; background-color:white; width:540px; text-align:center; font-weight: bold">
			Formato para Pedido
		</td>			

		</tr>

	</table>

EOF;
$pdf->writeHTML($bloque6, false, false, false, false, '');
//SALIDA DEL ARCHIVO 
$pdf->Output('factura.pdf');
}

}
$pedido = new imprimirPedido();
$pedido -> id_proveedor = $_GET["id"];
$pedido ->realizarpedido();

?>