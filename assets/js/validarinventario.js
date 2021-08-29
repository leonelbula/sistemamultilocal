//$.ajax({

//url: "../ajax/tablaproducto.php",
//success:function(respuesta){
//		console.log("respuesta", respuesta);
//}

//})

 var idSucursal = $('#idSucursal').val();

$('.tablaproductovalidar').DataTable({
   "ajax": "../ajax/productovalidar.php",
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

$(".tablaproductovalidar tbody").on("click", "button.agregarProducto", function () {

   var idProducto = $(this).attr("idProducto");

  
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


         console.log("Respuesta", respuesta);
         var id = respuesta["id"];         
         var codigo = respuesta["codigo"];
         var nombre = respuesta["nombre"];
         var stock = respuesta["can_inicial"];
         var precioVenta = respuesta["precioventa"];

         var costo = respuesta["costo"];

         console.log("Precio", precioVenta);

         $('#Idproducto').val(id);
         $('#nombre').val(nombre);
         $('#costo').val(costo);
         $('#precio').val(precioVenta);
         $('#cantidad').val(stock);

  


      }

   })

});
