 var idSucursal = $('#idSucursal').val();
 
$('.tablaComponentes').DataTable({
   "ajax": "../ajax/componenteProducto.php?idsucursal="+idSucursal,
   "deferRender": true,
   "retrieve": true,
   "processing": true,
   "language": {

      "sProcessing": "Procesando...",
      "sLengthMenu": "Mostrar _MENU_ registros",
      "sZeroRecords": "No se encontraron resultados",
      "sEmptyTable": "Ningún dato disponible en esta tabla",
      "sInfo": "Mostrando registros del _START_ al _END_ de un total de _TOTAL_",
      "sInfoEmpty": "Mostrando registros del 0 al 0 de un total de 0",
      "sInfoFiltered": "(filtrado de un total de _MAX_ registros)",
      "sInfoPostFix": "",
      "sSearch": "Buscar:",
      "sUrl": "",
      "sInfoThousands": ",",
      "sLoadingRecords": "Cargando...",
      "oPaginate": {
         "sFirst": "Primero",
         "sLast": "Último",
         "sNext": "Siguiente",
         "sPrevious": "Anterior"
      },
      "oAria": {
         "sSortAscending": ": Activar para ordenar la columna de manera ascendente",
         "sSortDescending": ": Activar para ordenar la columna de manera descendente"
      }

   }

});


$(".tablaComponentes tbody").on("click", "button.agregarProducto", function () {

   //var ivaAplicado = $("#tipoIva").val();	

   /*
    if(precioFactura == 1){
    console.log("valor",precioFactura);
    }else if(precioFactura == 2){
    console.log("valor",precioFactura);
    }else{
    console.log("valor",precioFactura);
    }*/

   var idProducto = $(this).attr("idProducto");

   $(this).removeClass("btn-primary agregarProducto");

   $(this).addClass("btn-default");

   var datos = new FormData();
   datos.append("idProducto", idProducto);

   $.ajax({

      url: "../ajax/ajaxProductos.php",
      method: "POST",
      data: datos,
      cache: false,
      contentType: false,
      processData: false,
      dataType: "json",
      success: function (respuesta) {


         //console.log("Respuesta", precio);
         var id = respuesta["id"];
         var codigo = respuesta["codigo"];
         var nombre = respuesta["nombre"];



         $(".nuevoComponente").append(
                 '<tr>' +
                 '<td class="valorivap">' + codigo + '<input  class="valoriva" type="hidden" name="valoriva"  /></td>' +
                 '<td class="costop">' + nombre + '<input  class="costo" type="hidden" /></td>' +
                 '<td class="ingresoCantidad"><input type="number" class="CantidadProd" name="CantidadProd" value="1" /></td>' +
                 '<td><button class="btn btn-danger quitarProducto" idProducto="' + idProducto + '"><i class="fa fa-times"></i></button></td>' +
                 '<input  class="nombreProduc" type="hidden" name="nombreProduc" value="' + nombre + '"/>' +
                 '<input  class="idProductoVenta" type="hidden" name="idProductoVenta" value="' + idProducto + '"/>' +
                 '<input  class="codigo" type="hidden" name="codigo" value="' + codigo + '"/>' +
                 '</tr>'
                 )

         listarComponente()



      }

   })

});

function QuitarAgregarProducto() {
   var idProductos = $(".quitarProducto");
   var botonesTabla = $(".tablaComponentes tbody button.agregarProducto");

   for (var i = 0; i < idProductos.length; i++) {

      var boton = $(idProductos[i]).attr("idProducto");

      for (var j = 0; j < botonesTabla.length; j++) {

         if ($(botonesTabla[j]).attr("idProducto") == boton) {
            $(botonesTabla[j]).removeClass('btn-primary agregarProducto');
            $(botonesTabla[j]).addClass('btn-default');
         }
      }
   }
}

/*=============================================
 CUANDO CARGUE LA TABLA CADA VEZ QUE NAVEGUE EN ELLA
 =============================================*/

$(".tablaComponentes").on("draw.dt", function () {
   //console.log("tabla");
   if (localStorage.getItem("quitarProducto") != null) {

      var listaIdProductos = JSON.parse(localStorage.getItem("quitarProducto"));

      for (var i = 0; i < listaIdProductos.length; i++) {

         $("button.recuperarBoton[idProducto='" + listaIdProductos[i]["idProducto"] + "']").removeClass('btn-default');
         $("button.recuperarBoton[idProducto='" + listaIdProductos[i]["idProducto"] + "']").addClass('btn-primary agregarProducto');

      }


   }

   QuitarAgregarProducto()
})


/*=============================================
 QUITAR PRODUCTOS DE LA VENTA Y RECUPERAR BOTÓN
 =============================================*/

var idQuitarProducto = [];

localStorage.removeItem("quitarProducto");

$(".formularioComponentes").on("click", "button.quitarProducto", function () {

   //console.log("boton");
   $(this).parent().parent().remove();

   var idProducto = $(this).attr("idProducto");

   /*=============================================
    ALMACENAR EN EL LOCALSTORAGE EL ID DEL PRODUCTO A QUITAR
    =============================================*/

   if (localStorage.getItem("quitarProducto") == null) {

      idQuitarProducto = [];

   } else {

      idQuitarProducto.concat(localStorage.getItem("quitarProducto"))

   }
   idQuitarProducto.push({"idProducto": idProducto});

   localStorage.setItem("quitarProducto", JSON.stringify(idQuitarProducto));

   $("button.recuperarBoton[idProducto='" + idProducto + "']").removeClass('btn-default');

   $("button.recuperarBoton[idProducto='" + idProducto + "']").addClass('btn-primary agregarProducto');




   listarComponente()




})

$(".formularioComponentes").on("change", "input.CantidadProd", function () {

   listarComponente()

})



function listarComponente() {
   var listaProductos = [];
   var id = $(".idProductoVenta");
   var codigo = $(".codigo");
   var descripcion = $(".nombreProduc");
   var cantidad = $(".CantidadProd");

   for (var i = 0; i < descripcion.length; i++) {

      listaProductos.push({"id": $(id[i]).val(),
         "codigo": $(codigo[i]).val(),
         "descripcion": $(descripcion[i]).val(),
         "cantidad": $(cantidad[i]).val()

      })

   }
   //console.log("ListaProducto", JSON.stringify(listaProductos));

   $("#listaComponente").val(JSON.stringify(listaProductos));

}