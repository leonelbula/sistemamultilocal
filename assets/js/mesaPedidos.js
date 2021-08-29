
//	
// $.ajax({
//
// 	url: "../ajax/tablaMesas.php",
// 	success:function(respuesta){
//		//	console.log("respuesta", respuesta);
//	}
//
//})
 
 $('.tablamesa').DataTable( {
    "ajax": "../ajax/tablaMesas.php",
    "deferRender": true,
	"retrieve": true,
	"processing": true,
	 "language": {

			"sProcessing":     "Procesando...",
			"sLengthMenu":     "Mostrar _MENU_ registros",
			"sZeroRecords":    "No se encontraron resultados",
			"sEmptyTable":     "Ningún dato disponible en esta tabla",
			"sInfo":           "Mostrando registros del _START_ al _END_ de un total de _TOTAL_",
			"sInfoEmpty":      "Mostrando registros del 0 al 0 de un total de 0",
			"sInfoFiltered":   "(filtrado de un total de _MAX_ registros)",
			"sInfoPostFix":    "",
			"sSearch":         "Buscar:",
			"sUrl":            "",
			"sInfoThousands":  ",",
			"sLoadingRecords": "Cargando...",
			"oPaginate": {
			"sFirst":    "Primero",
			"sLast":     "Último",
			"sNext":     "Siguiente",
			"sPrevious": "Anterior"
			},
			"oAria": {
				"sSortAscending":  ": Activar para ordenar la columna de manera ascendente",
				"sSortDescending": ": Activar para ordenar la columna de manera descendente"
			}

	}

} );

$(".tablamesa tbody").on("click", "button.agregarMesa", function(){
	
	var idMesa = $(this).attr("idMesa");
	//console.log("Respuesta", idMesa);		
	$("button.agregarMesa").addClass('disabled');
		
	$(this).addClass("btn-default");
	
	$("#modalAgregarMesa").modal("hide");
	
	var datos = new FormData();
    datos.append("idMesa", idMesa);
	
	$.ajax({

		url: "../ajax/ajaxMesas.php",
		method: "POST",
		data: datos,
		cache: false,
		contentType: false,
		processData: false,
		dataType: "json",
		success: function (respuesta) {

			console.log("Respuesta", respuesta);
			var idMesa = respuesta["id_mesa"];		
			var Nombre = respuesta["nombre"];			
			 
							 
			$(".cabeceraPedido").append(
					'<div class="col-sm-4 invoice-col">'+					
					'<input type="hidden" class="idMesaPedido" value="'+idMesa+'"/>'+					
					'<input type="hidden" class="Mesa" value="'+idMesa+'" />'+
				'<address>'+
					'<strong> Mesa </strong><br>'+
					'<h2>'+Nombre+'</h2><br>'+	
				'</address>'+
			'</div>'+			
			'<div class="col-sm-4 invoice-col">'+				
				'<address>'+					
				'</address>'+
				'<button class="btn btn-danger quitarMesa" idMesa="'+idMesa+'"><i class="fa fa-times"></i></button>'+
			'</div>'
			
			)
			
			}

	})
	
});
    

var idQuitarMesa = [];

localStorage.removeItem("quitarMesa");

$(".cabeceraPedido").on("click", "button.quitarMesa", function(){

	//console.log("boton");
	$(this).parent().parent().remove();
	
	var idCliente = $(this).attr("idMesa");
	
	/*=============================================
	ALMACENAR EN EL LOCALSTORAGE EL ID DEL PRODUCTO A QUITAR
	=============================================*/

	if(localStorage.getItem("quitarMesa") == null){

		idQuitarMesa = [];
	
	}else{

		idQuitarMesa.concat(localStorage.getItem("quitarMesa"))

	}
	idQuitarMesa.push({"idCliente":idCliente});

	localStorage.setItem("quitarMesa", JSON.stringify(idQuitarMesa));
	
	$("button.recuperarBoton[idMesa='"+idCliente+"']").removeClass('btn-default');

	$("button.recuperarBoton[idMesa='"+idCliente+"']").addClass('btn-primary agregarMesa');
	
	$("button.agregarMesa").addClass('btn-primary agregarMesa');
	
	$("button.agregarMesa").removeClass('disabled');
	location.reload();



})



