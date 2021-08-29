


$(".tablascompras").on("click", ".btnEditarCompra", function(){

	var idCompra = $(this).attr("idCompra");

	window.location = "editarcompra&id="+idCompra;


})

$(".tablascompras").on("click", ".btnEliminarCompra", function(){

  var idCompra = $(this).attr("idCompra");

  swal({
        title: '¿Está seguro de borrar la compra?',
        text: "¡Si no lo está puede cancelar la accíón!",
        type: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        cancelButtonText: 'Cancelar',
        confirmButtonText: 'Si, borrar Compra!'
      }).then(function(result){
        if (result.value) {
          
            window.location = "eliminarCompra&id="+idCompra;
        }

  })

})

/*=============================================
IMPRIMIR FACTURA
=============================================*/

$(".tablascompras").on("click", ".btnImprimirFacturaCompra", function(){

	var codigoCompra = $(this).attr("codigoCompra");

	window.open("../extensiones/tcpdf/pdf/facturacompra.php?codigo="+codigoCompra, " _blank");

})