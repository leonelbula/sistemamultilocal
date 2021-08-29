//$.ajax({

//url: "../ajax/tablaproducto.php",
//success:function(respuesta){
//		console.log("respuesta", respuesta);
//}

//})

$('.tablaproductoCompra').DataTable({
   "ajax": "../ajax/productosCompra.php",
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

$(".tablaproductoCompra tbody").on("click", "button.agregarProducto", function () {

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
         var estado = respuesta["estado"];
         var codigo = respuesta["codigo"];
         var nombre = respuesta["nombre"];
         var stock = respuesta["can_inicial"];
         var costo = respuesta["costo"];





         /*=============================================
          EVITAR AGREGAR PRODUTO CUANDO EL STOCK ESTÁ EN CERO
          =============================================*/
         

         $(".nuevoProducto").append(
                 '<tr>' +
                 '<td class="valorivap">' + codigo + '</td>' +
                 '<td class="costop">' + nombre + '<input  class="costo" type="hidden" name="costo"  value="' + costo + '"/></td>' +
                 '<td class="ingresoCantidad"><input type="number" class="CantidadProd" name="CantidadProd"  value="1" /></td>' +
                 '<td class="precio"><input type="number" class="costoProducto" name="costoProducto" value="' + costo + '"/></td>' +
                 '<td class="descuentop"><input type="number" class="descuento" id="descuentoProduC" name="descuento" value="0"/></td>' +
              
                 '<td class="nuevototalp"><input type="text" class="nuevototalC"  name="nuevototalC"  value="' + costo + '" readonly></td>' +
                 '<td><button class="btn btn-danger quitarProducto" idProducto="' + idProducto + '"><i class="fa fa-times"></i></button></td>' +
                 '<input  class="nombreProduc" type="hidden" name="nombreProduc" value="' + nombre + '"/>' +
                 '<input  class="idProductoVenta" type="hidden" name="idProductoVenta" value="' + idProducto + '"/>' +
                 '<input  class="codigo" type="hidden" name="codigo" value="' + codigo + '"/>' +
                 '</tr>'
                 )
         sumarTotalPreciosCompra()

         
         listarProductosCompra()

         $(".nuevototalC").number(true);




      }

   })

});

