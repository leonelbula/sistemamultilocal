$(".tablasPedido").on("click", ".btnverpedido", function(){

	var idProveedor = $(this).attr("verPedido");

	window.open("../extensiones/tcpdf/pdf/pedido.php?id="+idProveedor, "_blank");

})