<?php

require_once '../../../config/DataBase.php';

class Reportes {
	
public $db;


public function __construct() {
$this->db = Database::connect();
}	



public function MostrarInformacionEmpresa() {
$sql = "SELECT * FROM datos_empresa  ";
$resul = $this->db->query($sql);
return $resul;
}

public function MostrarProductosSobrantes() {
$sql = "SELECT * FROM conteo  WHERE diferencia > 0 ORDER BY nombre ASC";
$resul = $this->db->query($sql);
return $resul;
}

public function TotalSobrantes() {
$sql = "SELECT SUM(valor_diferencia) AS total FROM conteo WHERE diferencia > 0";
$resul = $this->db->query($sql);
return $resul;
}

public function MostrarProductosFaltantes() {
$sql = "SELECT * FROM conteo  WHERE diferencia < 0 ORDER BY nombre ASC  ";
$resul = $this->db->query($sql);
return $resul;
}
public function TotalFaltes() {
$sql = "SELECT SUM(valor_diferencia) AS total FROM conteo WHERE diferencia < 0 ";
$resul = $this->db->query($sql);
return $resul;
}

}


//require_once '../../../controllers/ClienteController.php';
//require_once '../../../controllers/InventarioController.php';
class imprimirReporte{


public $id;

public function traerImpresionReporte(){

$id = $this->id;


$reporte = new Reportes();


$datosEmpresa = $reporte->MostrarInformacionEmpresa();

foreach ($datosEmpresa as $key => $valueE) {
$nomEmpresa = $valueE['nombre'];
$nitEmpresa = $valueE['nit'];
$dirEmpresa = $valueE['direccion'];
$ciuEmpresa = $valueE['ciudad'];
$depEmpresa = $valueE['departamento'];
$telEmpresa = $valueE['telefono'];
}

$sabrantes = $reporte->MostrarProductosSobrantes();
$faltantes = $reporte->MostrarProductosFaltantes();
$totalsobrantes = $reporte->TotalSobrantes();
$totalfaltantes = $reporte->TotalFaltes();

while ($row= $totalsobrantes->fetch_object()) {
   $valorSobrante =  number_format($row->total, 0, ',', '.');
}
while ($row= $totalfaltantes->fetch_object()) {
   $valorfaltante =  number_format($row->total, 0, ',', '.');
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
					Reporte de inventario
					<div style="font-size:8.5px; text-align:right; line-height:15px;">
					Fecha Inicio: 
					<br>
					
					Fecha Final: 
					

				</div>
					
		
				</td>

		</tr>
		

	</table>

		
EOF;

$pdf->writeHTML($bloque1 ,false, false, false, false, '');
// ---------------------------------------------------------

$bloque7 = <<<EOF

	<table style="font-size:10px; padding:5px 10px;">

		
		<tr>
		<th style=" background-color:white; width:60px; text-align:center; font-weight: bold"></th>
		<th style=" background-color:white; width:240px; text-align:center; font-weight: bold">SOBRANTES</th>
		<th style=" background-color:white; width:90px; text-align:center; font-weight: bold"></th>
		<th style=" background-color:white; width:75px; text-align:center; font-weight: bold"></th>		
		<th style=" background-color:white; width:75px; text-align:center; font-weight: bold"></th>							
		<th style=" background-color:white; width:105px; text-align:center; font-weight: bold"> </th>
		<th style=" background-color:white; width:105px; text-align:center; font-weight: bold"></th>
			

		</tr>		

	</table>

EOF;

$pdf->writeHTML($bloque7, false, false, false, false, '');


// ---------------------------------------------------------


$bloque3 = <<<EOF

	<table style="font-size:10px; padding:5px 10px; border: 1px solid #666;">

		<tr>
		<th style="border: 1px solid #666; background-color:white; width:60px; text-align:center; font-weight: bold">N°</th>
		<th style="border: 1px solid #666; background-color:white; width:240px; text-align:center; font-weight: bold">PRODUCTO</th>
		<th style="border: 1px solid #666; background-color:white; width:90px; text-align:center; font-weight: bold">COSTO</th>
		<th style="border: 1px solid #666; background-color:white; width:75px; text-align:center; font-weight: bold">CANTIDAD</th>
		<th style="border: 1px solid #666; background-color:white; width:75px; text-align:center; font-weight: bold">CONTADO</th>							
		<th style="border: 1px solid #666; background-color:white; width:105px; text-align:center; font-weight: bold">DIFERENCIA</th>
		<th style="border: 1px solid #666; background-color:white; width:105px; text-align:center; font-weight: bold">VALOR</th>
		

		</tr>

	</table>

EOF;

$pdf->writeHTML($bloque3, false, false, false, false, '');


foreach ($sabrantes as $key => $value) {
  
$id = $value['id_producto'];
$nombre = $value['nombre'];
$costo = number_format($value['costo'], 0,',','.');
$cantidad = $value['cantidad_actual'];
$contado = $value['contado'];
$diferencia = $value['diferencia'];
$valor_diferencia = number_format($value['valor_diferencia'], 0, ',', '.');


$bloque4 = <<<EOF

	<table style="font-size:10px; padding:5px 10px;">

		<tr>
			<td style="color:#333; background-color:white; width:60px; text-align:left">
			$id
			</td>
		
			<td style="color:#333; background-color:white; width:240px; text-align:left">
			$nombre
			</td>
		
			<td style=" color:#333; background-color:white; width:90px; text-align:center">
			$costo
			</td>
			<td style=" color:#333; background-color:white; width:75px; text-align:center">			
			$cantidad
			</td>
		
			<td style=" color:#333; background-color:white; width:75px; text-align:center">
                        $contado
			</td>
		
			<td style=" color:#333; background-color:white; width:105px; text-align:center">
                        $diferencia
			</td>
		
			<td style=" color:#333; background-color:white; width:105px; text-align:center">
			$valor_diferencia
			</td>

			


		</tr>

	</table>


EOF;

$pdf->writeHTML($bloque4, false, false, false, false, '');

}

// ---------------------------------------------------------
$bloque9 = <<<EOF

	<table style="font-size:10px; padding:5px 10px;">

		
		<tr>
		<th style=" background-color:white; width:60px; text-align:center; font-weight: bold"></th>
		<th style=" background-color:white; width:240px; text-align:center; font-weight: bold"></th>
		<th style=" background-color:white; width:90px; text-align:center; font-weight: bold"></th>
		<th style=" background-color:white; width:75px; text-align:center; font-weight: bold"></th>		
		<th style=" background-color:white; width:75px; text-align:center; font-weight: bold"></th>							
		<th style=" background-color:white; width:105px; text-align:center; font-weight: bold">TOTAL</th>
		<th style=" background-color:white; width:105px; text-align:center; font-weight: bold">$valorSobrante</th>
			

		</tr>		

	</table>

EOF;

$pdf->writeHTML($bloque9, false, false, false, false, '');
//------------------------------------------------------


$bloque5 = <<<EOF

	<table style="font-size:10px; padding:5px 10px;">

		
		<tr>
		<th style=" background-color:white; width:60px; text-align:center; font-weight: bold"></th>
		<th style=" background-color:white; width:240px; text-align:center; font-weight: bold">FALTANTES</th>
		<th style=" background-color:white; width:90px; text-align:center; font-weight: bold"></th>
		<th style=" background-color:white; width:75px; text-align:center; font-weight: bold"></th>		
		<th style=" background-color:white; width:75px; text-align:center; font-weight: bold"></th>							
		<th style=" background-color:white; width:105px; text-align:center; font-weight: bold"> </th>
		<th style=" background-color:white; width:105px; text-align:center; font-weight: bold"></th>
			

		</tr>		

	</table>

EOF;

$pdf->writeHTML($bloque5, false, false, false, false, '');
// ---------------------------------------------------------
foreach ($faltantes as $key => $value) {
  
$id = $value['id_producto'];
$nombre = $value['nombre'];
$costo = $value['costo'];
$cantidad = $value['cantidad_actual'];
$contado = $value['contado'];
$diferencia = $value['diferencia'];
$valor_diferencia = $value['valor_diferencia'];


$bloque4 = <<<EOF

	<table style="font-size:10px; padding:5px 10px;">

		<tr>
			<td style="color:#333; background-color:white; width:60px; text-align:left">
			$id
			</td>
		
			<td style="color:#333; background-color:white; width:240px; text-align:left">
			$nombre
			</td>
		
			<td style=" color:#333; background-color:white; width:90px; text-align:center">
			$costo
			</td>
			<td style=" color:#333; background-color:white; width:75px; text-align:center">			
			$cantidad
			</td>
		
			<td style=" color:#333; background-color:white; width:75px; text-align:center">
                        $contado
			</td>
		
			<td style=" color:#333; background-color:white; width:105px; text-align:center">
                        $diferencia
			</td>
		
			<td style=" color:#333; background-color:white; width:105px; text-align:center">
			$valor_diferencia
			</td>

			


		</tr>

	</table>


EOF;

$pdf->writeHTML($bloque4, false, false, false, false, '');

}
// ---------------------------------------------------------

$bloque10 = <<<EOF

	<table style="font-size:10px; padding:5px 10px;">

		
		<tr>
		<th style=" background-color:white; width:60px; text-align:center; font-weight: bold"></th>
		<th style=" background-color:white; width:240px; text-align:center; font-weight: bold"></th>
		<th style=" background-color:white; width:90px; text-align:center; font-weight: bold"></th>
		<th style=" background-color:white; width:75px; text-align:center; font-weight: bold"></th>		
		<th style=" background-color:white; width:75px; text-align:center; font-weight: bold"></th>							
		<th style=" background-color:white; width:105px; text-align:center; font-weight: bold">TOTAL</th>
		<th style=" background-color:white; width:105px; text-align:center; font-weight: bold">$valorfaltante</th>
			

		</tr>		

	</table>

EOF;

$pdf->writeHTML($bloque10, false, false, false, false, '');
//------------------------------------------------------


$bloque6 = <<<EOF

	<table style="font-size:10px; padding:5px 10px;">
		<tr>
		
			<td style=" color:#333; background-color:white; width:760px; text-align:left"></td>
		</tr>
		<tr>
		<td style="border: 1px solid #666; background-color:white; width:760px; text-align:center; font-weight: bold">
			reporte de inventario
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

$reporte-> id = $_GET['id'];

$reporte ->traerImpresionReporte();

?>