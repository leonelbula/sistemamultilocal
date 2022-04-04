<?php

require_once '../../../config/DataBase.php';

class Reportes {
	
public $db;


public function __construct() {
$this->db = Database::connect();
}	

public function ReportesVentas($idsucursal,$fechaInicial,$fechaFinal) {

		
if($fechaInicial == $fechaFinal){
$sql = "SELECT * FROM venta WHERE id_sucursal = $idsucursal AND fecha LIKE '%$fechaFinal%'";
			
} else {
			
$fechaActual = new DateTime();
$fechaActual->add(new DateInterval("P1D"));
$fechaActualMasUno = $fechaActual->format("Y-m-d");

$fechaFinal2 = new DateTime($fechaFinal);
$fechaFinal2->add(new DateInterval("P1D"));
$fechaFinalMasUno = $fechaFinal2->format("Y-m-d");

if ($fechaFinalMasUno == $fechaActualMasUno) {

$sql = "SELECT * FROM venta WHERE id_sucursal = $idsucursal AND fecha BETWEEN '$fechaInicial' AND '$fechaFinalMasUno'";
} else {
$sql = "SELECT * FROM venta WHERE id_sucursal = $idsucursal AND fecha BETWEEN '$fechaInicial' AND '$fechaFinal'";
}
}
		
		
$resul = $this->db->query($sql);
return $resul;
}
public function MostrarClienteId($id) {
$sql = "SELECT * FROM cliente WHERE id = $id";
$resul = $this->db->query($sql);
return $resul;
}
public function MostrarInformacionEmpresa($idsucursal) {
$sql = "SELECT * FROM datos_empresa WHERE id_sucursal = $idsucursal ";
$resul = $this->db->query($sql);
return $resul;
}
}


