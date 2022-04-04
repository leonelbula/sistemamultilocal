<?php

require_once '../../../config/DataBase.php';

class ListaProducto {
	
public $db;


public function __construct() {
$this->db = Database::connect();
}
public function MostrarInformacionEmpresa() {
$sql = "SELECT * FROM datos_empresa";
$resul = $this->db->query($sql);
return $resul;
}

public function MostrarProducto() {
$sql = "SELECT * FROM product ";
$resul = $this->db->query($sql);
return $resul;
}
	
}


//require_once '../../../controllers/ClienteController.php';
//require_once '../../../controllers/InventarioController.php';
class imprimir{

public $codigo;
public $idsucursal;

public function traerImpresion(){
   

$reporte = new ListaProducto();
$datosEmpresa = $reporte->MostrarInformacionEmpresa();

foreach ($datosEmpresa as $key => $valueE) {
$nomEmpresa = $valueE['nombre'];
$nitEmpresa = $valueE['nit'];
$dirEmpresa = $valueE['direccion'];
$ciuEmpresa = $valueE['ciudad'];
$depEmpresa = $valueE['departamento'];
$telEmpresa = $valueE['telefono'];
}



$detalles = $reporte->MostrarProducto();




require_once('tcpdf_include.php');

$pdf = new TCPDF(PDF_PAGE_ORIENTATION, PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);

$pdf->setPrintHeader(false);
$pdf->setPrintFooter(false);
$pdf->startPageGroup();

$pdf->AddPage();

$bloque1 = <<<EOF
<table>
		
		<tr>
			
			<td style="width:150px">
				<div style="font-size:8.5px; text-align:center; line-height:15px;">
					$nomEmpresa <br>
					$nitEmpresa <br> $dirEmpresa <br> $ciuEmpresa
				</div>
				<hr style="border: 2px solid #666; background-color:white; width:150px;"><br>
				
			</td>

			

			
		</tr>

	</table>

		
EOF;

$pdf->writeHTML($bloque1 ,false, false, false, false, '');
// ---------------------------------------------------------

// ---------------------------------------------------------


$bloque3 = <<<EOF

	<table style="font-size:10px; padding:5px 10px;">

		<tr>
		<th style="border: 1px solid #666; background-color:white; width:150px; text-align:center; font-weight: bold">Detalles</th>				

		</tr>

	</table>

EOF;

$pdf->writeHTML($bloque3, false, false, false, false, '');
foreach ($detalles as $key => $item) {

$bloque4 = <<<EOF

	<table style="font-size:10px; padding:5px 10px;">

		<tr>
			<td style="border: 1px solid #9B9B9B; color:#333; background-color:white; width:150px; text-align:left">
			$item[nombre] <br> Cant: $item[can_inicial] <br>
			
			</td>
			
		</tr>

	</table>


EOF;

$pdf->writeHTML($bloque4, false, false, false, false, '');
}
// ---------------------------------------------------------



// ---------------------------------------------------------


$bloque6 = <<<EOF

	<table style="font-size:10px; padding:5px 10px;">
		<tr>
		
			<td style=" color:#333; background-color:white; width:150px; text-align:left"></td>
		</tr>
		<tr>
		<td style=" font-size:6.5px; border: 1px solid #666; background-color:white; width:150px; text-align:center; font-weight: bold">
			--------------
		</td>			

		</tr>

	</table>

EOF;
$pdf->writeHTML($bloque6, false, false, false, false, '');
//SALIDA DEL ARCHIVO 
$pdf->Output('factura.pdf');
}

}
$factura = new imprimir();
$factura -> traerImpresion();

?>