function QuitarAgregarProducto() {
   var idProductos = $(".quitarProducto");
   var botonesTabla = $(".tablaproductoCompra tbody button.agregarProducto");

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

$(".tablaproductoCompra").on("draw.dt", function () {
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

$(".formularioCompra").on("click", "button.quitarProducto", function () {

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

      $("#nuevoImpuestoVenta").val(0);
      $("#nuevoTotalCompra").val(0);
      $("#nuevoSubtotalCompra").val(0);
      $("#SubCompra").val(0);
      $("#ivaVenta").val(0);
      $("#totalCompra").val(0);
      //$("#nuevoTotalCompra").attr("total",0);

   } else {

      // SUMAR TOTAL DE PRECIOS

      sumarTotalPreciosCompra()

      // AGRUPAR PRODUCTOS EN FORMATO JSON

      listarProductosCompra()

   }


})

/*=============================================
 MODIFICAR LA CANTIDAD
 =============================================*/

$(".formularioCompra").on("change", "input.CantidadProd", function () {

   //var elemt= $(this).parent().parent().children().children(".costoProducto");
   var precio = $(this).parent().parent().children().children(".costoProducto");
   var subtotalP = $(this).parent().parent().children().children(".nuevototalC");
   var descuentoP = $(this).parent().parent().children().children(".descuento");
   

   var cantidad = $(this).val();
   var costoProducto = precio.val();
   var descuento = descuentoP.val();
   
   //console.log("totalIva",valorIvapor)

   
   //console.log("porcentaje",prue);


   if (Number($(this).val()) < 0) {

      $(this).val(1);

      var cantidad = $(this).val();
      var costoProducto = precio.val();

      var subtotal = parseInt(cantidad * costoProducto);

 
      //console.log("valorIva",TotalIva);

      subtotalP.val(subtotal);
      //TotalIvaP.val(TotalIva);

      sumarTotalPreciosCompra()
     
      // AGRUPAR PRODUCTOS EN FORMATO JSON

      listarProductosCompra()

      swal({
         title: "La cantidad no puede ser cero",
         text: "¡minumo una unidades!",
         type: "error",
         confirmButtonText: "¡Cerrar!"
      });


   }

   if (descuento != 0) {

      var subtotal = parseInt(cantidad * (costoProducto - (costoProducto * descuento / 100)));

     
      //console.log("valorIva",TotalIva);
   } else {

      var subtotal = parseInt(cantidad * costoProducto);
     
      //console.log("valorIva",TotalIva);
   }


   //$(this).attr("descuentoProduC", valorDescuento);
   subtotalP.val(subtotal);


   sumarTotalPreciosCompra()

   // AGRUPAR PRODUCTOS EN FORMATO JSON

   listarProductosCompra()

})
/*=============================================
 MODIFICAR EL PRECIO
 =============================================*/

$(".formularioCompra").on("change", "input.costoProducto", function () {


   var cantidad = $(this).parent().parent().children().children(".CantidadProd");
   var subtotalP = $(this).parent().parent().children().children(".nuevototalC");
   var descuento = $(this).parent().parent().children().children(".descuento");
   var valorIva = $(this).parent().parent().children().children(".IvaproductoC");
   var costo = $(this).parent().parent().children().children(".costo");
   


   var descuento = descuento.val();
   var cantidad = cantidad.val();
   var costoProducto = $(this).val();
   var valorCosto = costo.val();
   //var TotalivaP = TotalIva.val();

   //console.log("totalIva",TotalivaP)

   //console.log("costo",valorCosto);

   var ivaValor = valorIva.val();
   var ValorCalculo = Number((100 + parseInt(ivaValor)) / 100);


   if (Number($(this).val()) < 0) {

      //$(this).val(valorCosto);

      var costoProducto = $(this).val(valorCosto);

      var subtotal = parseInt(cantidad * valorCosto);

      
      subtotalP.val(subtotal);

      sumarTotalPreciosCompra()

      
      // AGRUPAR PRODUCTOS EN FORMATO JSON

      listarProductosCompra()

      swal({
         title: "El precio esta por debajo del costo",
         text: "¡El Precios costo es " + valorCosto + " del Articulo",
         type: "error",
         confirmButtonText: "¡Cerrar!"
      });


   }



   if (descuento != 0) {

      var subtotal = parseInt(cantidad * (costoProducto - (costoProducto * descuento / 100)));


   } else {
      var subtotal = parseInt(cantidad * costoProducto);

   }
   //var subtotal = cantidad * costoProducto;


   subtotalP.val(subtotal);
  
   //console.log("cantidad",cantidad);
   //console.log("precio",costoProducto);
   //console.log("descuento",valorDescuento);
   sumarTotalPreciosCompra()
   
   // AGRUPAR PRODUCTOS EN FORMATO JSON

   listarProductosCompra()

})
/*=============================================
 MODIFICAR EL DESCUENTO
 =============================================*/

$(".formularioCompra").on("change", "input.descuento", function () {


   var cantidad = $(this).parent().parent().children().children(".CantidadProd");
   var precio = $(this).parent().parent().children().children(".costoProducto");
   var subtotalP = $(this).parent().parent().children().children(".nuevototalC");
  
  
   var cantidad = cantidad.val();
   var descuento = $(this).val();
   var precioP = precio.val();


   //console.log("totalIva",TotalivaP)


   var descuentoG = Number((precioP * descuento / 100));
   var subtotal = parseInt(Number(cantidad * (precioP - descuentoG)));

  

   subtotalP.val(subtotal);

   //TotalIvaP.val(TotalIva);
   //console.log("boton",precioP);
   //console.log("descuento",valorDescuento);

   sumarTotalPreciosCompra()

   // AGRUPAR PRODUCTOS EN FORMATO JSON

   listarProductosCompra()
})

/*=============================================
 SUMAR TODOS LOS PRECIOS
 =============================================*/
function sumarTotalPreciosCompra() {
   var ivaAplicado = $("#tipoIva").val();
   var precioItem = $(".nuevototalC");
   var arraySumaPrecio = [];

   for (var i = 0; i < precioItem.length; i++) {

      arraySumaPrecio.push(Number($(precioItem[i]).val()));

   }
   function sumaArrayPrecios(total, numero) {

      return total + numero;

   }
   var sumaTotalPrecio = arraySumaPrecio.reduce(sumaArrayPrecios);
   //console.log("sub total",sumaTotalPrecio)
   
      $("#nuevoTotalCompra").val(sumaTotalPrecio);
      $("#totalCompra").val(sumaTotalPrecio);
   
   var cliente = $(".proveedor").val();
   $("#proveedorCompraN").val(cliente);

   //console.log("IdCliente",cliente)
}





$(".nuevoTotalCompra").number(true);
$(".nuevoSubtotalCompra").number(true);
$(".nuevoImpuestoVenta").number(true);

function listarProductosCompra() {
   var listaProductos = [];
   var id = $(".idProductoVenta");
   var codigo = $(".codigo");
   var descuento = $(".descuento");
   var descripcion = $(".nombreProduc");
   var cantidad = $(".CantidadProd");
   var precio = $(".costoProducto");
   var subTotal = $(".nuevototalC");

   for (var i = 0; i < descripcion.length; i++) {

      listaProductos.push({"id": $(id[i]).val(),
         "codigo": $(codigo[i]).val(),
         "descripcion": $(descripcion[i]).val(),
         "cantidad": $(cantidad[i]).val(),
         "precio": $(precio[i]).val(),
         "descuento": $(descuento[i]).val(),
         "impuesto": 0,
         "subtotal": $(subTotal[i]).val()})

   }
   console.log("ListaProducto", JSON.stringify(listaProductos));

   $("#listaProductos").val(JSON.stringify(listaProductos));

}
