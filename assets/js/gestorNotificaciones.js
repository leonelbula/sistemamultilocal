/*=============================================
 ACTUALIZAR NOTIFICACIONES
 =============================================*/

 var idSucursal = $('#idSucursal').val();
 
var rutaOculta = $("#rutaOculta").val();
$(".actualizarNotificaciones").click(function (e) {

   e.preventDefault();

   var item = $(this).attr("item");

   var datos = new FormData();
   datos.append("item", item);
   
   

   $.ajax({

      url: "../ajax/ajaxNotificaciones.php?idsucursal="+idSucursal,
      method: "POST",
      data: datos,
      cache: false,
      contentType: false,
      processData: false,
      success: function (respuesta) {

         if (respuesta == "ok") {

            if (item == "producto_stock") {

               window.location = rutaOculta + "inventario/";
            }

            if (item == "cliente_mora") {

               window.location = rutaOculta + "cliente/estadocuenta";
            }

         }

      }

   })
})