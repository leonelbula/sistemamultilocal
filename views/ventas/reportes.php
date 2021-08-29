<div class="container">

	<section class="content-header">

		<h1>

			Reportes de ventas

		</h1>

		<ol class="breadcrumb">

			<li><a href="inicio"><i class="fa fa-dashboard"></i> Inicio</a></li>

			<li class="active">Reportes de ventas</li>

		</ol>

	</section>

	<section class="content">

		<div class="box">

			<div class="box-header with-border">

				<div class="input-group">

					<button type="button" class="btn btn-default" id="daterange-btn2">

						<span>
							<i class="fa fa-calendar"></i> Rango de fecha
						</span>

						<i class="fa fa-caret-down"></i>

					</button>

				</div>

				<div class="box-tools pull-right">

					<?php
					if (isset($_GET["fechaInicial"])) {

						echo '<a href="">';
					} else {

						echo '<a href="">';
					}
					?>

					<button class="btn btn-success" style="margin-top:5px">Descargar reporte en Excel</button>

					</a>

				</div>

			</div>

			<div class="box-body">

				<div class="row">

					<div class="col-xs-12">
						<?php
						
						
						?>


						<div class="box box-solid bg-teal-gradient">

							<div class="box-header">

								<i class="fa fa-th"></i>

								<h3 class="box-title">Gráfico de Compas</h3>

							</div>

							<div class="box-body border-radius-none nuevoGraficoVentas">

								<div class="chart" id="line-chart-ventas" style="height: 250px;"></div>

							</div>

						</div>



					</div>
					<script>
	
 var line = new Morris.Line({
    element          : 'line-chart-ventas',
    resize           : true,
    data             : [

    <?php

    if($noRepetirFechas != null){

	    foreach($noRepetirFechas as $key){

	    	echo "{ y: '".$key."', ventas: ".$sumaPagosMes[$key]." },";


	    }

	    echo "{y: '".$key."', ventas: ".$sumaPagosMes[$key]." }";

    }else{

       echo "{ y: '0', ventas: '0' }";

    }

    ?>

    ],
    xkey             : 'y',
    ykeys            : ['ventas'],
    labels           : ['ventas'],
    lineColors       : ['#efefef'],
    lineWidth        : 2,
    hideHover        : 'auto',
    gridTextColor    : '#fff',
    gridStrokeWidth  : 0.4,
    pointSize        : 4,
    pointStrokeColors: ['#efefef'],
    gridLineColor    : '#efefef',
    gridTextFamily   : 'Open Sans',
    preUnits         : '$',
    gridTextSize     : 10
  });

</script>

					<div class="col-md-6 col-xs-12">

<?php
//include "reportes/productos-mas-vendidos.php";
?>

					</div>

					<div class="col-md-6 col-xs-12">

						<?php
						// include "reportes/vendedores.php";
						?>

					</div>

					<div class="col-md-6 col-xs-12">

						<?php
						//include "reportes/compradores.php";
						?>

					</div>

				</div>

			</div>

		</div>

	</section>

</div>