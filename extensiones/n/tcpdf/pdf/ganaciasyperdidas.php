<?php

require_once '../../../config/DataBase.php';

class Reportes {
	
public $db;


public function __construct() {
$this->db = Database::connect();
}	

public function ReportesGastos($idsucursal,$fechaInicial,$fechaFinal) {

		
if($fechaInicial == $fechaFinal){
$sql = "SELECT SUM(gastos.valor) AS totalgasto  FROM gastos WHERE id_sucursal = $idsucursal AND  fecha LIKE '%$fechaFinal%'";
			
} else {
			
$fechaActual = new DateTime();
$fechaActual->add(new DateInterval("P1D"));
$fechaActualMasUno = $fechaActual->format("Y-m-d");

$fechaFinal2 = new DateTime($fechaFinal);
$fechaFinal2->add(new DateInterval("P1D"));
$fechaFinalMasUno = $fechaFinal2->format("Y-m-d");

if ($fechaFinalMasUno == $fechaActualMasUno) {

$sql = "SELECT SUM(gastos.valor) AS totalgasto  FROM gastos WHERE id_sucursal = $idsucursal AND  fecha BETWEEN '$fechaInicial' AND '$fechaFinalMasUno'";
} else {
$sql = "SELECT SUM(gastos.valor) AS totalgasto  FROM gastos WHERE id_sucursal = $idsucursal AND  fecha BETWEEN '$fechaInicial' AND '$fechaFinal'";
}
}
		
		
$resul = $this->db->query($sql);
return $resul;
}

public function ReportesdanosPerdida($idsucursal,$fechaInicial,$fechaFinal) {

		
if($fechaInicial == $fechaFinal){
$sql = "SELECT SUM(perdida.total) AS totalperdida FROM perdida WHERE id_sucursal = $idsucursal AND  fecha LIKE '%$fechaFinal%'";
			
} else {
			
$fechaActual = new DateTime();
$fechaActual->add(new DateInterval("P1D"));
$fechaActualMasUno = $fechaActual->format("Y-m-d");

$fechaFinal2 = new DateTime($fechaFinal);
$fechaFinal2->add(new DateInterval("P1D"));
$fechaFinalMasUno = $fechaFinal2->format("Y-m-d");

if ($fechaFinalMasUno == $fechaActualMasUno) {

$sql = "SELECT SUM(perdida.total) AS totalperdida FROM perdida WHERE  id_sucursal = $idsucursal AND fecha BETWEEN '$fechaInicial' AND '$fechaFinalMasUno'";
} else {
$sql = "SELECT SUM(perdida.total) AS totalperdida FROM perdida WHERE id_sucursal = $idsucursal AND  fecha BETWEEN '$fechaInicial' AND '$fechaFinal'";
}
}
		
		
$resul = $this->db->query($sql);
return $resul;
}

public function ReportesDevoluciones($idsucursal,$fechaInicial,$fechaFinal) {

		
if($fechaInicial == $fechaFinal){
$sql = "SELECT SUM(devolucion.total) AS totaldevolucion ,SUM(devolucion.utilidad) AS totalutilidad FROM devolucion WHERE id_sucursal = $idsucursal fecha LIKE '%$fechaFinal%'";
			
} else {
			
$fechaActual = new DateTime();
$fechaActual->add(new DateInterval("P1D"));
$fechaActualMasUno = $fechaActual->format("Y-m-d");

$fechaFinal2 = new DateTime($fechaFinal);
$fechaFinal2->add(new DateInterval("P1D"));
$fechaFinalMasUno = $fechaFinal2->format("Y-m-d");

if ($fechaFinalMasUno == $fechaActualMasUno) {

$sql = "SELECT SUM(devolucion.total) AS totaldevolucion ,SUM(devolucion.utilidad) AS totalutilidad FROM devolucion WHERE id_sucursal = $idsucursal AND  fecha BETWEEN '$fechaInicial' AND '$fechaFinalMasUno' ";
} else {
$sql = "SELECT SUM(devolucion.total) AS totaldevolucion ,SUM(devolucion.utilidad) AS totalutilidad FROM devolucion WHERE  id_sucursal = $idsucursal AND  fecha BETWEEN '$fechaInicial' AND '$fechaFinal'";
}
}
		
		
$resul = $this->db->query($sql);
return $resul;
}

public function ReportesVentas($idsucursal,$fechaInicial,$fechaFinal) {

		
if($fechaInicial == $fechaFinal){
$sql = "SELECT SUM(venta.total) AS ventatotal , SUM(venta.utilidad) AS totalutilidad FROM venta WHERE id_sucursal = $idsucursal AND  fecha LIKE '%$fechaFinal%'";
			
} else {
			
$fechaActual = new DateTime();
$fechaActual->add(new DateInterval("P1D"));
$fechaActualMasUno = $fechaActual->format("Y-m-d");

$fechaFinal2 = new DateTime($fechaFinal);
$fechaFinal2->add(new DateInterval("P1D"));
$fechaFinalMasUno = $fechaFinal2->format("Y-m-d");

if ($fechaFinalMasUno == $fechaActualMasUno) {

$sql = "SELECT SUM(venta.total) AS ventatotal , SUM(venta.utilidad) AS totalutilidad FROM venta WHERE id_sucursal = $idsucursal AND  fecha BETWEEN '$fechaInicial' AND '$fechaFinalMasUno' ";
} else {
$sql = "SELECT SUM(venta.total) AS ventatotal , SUM(venta.utilidad) AS  totalutilidad FROM venta WHERE id_sucursal = $idsucursal AND  fecha BETWEEN '$fechaInicial' AND '$fechaFinal'";
}
}
		
		
$resul = $this->db->query($sql);
return $resul;
}

public function ReportesNoExistente($idsucursal,$fechaInicial,$fechaFinal) {

		
if($fechaInicial == $fechaFinal){
$sql = "SELECT SUM(noexistente.valor) AS totalnoexistente FROM noexistente WHERE fecha LIKE '%$fechaFinal%' AND id_sucursal = $idsucursal";
			
} else {
			
$fechaActual = new DateTime();
$fechaActual->add(new DateInterval("P1D"));
$fechaActualMasUno = $fechaActual->format("Y-m-d");

$fechaFinal2 = new DateTime($fechaFinal);
$fechaFinal2->add(new DateInterval("P1D"));
$fechaFinalMasUno = $fechaFinal2->format("Y-m-d");

if ($fechaFinalMasUno == $fechaActualMasUno) {

$sql = "SELECT SUM(noexistente.valor) AS totalnoexistente FROM noexistente WHERE fecha BETWEEN '$fechaInicial' AND '$fechaFinalMasUno' AND id_sucursal = $idsucursal";
} else {
$sql = "SELECT SUM(noexistente.valor) AS totalnoexistente FROM noexistente WHERE fecha BETWEEN '$fechaInicial' AND '$fechaFinal' AND id_sucursal = $idsucursal";
}
}
		
		
$resul = $this->db->query($sql);
return $resul;
}

public function ReportesDiferenciasSobrantes($idsucursal,$fechaInicial,$fechaFinal) {

		
if($fechaInicial == $fechaFinal){
$sql = "SELECT SUM(iniciar_punto_venta.diferencia) AS totaldiferencia FROM iniciar_punto_venta WHERE fecha_inicio LIKE '%$fechaFinal%' AND id_sucursal = $idsucursal AND diferencia > 0";
			
} else {
			
$fechaActual = new DateTime();
$fechaActual->add(new DateInterval("P1D"));
$fechaActualMasUno = $fechaActual->format("Y-m-d");

$fechaFinal2 = new DateTime($fechaFinal);
$fechaFinal2->add(new DateInterval("P1D"));
$fechaFinalMasUno = $fechaFinal2->format("Y-m-d");

if ($fechaFinalMasUno == $fechaActualMasUno) {

$sql = "SELECT SUM(iniciar_punto_venta.diferencia) AS totaldiferencia FROM iniciar_punto_venta WHERE fecha_inicio BETWEEN '$fechaInicial' AND '$fechaFinalMasUno' AND id_sucursal = $idsucursal AND diferencia > 0";
} else {
$sql = "SELECT SUM(iniciar_punto_venta.diferencia) AS totaldiferencia FROM iniciar_punto_venta WHERE fecha_inicio BETWEEN '$fechaInicial' AND '$fechaFinal' AND id_sucursal = $idsucursal AND diferencia > 0 ";
}
}
		
		
$resul = $this->db->query($sql);
return $resul;
}

public function ReportesDiferenciasfaltante($idsucursal,$fechaInicial,$fechaFinal) {

		
if($fechaInicial == $fechaFinal){
$sql = "SELECT SUM(iniciar_punto_venta.diferencia) AS totaldiferencia FROM iniciar_punto_venta WHERE fecha_inicio LIKE '%$fechaFinal%' AND id_sucursal = $idsucursal AND diferencia < 0";
			
} else {
			
$fechaActual = new DateTime();
$fechaActual->add(new DateInterval("P1D"));
$fechaActualMasUno = $fechaActual->format("Y-m-d");

$fechaFinal2 = new DateTime($fechaFinal);
$fechaFinal2->add(new DateInterval("P1D"));
$fechaFinalMasUno = $fechaFinal2->format("Y-m-d");

if ($fechaFinalMasUno == $fechaActualMasUno) {

$sql = "SELECT SUM(iniciar_punto_venta.diferencia) AS totaldiferencia FROM iniciar_punto_venta WHERE fecha_inicio BETWEEN '$fechaInicial' AND '$fechaFinalMasUno' AND id_sucursal = $idsucursal AND diferencia < 0";
} else {
$sql = "SELECT SUM(iniciar_punto_venta.diferencia) AS totaldiferencia FROM iniciar_punto_venta WHERE fecha_inicio BETWEEN '$fechaInicial' AND '$fechaFinal' AND id_sucursal = $idsucursal AND diferencia < 0 ";
}
}
		
		
$resul = $this->db->query($sql);
return $resul;
}


public function MostrarInformacionEmpresa($idsucursal) {
$sql = "SELECT * FROM datos_empresa WHERE id_sucursal = $idsucursal";
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
$detallesGasto = $reporte->ReportesGastos($idsucursal,$fechaInicial,$fechaFinal);
$detallesU = $reporte->ReportesVentas($idsucursal,$fechaInicial,$fechaFinal);
$detallesPerdida = $reporte->ReportesdanosPerdida($idsucursal,$fechaInicial,$fechaFinal);
$detallesDevolucion = $reporte->ReportesDevoluciones($idsucursal,$fechaInicial,$fechaFinal);
$detallesNoexixtente = $reporte->ReportesNoExistente($idsucursal,$fechaInicial,$fechaFinal);
$detallesDiferencia = $reporte->ReportesDiferenciasSobrantes($idsucursal, $fechaInicial, $fechaFinal);
$detallesDiferenciaFaltante = $reporte->ReportesDiferenciasfaltante($idsucursal, $fechaInicial, $fechaFinal);


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

if($detallesGasto->num_rows != 0){

while ($row = $detallesGasto-> fetch_object()) {
$TotalGasto =  number_format($row->totalgasto, 0, ',', '.');
$valorgasto = $row->totalgasto;

}
}else{
$TotalGasto = 0;
}

if($detallesNoexixtente->num_rows != 0){

while ($row = $detallesNoexixtente-> fetch_object()) {
$TotalNoExistente =  number_format($row->totalnoexistente, 0, ',', '.');
$valornoexistente = $row->totalnoexistente;

}
}else{
$TotalGasto = 0;
}

if($detallesPerdida->num_rows != 0){
while ($row2 = $detallesPerdida-> fetch_object()) {

$TotalPerdida = number_format($row2->totalperdida, 0, ',', '.');
$valorPerdida = $row2->totalperdida;
}   
}else{
$valorPerdida = 0;
$TotalPerdida = 0;
}

if($detallesDevolucion->num_rows != 0){
while ($row2 = $detallesDevolucion-> fetch_object()) {

$TotalDevolucion = number_format($row2->totaldevolucion, 0, ',', '.');
$valorDevolucion = $row2->totaldevolucion;
$UtilidadDevolucion = $row2->totalutilidad;
}   
}else{
$TotalDevolucion = 0;
$valorDevolucion = 0;
}

if($detallesDiferencia->num_rows != 0){

while ($row = $detallesDiferencia-> fetch_object()) {
$Totaldiferencia =  number_format($row->totaldiferencia, 0, ',', '.');

}
}else{
$Totaldiferencia = 0;
}


        
if($detallesDiferenciaFaltante->num_rows != 0){

while ($row = $detallesDiferenciaFaltante-> fetch_object()) {
$Totaldiferenciafaltante =  number_format($row->totaldiferencia, 0, ',', '.');

}
}else{
$Totaldiferenciafaltante = 0;
}


while ($row2 = $detallesU-> fetch_object()) {


$TotalVenta = number_format($row2->ventatotal, 0, ',', '.');
$valorUtilidadP = $row2->totalutilidad;
$vventa = $row2->ventatotal;
}

$valorUtilidad = (int)$valorUtilidadP - (int)$UtilidadDevolucion;
$TotalUtilidad = number_format($valorUtilidad, 0, ',', '.');

$descontar = (int)$valorgasto + (int)$valorPerdida;
$gananciabruta = (int)$valornoexistente + (int)$valorUtilidad;


$ganacia =  $gananciabruta - $descontar;
$ganaciaNeta = number_format($ganacia, 0, ',', '.');

$ventant = (int) $vventa - (int)$valorDevolucion;
$TotalVentaNeta = number_format($ventant, 0, ',', '.');

require_once('tcpdf_include.php');

$pdf = new TCPDF(PDF_PAGE_ORIENTATION, PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);

//$pdf->setPrintHeader(false);
//$pdf->setPrintFooter(false);
$pdf->startPageGroup();

$pdf->AddPage();

$bloque1 = <<<EOF
<table>
		
		<tr>
			
			<td style="width:170px">
				
				<div style="font-size:8.5px; text-align:right; line-height:15px;">
									
					<h3>$nomEmpresa</h3>				
					
				</div>
			</td>

			<td style="background-color:white; width:110px">
				
				<div style="font-size:8.5px; text-align:right; line-height:15px;">
					
					<br>
					NIT: $nitEmpresa

					<br>
					$dirEmpresa

				</div>

			</td>

			<td style="background-color:white; width:90px">

				<div style="font-size:8.5px; text-align:right; line-height:15px;">
					
					<br>
					Teléfono: $telEmpresa
					
					<br>
					$ciuEmpresa -- $depEmpresa

				</div>
				
			</td>

			<td style="background-color:white; width:130px; text-align:center; color:red">
				<br><br>
					Reporte de ganacias
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

	<table style="font-size:10px; padding:5px 10px;">
		<tr>
		
			<td style=" color:#333; background-color:white; width:540px; text-align:left"></td>
		</tr>
		<tr>
		<td style="border: 1px solid #666; background-color:white; width:540px; text-align:center; font-weight: bold">
			Ganacias y perdidas 
		</td>			

		</tr>

	</table>

EOF;

$pdf->writeHTML($bloque3, false, false, false, false, '');

$bloque4 = <<<EOF

	<table style="font-size:10px; padding:5px 10px;">

		<tr>
			<td style="color:#333; background-color:white; width:200px; text-align:left">
			<h4>DETALLES EN VENTAS</h4>
			
			</td>
		
			<td style="color:#333; background-color:white; width:70px; text-align:left">
			
			</td>	
			<td style="color:#333; background-color:white; width:270px; text-align:left">
			
			</td>	
			
			<td style=" color:#333; background-color:white; width:45px; text-align:center"> 
				
			</td>


		</tr>

	</table>


EOF;

$pdf->writeHTML($bloque4, false, false, false, false, '');

// ---------------------------------------------------------






$bloque5 = <<<EOF

	<table style="font-size:10px; padding:5px 10px;">

		<tr>
			<td style="color:#333; background-color:white; width:200px; text-align:left">			
			Venta de mercancia
			</td>		
			<td style="color:#333; background-color:white; width:70px; text-align:left">
			
			</td>	
			<td style="color:#333; background-color:white; width:270px; text-align:left">
			$TotalVenta
			</td>	
			
			<td style=" color:#333; background-color:white; width:45px; text-align:center"> 
				
			</td>
			
		</tr>
        	<tr>
			<td style="color:#333; background-color:white; width:200px; text-align:left">			
			Devolucion de mercancia
			</td>		
			<td style="color:#333; background-color:white; width:70px; text-align:left">
			
			</td>	
			<td style="color:#333; background-color:white; width:270px; text-align:left">
			($TotalDevolucion)
			</td>	
			
			<td style=" color:#333; background-color:white; width:45px; text-align:center"> 
				
			</td>
			
		</tr>
        <tr>
			<td style="color:#333; background-color:white; width:200px; text-align:left">			
			 <strong>Ventas Neta total </strong>
			</td>		
			<td style="color:#333; background-color:white; width:70px; text-align:left">
			
			</td>	
			<td style="color:#333; background-color:white; width:270px; text-align:left">
			$TotalVentaNeta
			</td>	
			
			<td style=" color:#333; background-color:white; width:45px; text-align:center"> 
				
			</td>
			
		</tr>
		<tr>
			<td style="color:#333; background-color:white; width:200px; text-align:left">			
			Utilidad en Ventas
			</td>		
			<td style="color:#333; background-color:white; width:70px; text-align:left">
			
			</td>	
			<td style="color:#333; background-color:white; width:270px; text-align:left">
			$TotalUtilidad
			</td>	
			
			<td style=" color:#333; background-color:white; width:45px; text-align:center"> 
				
			</td>


		</tr>
		<tr>
			<td style="color:#333; background-color:white; width:200px; text-align:left">			
			No Existente
			</td>		
			<td style="color:#333; background-color:white; width:70px; text-align:left">
			
			</td>	
			<td style="color:#333; background-color:white; width:270px; text-align:left">
			$TotalNoExistente
			</td>	
			
			<td style=" color:#333; background-color:white; width:45px; text-align:center"> 
				
			</td>


		</tr>

	</table>


EOF;

$pdf->writeHTML($bloque5, false, false, false, false, '');

// ---------------------------------------------------------

$bloque6 = <<<EOF

	<table style="font-size:10px; padding:5px 10px;">

		<tr>
			<td style="color:#333; background-color:white; width:200px; text-align:left">
			<h4>GASTOS</h4>
			
			</td>
		
			<td style="color:#333; background-color:white; width:70px; text-align:left">
			
			</td>	
			<td style="color:#333; background-color:white; width:270px; text-align:left">
			
			</td>	
			
			<td style=" color:#333; background-color:white; width:45px; text-align:center"> 
				
			</td>


		</tr>

	</table>


EOF;

$pdf->writeHTML($bloque6, false, false, false, false, '');




// ---------------------------------------------------------




$bloque7 = <<<EOF

	<table style="font-size:10px; padding:5px 10px;">

		<tr>
			<td style="color:#333; background-color:white; width:200px; text-align:left">			
			Suma de gastos
			</td>		
			<td style="color:#333; background-color:white; width:70px; text-align:left">
			
			</td>	
			<td style="color:#333; background-color:white; width:270px; text-align:left">
			($TotalGasto)
			</td>	
			
			<td style=" color:#333; background-color:white; width:45px; text-align:center"> 
				
			</td>


		</tr>

	</table>


EOF;

$pdf->writeHTML($bloque7, false, false, false, false, '');


$bloque10 = <<<EOF

	<table style="font-size:10px; padding:5px 10px;">

		<tr>
			<td style="color:#333; background-color:white; width:200px; text-align:left">
			<h4>PERDIDAS POR DAÑOS</h4>
			
			</td>
		
			<td style="color:#333; background-color:white; width:70px; text-align:left">
			
			</td>	
			<td style="color:#333; background-color:white; width:270px; text-align:left">
			
			</td>	
			
			<td style=" color:#333; background-color:white; width:45px; text-align:center"> 
				
			</td>


		</tr>

	</table>


EOF;

$pdf->writeHTML($bloque10, false, false, false, false, '');

$bloque11 = <<<EOF

	<table style="font-size:10px; padding:5px 10px;">

		<tr>
			<td style="color:#333; background-color:white; width:200px; text-align:left">			
			Suma de daños 
			</td>		
			<td style="color:#333; background-color:white; width:70px; text-align:left">
			
			</td>	
			<td style="color:#333; background-color:white; width:270px; text-align:left">
			($TotalPerdida)
			</td>	
			
			<td style=" color:#333; background-color:white; width:45px; text-align:center"> 
				
			</td>


		</tr>
        

	</table>


EOF;

$pdf->writeHTML($bloque11, false, false, false, false, '');



$bloque8 = <<<EOF

	<table style="font-size:10px; padding:5px 10px;">

		
		<tr>		
		<th style=" background-color:white; width:200px; text-align:center; font-weight: bold">Utilidad Neta:</th>	
		<th style=" background-color:white; width:70px; text-align:center; font-weight: bold"></th>
		<th style=" background-color:white; width:270px; text-align:left; font-weight: bold">$ganaciaNeta</th>
		<th style=" background-color:white; width:45px; text-align:center; font-weight: bold"></th>
			

		</tr>		

	</table>

EOF;

$pdf->writeHTML($bloque8, false, false, false, false, '');
// ---------------------------------------------------------

// ---------------------------------------------------------


$bloque12 = <<<EOF

	<table style="font-size:10px; padding:5px 10px;">

		<tr>
			<td style="color:#333; background-color:white; width:200px; text-align:left">			
			Diferencia en caja
			</td>		
			<td style="color:#333; background-color:white; width:70px; text-align:left">
			
			</td>	
			<td style="color:#333; background-color:white; width:270px; text-align:left">
			$Totaldiferencia
			</td>	
			
			<td style=" color:#333; background-color:white; width:45px; text-align:center"> 
				
			</td>


		</tr>
        <tr>
			<td style="color:#333; background-color:white; width:200px; text-align:left">			
			Diferencia en caja
			</td>		
			<td style="color:#333; background-color:white; width:70px; text-align:left">
			
			</td>	
			<td style="color:#333; background-color:white; width:270px; text-align:left">
			$Totaldiferenciafaltante
			</td>	
			
			<td style=" color:#333; background-color:white; width:45px; text-align:center"> 
				
			</td>


		</tr>

	</table>


EOF;

$pdf->writeHTML($bloque12, false, false, false, false, '');



$bloque9 = <<<EOF

	<table style="font-size:10px; padding:5px 10px;">
		<tr>
		
			<td style=" color:#333; background-color:white; width:540px; text-align:left"></td>
		</tr>
		<tr>
		<td style="border: 1px solid #666; background-color:white; width:540px; text-align:center; font-weight: bold">
			Ganacias y perdidas 
		</td>			

		</tr>

	</table>

EOF;
$pdf->writeHTML($bloque9, false, false, false, false, '');
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
