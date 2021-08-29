var idSucursal = $('#idSucursal').val();
/*=============================================
BOTON EDITAR VENTA
=============================================*/
$(".PlansepareRealizados").on("click", ".btnEditarPlansepare", function(){

	var id = $(this).attr("idPlansepare");

	window.location = "editar&id="+id;


})

$(".PlansepareRealizados").on("click", ".btnEliminarPlansepare", function(){

  var id = $(this).attr("idPlansepare");

  swal({
        title: '¿Está seguro de borrar el registro?',
        text: "¡Si no lo está puede cancelar la accíón!",
        type: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        cancelButtonText: 'Cancelar',
        confirmButtonText: 'Si, borrar venta!'
      }).then(function(result){
        if (result.value) {
          
            window.location = "eliminar&id="+id;
        }

  })

})

/*=============================================
IMPRIMIR FACTURA
=============================================*/

$("#PlansepareRealizados").on("click", ".btnImprimirPlansepare", function(){

	var codigo = $(this).attr("codigo");

	window.open("../extensiones/tcpdf/pdf/plansepareticket.php?id="+idSucursal+"&codigo="+codigo, "_blank");

})



$("#tablaestadocuentaPlansepare").on("click", ".btnImprimirAbonoPlansepare", function(){

	var codigo = $(this).attr("codigo");

	window.open("../extensiones/tcpdf/pdf/ticketabonoplancepare.php?id="+idSucursal+"&codigo="+codigo, "_blank");

})


