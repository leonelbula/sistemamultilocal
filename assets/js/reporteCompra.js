/*=============================================
VARIABLE LOCAL STORAGE
=============================================*/
var rutaOculta = $("#rutaOculta").val();

if(localStorage.getItem("capturarRango3") != null){

	$("#daterange-btn3 span").html(localStorage.getItem("capturarRango3"));


}else{

	$("#daterange-btn3 span").html('<i class="fa fa-calendar"></i> Rango de fecha')

}

/*=============================================
RANGO DE FECHAS
=============================================*/
$('#daterange-btn3').daterangepicker(
  {
    ranges   : {
      'Hoy'       : [moment(), moment()],
      'Ayer'   : [moment().subtract(1, 'days'), moment().subtract(1, 'days')],
      'Últimos 7 días' : [moment().subtract(6, 'days'), moment()],
      'Últimos 30 días': [moment().subtract(29, 'days'), moment()],
      'Este mes'  : [moment().startOf('month'), moment().endOf('month')],
      'Último mes'  : [moment().subtract(1, 'month').startOf('month'), moment().subtract(1, 'month').endOf('month')]
    },
    startDate: moment(),
    endDate  : moment()
  },
  function (start, end) {
    $('#daterange-btn3 span').html(start.format('MMMM D, YYYY') + ' - ' + end.format('MMMM D, YYYY'));

    var fechaInicial = start.format('YYYY-MM-DD');

    var fechaFinal = end.format('YYYY-MM-DD');

    var capturarRango = $("#daterange-btn3 span").html();
   
   	localStorage.setItem("capturarRango3", capturarRango);

   	window.location = rutaOculta+"compras/reportecompra&fechaInicial="+fechaInicial+"&fechaFinal="+fechaFinal;

  }

)

/*=============================================
CANCELAR RANGO DE FECHAS
=============================================*/

$(".daterangepicker .range_inputs .cancelBtn").on("click", function(){

	localStorage.removeItem("capturarRango3");
	localStorage.clear();
	window.location = "reportecompra";
})

/*=============================================
CAPTURAR HOY
=============================================*/

$(".daterangepicker .ranges li").on("click", function(){

	var textoHoy = $(this).attr("data-range-key");

	if(textoHoy == "Hoy"){

    var d = new Date();
    
    var dia = d.getDate();
    var mes = d.getMonth()+1;
    var año = d.getFullYear();

    if(mes < 10){

      var fechaInicial = año+"-0"+mes+"-"+dia;
      var fechaFinal = año+"-0"+mes+"-"+dia;

    }else if(dia < 10){

      var fechaInicial = año+"-"+mes+"-0"+dia;
      var fechaFinal = año+"-"+mes+"-0"+dia;

    }else if(mes < 10 && dia < 10){

      var fechaInicial = año+"-0"+mes+"-0"+dia;
      var fechaFinal = año+"-0"+mes+"-0"+dia;

    }else{

      var fechaInicial = año+"-"+mes+"-"+dia;
        var fechaFinal = año+"-"+mes+"-"+dia;

    } 

    	localStorage.setItem("capturarRango3", "Hoy");

    	window.location = rutaOculta+"compras/reportecompra&fechaInicial="+fechaInicial+"&fechaFinal="+fechaFinal;

	}

})




