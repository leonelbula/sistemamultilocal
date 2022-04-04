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

public function MostrarProductos() {
$sql = "SELECT * FROM product ORDER BY nombre ASC";
$resul = $this->db->query($sql);
return $resul;
}


public function MostrarProductosContado($id) {
$sql = "SELECT * FROM conteo  WHERE id_producto = $id";
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

$litaProductos = $reporte->MostrarProductos();




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
		<th style=" background-color:white; width:240px; text-align:center; font-weight: bold"></th>
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
		<th style="border: 1px solid #666; background-color:white; width:75px; text-align:center; font-weight: bold">VALOR</th>							
		<th style="border: 1px solid #666; background-color:white; width:105px; text-align:center; font-weight: bold">------</th>
		<th style="border: 1px solid #666; background-color:white; width:105px; text-align:center; font-weight: bold">ESTADO</th>
		

		</tr>

	</table>

EOF;

$pdf->writeHTML($bloque3, false, false, false, false, '');


foreach ($litaProductos as $key => $value) {
  
$id = $value['id'];
$nombre = $value['nombre'];
$val = $value['costo'];
$costo = number_format($value['costo'], 0,',','.');
$cantidad = $value['cantidad_min'];

$productosContados = $reporte->MostrarProductosContado($id);

if($productosContados->num_rows == 0 && $cantidad != 0){
$valor = $val * $cantidad;
$total = number_format($valor, 0, ',', '.');
$mensaje = 'no fue contado';

            




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
                       $total
			</td>
		
			<td style=" color:#333; background-color:white; width:105px; text-align:center">
                        -----
			</td>
		
			<td style=" color:#333; background-color:white; width:105px; text-align:center">
			$mensaje
			</td>

			


		</tr>

	</table>


EOF;

$pdf->writeHTML($bloque4, false, false, false, false, '');
}
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
		<th style=" background-color:white; width:105px; text-align:center; font-weight: bold"></th>
		<th style=" background-color:white; width:105px; text-align:center; font-weight: bold"></th>
			

		</tr>		

	</table>

EOF;

$pdf->writeHTML($bloque9, false, false, false, false, '');
//------------------------------------------------------

// ---------------------------------------------------------

$bloque10 = <<<EOF

	<table style="font-size:10px; padding:5px 10px;">

		
		<tr>
		<th style=" background-color:white; width:60px; text-align:center; font-weight: bold"></th>
		<th style=" background-color:white; width:240px; text-align:center; font-weight: bold"></th>
		<th style=" background-color:white; width:90px; text-align:center; font-weight: bold"></th>
		<th style=" background-color:white; width:75px; text-align:center; font-weight: bold"></th>		
		<th style=" background-color:white; width:75px; text-align:center; font-weight: bold"></th>							
		<th style=" background-color:white; width:105px; text-align:center; font-weight: bold"></th>
		<th style=" background-color:white; width:105px; text-align:center; font-weight: bold"></th>
			

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