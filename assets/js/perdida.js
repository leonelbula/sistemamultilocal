//$.ajax({

//url: "../ajax/tablaproducto.php",
//success:function(respuesta){
//		console.log("respuesta", respuesta);
//}

//})

var idSucursal = $('#idSucursal').val();

$('.tablaproductoperdida').DataTable({
   "ajax": "../ajax/productofactura.php?idsucursal=" + idSucursal,
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

//console.log("estdo iva",precio);

$(".tablaproductoperdida tbody").on("click", "button.agregarProducto", function () {

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



         var id = respuesta["id"];
         var codigo = respuesta["codigo"];
         var nombre = respuesta["nombre"];
         var stock = respuesta["can_inicial"];

         var costo = respuesta["costo"];


         /*=============================================
          EVITAR AGREGAR PRODUTO CUANDO EL STOCK ESTÁ EN CERO
          =============================================*/
         if (stock == 0) {

            swal({
               title: "No hay stock disponible",
               type: "error",
               confirmButtonText: "¡Cerrar!"
            });

            $("button[idProducto='" + idProducto + "']").addClass("btn-primary agregarProducto");

            return;

         }

         $(".nuevoProducto").append(
                 '<tr>' +
                 '<td>' + codigo + '</td>' +
                 '<td class="costop">' + nombre + '<input  class="costo" type="hidden" name="costo"  value="' + costo + '"/></td>' +
                 '<td class="ingresoCantidad"><input type="number" class="nuevaCantidadProducto" name="nuevaCantidadProducto" stock="' + stock + '" value="1" /></td>' +
                 '<td class="costo"><input type="number" class="costo" name="costo" value="' + costo + '" readonly/></td>' +
                 '<td class="nuevototalp"><input type="text" class="nuevototal"  name="nuevototal"  value="' + costo + '" readonly></td>' +
                 '<td><button class="btn btn-danger quitarProducto" idProducto="' + idProducto + '"><i class="fa fa-times"></i></button></td>' +
                 '<input  class="nombreProduc" type="hidden" name="nombreProduc" value="' + nombre + '"/>' +
                 '<input  class="idProductoVenta" type="hidden" name="idProductoVenta" value="' + idProducto + '"/>' +
                 '<input  class="codigo" type="hidden" name="codigo" value="' + codigo + '"/>' +
                 '</tr>'
                 )
         sumarTotalPrecios()

         listarProductos()

         $(".nuevototal").number(true);


      }

   })

});

function QuitarAgregarProducto() {
   var idProductos = $(".quitarProducto");
   var botonesTabla = $(".tablaproductoperdida tbody button.agregarProducto");

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

$(".tablaproductoperdida").on("draw.dt", function () {
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

$(".formularioPerdida").on("click", "button.quitarProducto", function () {

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

   if ($(".nuevoProducto").children().length == 0) {


      $("#nuevoTotalVenta").val(0);
      $("#totalVenta").val(0);
      //$("#nuevoTotalVenta").attr("total",0);

   } else {

      // SUMAR TOTAL DE PRECIOS

      sumarTotalPrecios()

      // AGRUPAR PRODUCTOS EN FORMATO JSON

      listarProductos()

   }


})

/*=============================================
 MODIFICAR LA CANTIDAD
 =============================================*/


$(".formularioPerdida").on("change", "input.nuevaCantidadProducto", function () {

   //var elemt= $(this).parent().parent().children().children(".precioProducto");
   var precio = $(this).parent().parent().children().children(".costo");
   var subtotalP = $(this).parent().parent().children().children(".nuevototal");


   var cantidad = $(this).val();
   var costo = precio.val();

   var subtotal = parseInt(cantidad * costo);

   console.log("sub total", subtotal);

   //$(this).attr("descuentoProdu", valorDescuento);
   subtotalP.val(subtotal);



   sumarTotalPrecios()

   // AGRUPAR PRODUCTOS EN FORMATO JSON

   listarProductos()

})



/*=============================================
 SUMAR TODOS LOS PRECIOS
 =============================================*/
function sumarTotalPrecios() {

   var precioItem = $(".nuevototal");
   var arraySumaPrecio = [];

   for (var i = 0; i < precioItem.length; i++) {

      arraySumaPrecio.push(Number($(precioItem[i]).val()));

   }
   function sumaArrayPrecios(total, numero) {

      return total + numero;

   }
   var sumaTotalPrecio = arraySumaPrecio.reduce(sumaArrayPrecios);


   $("#nuevoTotalVenta").val(sumaTotalPrecio);
   $("#totalVenta").val(sumaTotalPrecio);



}




$(".nuevoTotalVenta").number(true);
$(".nuevoSubtotal").number(true);


function listarProductos() {
   var listaProductos = [];
   var id = $(".idProductoVenta");
   var codigo = $(".codigo");
   var costo = $(".costo");
   var descripcion = $(".nombreProduc");
   var cantidad = $(".nuevaCantidadProducto");
   var precio = $(".precioProducto");
   var subTotal = $(".nuevototal");

   for (var i = 0; i < descripcion.length; i++) {

      listaProductos.push({"id": $(id[i]).val(),
         "codigo": $(codigo[i]).val(),
         "descripcion": $(descripcion[i]).val(),
         "cantidad": $(cantidad[i]).val(),
         "costo": $(costo[i]).val(),
         "precio": $(precio[i]).val(),
         "subtotal": $(subTotal[i]).val()})

   }
   //console.log("ListaProducto", JSON.stringify(listaProductos));

   $("#listaProductos").val(JSON.stringify(listaProductos));



}
