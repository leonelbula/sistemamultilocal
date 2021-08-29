
$('.tablaproveedorCompra').DataTable({
   "ajax": "../ajax/tablaproveedor.php",
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

$(".tablaproveedorCompra tbody").on("click", "button.agregarProveedor", function () {

   var idProveedor = $(this).attr("idProveedor");

   $("button.agregarProveedor").addClass('disabled');

   $(this).addClass("btn-default");

   $("#modalAgregarProveedor").modal("hide");

   var datos = new FormData();
   datos.append("idProveedor", idProveedor);

   $.ajax({

      url: "../ajax/ajaxProveedor.php",
      method: "POST",
      data: datos,
      cache: false,
      contentType: false,
      processData: false,
      dataType: "json",
      success: function (respuesta) {

         console.log("Respuesta", respuesta);
         var id = respuesta["id"];
         var Nit = respuesta["nit"];
         var Nombre = respuesta["nombre"];
         var Direccion = respuesta["direccion"];        
         var Ciudad = respuesta["ciudad"];

         $('#IdProveedor').val(id);
         $('#nombre').val(Nombre);
         $('#nit').val(Nit);
         $('#direccion').val(Direccion);
         $('#ciudad').val(Ciudad);
         

      }

   })

});


var idQuitarProveedor = [];

localStorage.removeItem("quitarProveedor");

$(".cabeceraCompra").on("click", "button.quitarProveedor", function () {

   //console.log("boton");
   $(this).parent().parent().remove();

   var idProveedor = $(this).attr("idProveedor");

   /*=============================================
    ALMACENAR EN EL LOCALSTORAGE EL ID DEL PRODUCTO A QUITAR
    =============================================*/

   if (localStorage.getItem("quitarProveedor") == null) {

      idQuitarProveedor = [];

   } else {

      idQuitarProveedor.concat(localStorage.getItem("quitarProveedor"))

   }
   idQuitarProveedor.push({"idProveedor": idProveedor});

   localStorage.setItem("quitarProveedor", JSON.stringify(idQuitarProveedor));

   $("button.recuperarBotonP[idProveedor='" + idProveedor + "']").removeClass('btn-default');

   $("button.recuperarBotonP[idProveedor='" + idProveedor + "']").addClass('btn-primary agregarProveedor');

   $("button.agregarProveedor").addClass('btn-primary agregarProveedor');

   $("button.agregarProveedor").removeClass('disabled');
   location.reload();



})


$(".seleccionarTipoCompra").change(function () {

   var tipo = $(this).val();

   //$(".seleccionarTipo").html("");


   if (tipo == 0) {
      console.log("respuesta", tipo);
      //$(".plazoVenta").addClass('disabled'); 
      $('.plazoVenta').prop('disabled', 'disabled');

   } else {
      $('.plazoVenta').attr('disabled', false);
   }

})