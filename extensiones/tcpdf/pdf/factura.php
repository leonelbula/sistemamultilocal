<?php

require_once '../../../config/DataBase.php';

class ListaFactura {
	
public $db;


public function __construct() {
$this->db = Database::connect();
}	
public function MostrarInformacionEmpresa() {
$sql = "SELECT * FROM datos_empresa ";
$resul = $this->db->query($sql);
return $resul;
}
public function MostrarParametroEmpresa() {
$sql = "SELECT * FROM parametros ";
$resul = $this->db->query($sql);
return $resul;
}
public function VerVentaCodigo($codigo) {
$sql = "SELECT * FROM venta WHERE codigo = $codigo";
$resul = $this->db->query($sql);
return $resul;
}
public function MostrarClienteId($id) {
$sql = "SELECT * FROM cliente WHERE id = $id";
$resul = $this->db->query($sql);
return $resul;
}
	
}


//require_once '../../../controllers/ClienteController.php';
//require_once '../../../controllers/InventarioController.php';
class imprimirFactura{

public $codigo;

public function traerImpresionFactura(){
$codigo = $this->codigo;
$factura = new ListaFactura();
$detalles = $factura->VerVentaCodigo($codigo);

$datosEmpresa = $factura->MostrarInformacionEmpresa();

foreach ($datosEmpresa as $key => $valueE) {
$nomEmpresa = $valueE['nombre'];
$nitEmpresa = $valueE['nit'];
$dirEmpresa = $valueE['direccion'];
$ciuEmpresa = $valueE['ciudad'];
$depEmpresa = $valueE['departamento'];
$telEmpresa = $valueE['telefono'];
$eslogan = $valueE['eslogan'];
$regimen = $valueE['regimen'];
}


while ($row = $detalles-> fetch_object()) {
$id_cliente = $row->id_cliente;
$tipoventa = $row->tipo;
$plazo = $row->id_plazo;
$fecha = $row->fecha;
$fechavencimiento = $row->fecha_vencimiento;
$productos = json_decode($row->detalle_venta, true);
$total = number_format($row->total);
}

$datosCliente = $factura->MostrarClienteId($id_cliente);
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
			
			<td style="width:190px; text-align:center;"><h1>$nomEmpresa</h1> $eslogan</td>

			<td style="background-color:white; width:120px">
				
				<div style="font-size:8.5px; text-align:center; line-height:15px;">
					
					<br>
					Nit: $nitEmpresa

					<br>
                                        $regimen
					

				</div>

			</td>

			<td style="background-color:white; width:130px">

				<div style="font-size:8.5px; text-align:center; line-height:15px;">
					
					<br>
					Telefono: $telEmpresa
					
					<br>
					$ciuEmpresa - $depEmpresa
                                        <br>
                                        $dirEmpresa

				</div>
				
			</td>

			<td style="background-color:white; width:100px; text-align:center; color:red"><br><br>FACTURA N.<br>$codigo</td>

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
		
			<td style="border: 1px solid #666; background-color:white; width:390px;">

				<strong>Cliente:</strong> $nombreC
				<br>
				<strong>CC o NIT:</strong> $nitC
				<br>
				<strong>Direccion:</strong> $direccionC 
				<br>
				<strong>Departamento:</strong> $departamentoC  <strong>Ciudad:</strong> $ciudadC

			</td>

			<td style="border: 1px solid #666; background-color:white; width:150px; text-align:right">
			
				<strong>Fecha factura:</strong> $fecha
				<br><br>
				<strong>Vence:</strong> $fechavencimiento

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
		<th style="border: 1px solid #666; background-color:white; width:55px; text-align:center; font-weight: bold">COD.</th>
		<th style="border: 1px solid #666; background-color:white; width:255px; text-align:center; font-weight: bold">DESCRIPCION</th>
		<th style="border: 1px solid #666; background-color:white; width:45px; text-align:center; font-weight: bold">Cant.</th>		
		<th style="border: 1px solid #666; background-color:white; width:60px; text-align:center; font-weight: bold">Precio</th>							
		<th style="border: 1px solid #666; background-color:white; width:45px; text-align:center; font-weight: bold">Desc</th>	
		<th style="border: 1px solid #666; background-color:white; width:80px; text-align:center; font-weight: bold">Valor Total</th>		

		</tr>

	</table>

EOF;

$pdf->writeHTML($bloque3, false, false, false, false, '');
foreach ($productos as $key => $item) {
$precio =  number_format($item['precio']);
$subtotalP = number_format($item['subtotal']);
$bloque4 = <<<EOF

	<table style="font-size:10px; padding:5px 10px;">

		<tr>
			<td style="border-bottom: 1px solid #9B9B9B; color:#333; background-color:white; width:55px; text-align:left">
			$item[codigo]
			</td>
		
			<td style="border-bottom: 1px solid #9B9B9B; color:#333; background-color:white; width:255px; text-align:left">
			$item[descripcion]	
			</td>
		
			<td style="border-bottom: 1px solid #9B9B9B; color:#333; background-color:white; width:45px; text-align:center">
			$item[cantidad]
			</td>
		
			<td style="border-bottom: 1px solid #9B9B9B; color:#333; background-color:white; width:60px; text-align:center">
			$precio
			</td>
		
			<td style="border-bottom: 1px solid #9B9B9B; color:#333; background-color:white; width:45px; text-align:center">
			$item[descuento]
			</td>	
			

			<td style="border-bottom: 1px solid #9B9B9B; color:#333; background-color:white; width:80px; text-align:center"> 
				$subtotalP
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
        
                  
			<td style="color:#333; background-color:white; width:340px;"></td>

			<td style="background-color:white; width:100px; text-align:right; font-weight: bold">
				
			</td>
		
			

		</tr>
	

		<tr>
        
                  
			<td style="color:#333; background-color:white; width:340px;">Firma: _________________ </td>

			<td style="background-color:white; width:100px; text-align:right; font-weight: bold">
				
			</td>
		
			

		</tr>
        

		<tr>
		
			<td style=" color:#333; background-color:white; width:340px;">CC:</td>

			<td style="background-color:white; width:100px; text-align:right; font-weight: bold">
				Total:
			</td>
			
			<td style="border: 1px solid #666; color:#333; background-color:white; width:100px; text-align:right">
				 $total
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
		
			<td style=" color:#333; background-color:white; width:540px; text-align:left"></td>
		</tr>
		<tr>
		<td style="border-bottom: 1px solid #666; background-color:white; width:540px; text-align:center; font-weight: bold">
			
		</td>			

		</tr>

	</table>

EOF;
$pdf->writeHTML($bloque6, false, false, false, false, '');
//SALIDA DEL ARCHIVO 
$pdf->Output('factura.pdf');
}

}
$factura = new imprimirFactura();
$factura -> codigo = $_GET["codigo"];
$factura -> traerImpresionFactura();

?>