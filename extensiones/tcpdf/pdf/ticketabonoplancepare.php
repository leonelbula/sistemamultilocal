<?php

require_once '../../../config/DataBase.php';

class ListaDatos {
	
public $db;


public function __construct() {
$this->db = Database::connect();
}
public function MostrarInformacionEmpresa($idsucursal) {
$sql = "SELECT * FROM datos_empresa WHERE id_sucursal = $idsucursal";
$resul = $this->db->query($sql);
return $resul;
}
public function VerAbonoCodigo($codigo,$idsucursal) {
$sql = "SELECT * FROM abono_plansepare WHERE id = $codigo AND id_sucursal = $idsucursal";
$resul = $this->db->query($sql);
return $resul;
}
public function MostrarClienteId($id) {
$sql = "SELECT c.*, p.id_cliente FROM cliente AS c , abono_plansepare AS ap, plansepare AS p WHERE ap.id_registro = $id AND ap.id_registro = p.id AND p.id_cliente = c.id";
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
   
$id_sucursal = $this->idsucursal;
$reporte = new ListaDatos();
$datosEmpresa = $reporte->MostrarInformacionEmpresa($id_sucursal);

foreach ($datosEmpresa as $key => $valueE) {
$nomEmpresa = $valueE['nombre'];
$nitEmpresa = $valueE['nit'];
$dirEmpresa = $valueE['direccion'];
$ciuEmpresa = $valueE['ciudad'];
$depEmpresa = $valueE['departamento'];
$telEmpresa = $valueE['telefono'];
}

$codigo = $this->codigo;
$factura = new ListaDatos();
$detalles = $factura->VerAbonoCodigo($codigo,$id_sucursal);


while ($row = $detalles-> fetch_object()) {

$id_registro = $row->id_registro;
$fecha = $row->fecha;
$valor = $row->valor;
$descripcion = $row->descripcion;
}

$datosCliente = $factura->MostrarClienteId($id_registro);
while ($row1 = $datosCliente->fetch_object()) {
$nombreC = $row1->nombre;
$nitC = $row1->nit;
$direccionC = $row1->direccion;
$departamentoC = $row1->departamento;
$ciudadC = $row1->ciudad;
$emailC = $row1->email;
$telC = $row1->telefono;
}

require_once('tcpdf_include.php');

$pdf = new TCPDF(PDF_PAGE_ORIENTATION, PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);

//$pdf->setPrintHeader(false);
//$pdf->setPrintFooter(false);
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
				<div style="background-color; font-size:8.5px; text-align:center; color:red ;"><br><br>Abono N.$codigo <br>
				<hr style="border: 2px solid #666; background-color:white; width:150px;">
				</div>
			</td>

			

			
		</tr>

	</table>

		
EOF;

$pdf->writeHTML($bloque1 ,false, false, false, false, '');
// ---------------------------------------------------------

$bloque2 = <<<EOF

	<table>
		
		<tr>
			
			<td style="width:150px"><br></td>
		
		</tr>

	</table>

	<table style="font-size:10px; padding:5px 10px;">
	
		<tr>
		
			<td style="border: 1px solid #666; background-color:white; width:150px; font-size:8.5px;">

				<strong>Cliente:</strong> $nombreC
				<br>
				<strong>CC o NIT:</strong> $nitC
				<br>
				<strong>Direccion:</strong> $direccionC 
				<br>
				<strong>Departamento:</strong> $departamentoC  <strong>Ciudad:</strong> $ciudadC
				<br>
				<strong>Fecha factura:</strong> $fecha
				

			</td>

			

		</tr>
		

		<tr>
		
		<td style="border-bottom: 1px solid #666; background-color:white; width:150px"></td>

		</tr>

	</table>

EOF;

$pdf->writeHTML($bloque2, false, false, false, false, '');

// ---------------------------------------------------------


$bloque3 = <<<EOF

	<table style="font-size:10px; padding:5px 10px;">

		<tr>
		<th style="border: 1px solid #666; background-color:white; width:150px; text-align:center; font-weight: bold">Detalles</th>				

		</tr>

	</table>

EOF;

$pdf->writeHTML($bloque3, false, false, false, false, '');


$bloque4 = <<<EOF

	<table style="font-size:10px; padding:5px 10px;">

		<tr>
			<td style="border: 1px solid #9B9B9B; color:#333; background-color:white; width:150px; text-align:left">
			
			 $descripcion <br>
			
			</td>
			
		</tr>

	</table>


EOF;

$pdf->writeHTML($bloque4, false, false, false, false, '');

// ---------------------------------------------------------

$bloque5 = <<<EOF

	<table style="font-size:10px; padding:5px 10px;">

		<tr>

			<td style="color:#333; background-color:white; width:150px; text-align:center"></td>
			
			

		</tr>
		
		<tr>
		
			

			<td style="border: 1px solid #666;  background-color:white; width:150px; text-align:center; font-weight: bold">
				
				<br><br>
				Total :  $valor
			</td>

			

		</tr>

			


	</table>

EOF;

$pdf->writeHTML($bloque5, false, false, false, false, '');
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
$factura -> codigo = $_GET["codigo"];
$factura -> idsucursal = $_GET["id"];
$factura -> traerImpresion();

?>