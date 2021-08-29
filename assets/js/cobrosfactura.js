$(".formularioCobro").on("change", "input#nuevoValorEfectivo", function(){

	var efectivo = $(this).val();
	var valor = document.getElementById("valor").value;
	var cambio =  Number(efectivo) - Number(valor);

	var nuevoCambioEfectivo = $(this).children().children('#nuevoCambioEfectivo');
	
	$("#cambio").val(cambio);
	
	nuevoCambioEfectivo.val(cambio);
	
	console.log("valor ",valor);
	console.log("efectivo",efectivo);
	console.log("efectivo",cambio)

})