//require_once '../../../controllers/ClienteController.php';
//require_once '../../../controllers/InventarioController.php';
class imprimirReporte{

public $fechaInicial;
public $fechaFinal;
public $id_sucursal;

public function traerImpresionReporte(){
$fechaInicial = $this->fechaInicial;
$fechaFinal = $this->fechaFinal;
$idsucursal = $this->id_sucursal;


$reporte = new Reportes();
$detalles = $reporte->ReportesVentas($idsucursal,$fechaInicial,$fechaFinal);
$fechaI = $_GET['fechaInicial'];



$datosEmpresa = $reporte->MostrarInformacionEmpresa($idsucursal);

foreach ($datosEmpresa as $key => $valueE) {
$nomEmpresa = $valueE['nombre'];
$nitEmpresa = $valueE['nit'];
$dirEmpresa = $valueE['direccion'];
$ciuEmpresa = $valueE['ciudad'];
$depEmpresa = $valueE['departamento'];
$telEmpresa = $valueE['telefono'];
}
if($detalles->num_rows != 0){
while ($row = $detalles-> fetch_object()) {
$id_cliente = $row->id_cliente;

$total = $row->total;
$utilidad = $row->utilidad;


$arraytotal[] = array('valor' => (int)$total);
$arrayUtilida[] = array('valor' => (int)$utilidad);

}



$valorTotal =  array_column($arraytotal, 'valor');
$TotalT = number_format(array_sum($valorTotal));

$valorUtilida =  array_column($arrayUtilida, 'valor');
$TotalUtilidad = number_format(array_sum($valorUtilida));

}else{
   $TotalT = 0;
   $TotalUtilidad = 0;
  
}

require_once('tcpdf_include.php');

$pdf = new TCPDF(PDF_PAGE_ORIENTATION, PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);

//$pdf->setPrintHeader(false);
//$pdf->setPrintFooter(false);
$pdf->startPageGroup();

$pdf->AddPage('L', 'A4');

$bloque1 = <<<EOF
<table>
		
		<tr>
			
			<td style="width:200px">
				
				<div style="font-size:8.5px; text-align:right; line-height:15px;">
									
					<h3>$nomEmpresa</h3>				
					
				</div>
			</td>

			<td style="background-color:white; width:140px">
				
				<div style="font-size:8.5px; text-align:right; line-height:15px;">
					
					<br>
					NIT: $nitEmpresa

					<br>
					$dirEmpresa

				</div>

			</td>

			<td style="background-color:white; width:140px">

				<div style="font-size:8.5px; text-align:right; line-height:15px;">
					
					<br>
					Teléfono: $telEmpresa
					
					<br>
					$ciuEmpresa -- $depEmpresa

				</div>
				
			</td>

			<td style="background-color:white; width:210px; text-align:center; color:red">
				<br><br>
					Reporte de ventas por periodo
					<div style="font-size:8.5px; text-align:right; line-height:15px;">
					Fecha Inicio: $fechaI
					<br>
					
					Fecha Final: $fechaFinal
					

				</div>
					
		
				</td>

		</tr>
		

	</table>

		
EOF;

$pdf->writeHTML($bloque1 ,false, false, false, false, '');
// ---------------------------------------------------------

// ---------------------------------------------------------


$bloque3 = <<<EOF

	<table style="font-size:10px; padding:5px 10px; border: 1px solid #666;">

		<tr>
		<th style="border: 1px solid #666; background-color:white; width:60px; text-align:center; font-weight: bold">N°Fact</th>
		<th style="border: 1px solid #666; background-color:white; width:240px; text-align:center; font-weight: bold">Cliente</th>
		<th style="border: 1px solid #666; background-color:white; width:85px; text-align:center; font-weight: bold">Nit o CC</th>
		<th style="border: 1px solid #666; background-color:white; width:75px; text-align:center; font-weight: bold">fecha</th>
		<th style="border: 1px solid #666; background-color:white; width:75px; text-align:center; font-weight: bold">SubTotal</th>							
		<th style="border: 1px solid #666; background-color:white; width:75px; text-align:center; font-weight: bold">Iva</th>
		<th style="border: 1px solid #666; background-color:white; width:75px; text-align:center; font-weight: bold">Total</th>
		<th style="border: 1px solid #666; background-color:white; width:75px; text-align:center; font-weight: bold">Utilidad</th>		

		</tr>

	</table>

EOF;

$pdf->writeHTML($bloque3, false, false, false, false, '');


foreach ($detalles as $key => $value) {

$datosReporte = $reporte->MostrarClienteId($value['id_cliente']);
while ($row1 = $datosReporte->fetch_object()) {
$nombreC = $row1->nombre;
$nit = $row1->nit;
}

$factura = $value['codigo'];
$fecha = $value['fecha'];

$total = number_format($value['total']);
$utilidad = number_format($value['utilidad']);

$bloque4 = <<<EOF

	<table style="font-size:10px; padding:5px 10px;">

		<tr>
			<td style="color:#333; background-color:white; width:60px; text-align:left">
			$factura
			</td>
		
			<td style="color:#333; background-color:white; width:240px; text-align:left">
			$nombreC
			</td>
		
			<td style=" color:#333; background-color:white; width:85px; text-align:center">
			$nit
			</td>
			<td style=" color:#333; background-color:white; width:75px; text-align:center">
			
			$fecha
			</td>
		
			<td style=" color:#333; background-color:white; width:75px; text-align:center">
		
			</td>
		
			<td style=" color:#333; background-color:white; width:75px; text-align:center">
		
			</td>
		
			<td style=" color:#333; background-color:white; width:75px; text-align:center">
			$total
			</td>

			<td style=" color:#333; background-color:white; width:75px; text-align:center"> 
				$utilidad
			</td>


		</tr>

	</table>


EOF;

$pdf->writeHTML($bloque4, false, false, false, false, '');
}
// ---------------------------------------------------------

$bloque5 = <<<EOF

	<table style="font-size:10px; padding:5px 10px;">

		
		<tr>
		<th style=" background-color:white; width:60px; text-align:center; font-weight: bold"></th>
		<th style=" background-color:white; width:250px; text-align:center; font-weight: bold"></th>
		<th style=" background-color:white; width:75px; text-align:center; font-weight: bold"></th>
		<th style=" background-color:white; width:75px; text-align:center; font-weight: bold"></th>		
		<th style=" background-color:white; width:75px; text-align:center; font-weight: bold"></th>							
		<th style=" background-color:white; width:75px; text-align:center; font-weight: bold"> </th>
		<th style=" background-color:white; width:75px; text-align:center; font-weight: bold">$TotalT</th>
		<th style=" background-color:white; width:75px; text-align:center; font-weight: bold">$TotalUtilidad</th>		

		</tr>		

	</table>

EOF;

$pdf->writeHTML($bloque5, false, false, false, false, '');
// ---------------------------------------------------------

// ---------------------------------------------------------


$bloque6 = <<<EOF

	<table style="font-size:10px; padding:5px 10px;">
		<tr>
		
			<td style=" color:#333; background-color:white; width:760px; text-align:left"></td>
		</tr>
		<tr>
		<td style="border: 1px solid #666; background-color:white; width:760px; text-align:center; font-weight: bold">
			reporte ventas por periodo
		</td>			

		</tr>

	</table>

EOF;
$pdf->writeHTML($bloque6, false, false, false, false, '');
//SALIDA DEL ARCHIVO 
$pdf->Output('factura.pdf');
}

}

$reporte = new imprimirReporte();
$reporte-> fechaInicial = $_GET["fechaInicial"];
$reporte-> fechaFinal = $_GET["fechaFinal"];
$reporte-> id_sucursal = $_GET['idsucursal'];

$reporte ->traerImpresionReporte();

?>