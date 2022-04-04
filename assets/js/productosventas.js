//$.ajax({

//url: "../ajax/tablaproducto.php",
//success:function(respuesta){
//		console.log("respuesta", respuesta);
//}

//})

var idSucursal = $("#idSucursal").val();

$(".tablaproductoventa").DataTable({
  ajax: "../ajax/productofactura.php?idsucursal=" + idSucursal,
  deferRender: true,
  retrieve: true,
  processing: true,
  language: {
    sProcessing: "Procesando...",
    sLengthMenu: "Mostrar _MENU_ registros",
    sZeroRecords: "No se encontraron resultados",
    sEmptyTable: "Ningún dato disponible en esta tabla",
    sInfo: "Mostrando registros del _START_ al _END_ de un total de _TOTAL_",
    sInfoEmpty: "Mostrando registros del 0 al 0 de un total de 0",
    sInfoFiltered: "(filtrado de un total de _MAX_ registros)",
    sInfoPostFix: "",
    sSearch: "Buscar:",
    sUrl: "",
    sInfoThousands: ",",
    sLoadingRecords: "Cargando...",
    oPaginate: {
      sFirst: "Primero",
      sLast: "Último",
      sNext: "Siguiente",
      sPrevious: "Anterior",
    },
    oAria: {
      sSortAscending: ": Activar para ordenar la columna de manera ascendente",
      sSortDescending:
        ": Activar para ordenar la columna de manera descendente",
    },
  },
});

//console.log("estdo iva",precio);

$(".tablaproductoventa tbody").on(
  "click",
  "button.agregarProducto",
  function () {
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
        console.log("Respuesta", respuesta);
        var id = respuesta["id"];
        var codigo = respuesta["codigo"];
        var nombre = respuesta["nombre"];
        var stock = respuesta["can_inicial"];
        var precioVenta = respuesta["precioventa"];

        var costo = respuesta["costo"];

        console.log("Precio", precioVenta);

        /*=============================================
          EVITAR AGREGAR PRODUTO CUANDO EL STOCK ESTÁ EN CERO
          =============================================*/
        if (stock == 0) {
          swal({
            title: "No hay stock disponible",
            type: "error",
            confirmButtonText: "¡Cerrar!",
          });

          $("button[idProducto='" + idProducto + "']").addClass(
            "btn-primary agregarProducto"
          );

          return;
        }

        $(".nuevoProducto").append(
          "<tr>" +
            "<td>" +
            codigo +
            "</td>" +
            '<td class="costop">' +
            nombre +
            '<input  class="costo" type="hidden" name="costo"  value="' +
            costo +
            '"/></td>' +
            '<td class="ingresoCantidad"><input type="number" class="nuevaCantidadProducto" name="nuevaCantidadProducto" stock="' +
            stock +
            '" value="1" /></td>' +
            '<td class="precio"><input type="number" class="precioProducto" name="precioProducto" value="' +
            precioVenta +
            '"/></td>' +
            '<td class="descuentop"><input type="number" class="descuento" id="descuentoProdu" name="descuento" value="0"/></td>' +
            '<td class="nuevototalp"><input type="text" class="nuevototal"  name="nuevototal"  value="' +
            precioVenta +
            '" readonly></td>' +
            '<td><button class="btn btn-danger quitarProducto" idProducto="' +
            idProducto +
            '"><i class="fa fa-times"></i></button></td>' +
            '<input  class="nombreProduc" type="hidden" name="nombreProduc" value="' +
            nombre +
            '"/>' +
            '<input  class="idProductoVenta" type="hidden" name="idProductoVenta" value="' +
            idProducto +
            '"/>' +
            '<input  class="codigo" type="hidden" name="codigo" value="' +
            codigo +
            '"/>' +
            "</tr>"
        );
        sumarTotalPrecios();

        listarProductos();

        $(".nuevototal").number(true);
      },
    });
  }
);

function QuitarAgregarProducto() {
  var idProductos = $(".quitarProducto");
  var botonesTabla = $(".tablaproductoventa tbody button.agregarProducto");

  for (var i = 0; i < idProductos.length; i++) {
    var boton = $(idProductos[i]).attr("idProducto");

    for (var j = 0; j < botonesTabla.length; j++) {
      if ($(botonesTabla[j]).attr("idProducto") == boton) {
        $(botonesTabla[j]).removeClass("btn-primary agregarProducto");
        $(botonesTabla[j]).addClass("btn-default");
      }
    }
  }
}

/*=============================================
 CUANDO CARGUE LA TABLA CADA VEZ QUE NAVEGUE EN ELLA
 =============================================*/

$(".tablaproductoventa").on("draw.dt", function () {
  //console.log("tabla");
  if (localStorage.getItem("quitarProducto") != null) {
    var listaIdProductos = JSON.parse(localStorage.getItem("quitarProducto"));

    for (var i = 0; i < listaIdProductos.length; i++) {
      $(
        "button.recuperarBoton[idProducto='" +
          listaIdProductos[i]["idProducto"] +
          "']"
      ).removeClass("btn-default");
      $(
        "button.recuperarBoton[idProducto='" +
          listaIdProductos[i]["idProducto"] +
          "']"
      ).addClass("btn-primary agregarProducto");
    }
  }

  QuitarAgregarProducto();
});

/*=============================================
 QUITAR PRODUCTOS DE LA VENTA Y RECUPERAR BOTÓN
 =============================================*/

var idQuitarProducto = [];

localStorage.removeItem("quitarProducto");

$(".formularioVenta").on("click", "button.quitarProducto", function () {
  //console.log("boton");
  $(this).parent().parent().remove();

  var idProducto = $(this).attr("idProducto");

  /*=============================================
    ALMACENAR EN EL LOCALSTORAGE EL ID DEL PRODUCTO A QUITAR
    =============================================*/

  if (localStorage.getItem("quitarProducto") == null) {
    idQuitarProducto = [];
  } else {
    idQuitarProducto.concat(localStorage.getItem("quitarProducto"));
  }
  idQuitarProducto.push({ idProducto: idProducto });

  localStorage.setItem("quitarProducto", JSON.stringify(idQuitarProducto));

  $("button.recuperarBoton[idProducto='" + idProducto + "']").removeClass(
    "btn-default"
  );

  $("button.recuperarBoton[idProducto='" + idProducto + "']").addClass(
    "btn-primary agregarProducto"
  );

  if ($(".nuevoProducto").children().length == 0) {
    $("#nuevoTotalVenta").val(0);
    $("#totalVenta").val(0);
    //$("#nuevoTotalVenta").attr("total",0);
  } else {
    // SUMAR TOTAL DE PRECIOS

    sumarTotalPrecios();

    // AGRUPAR PRODUCTOS EN FORMATO JSON

    listarProductos();
  }
});

/*=============================================
 MODIFICAR LA CANTIDAD
 =============================================*/

$(".formularioVenta").on("change", "input.nuevaCantidadProducto", function () {
  //var elemt= $(this).parent().parent().children().children(".precioProducto");
  var precio = $(this).parent().parent().children().children(".precioProducto");
  var subtotalP = $(this).parent().parent().children().children(".nuevototal");
  var descuentoP = $(this).parent().parent().children().children(".descuento");

  var cantidad = $(this).val();
  var precioProducto = precio.val();
  var descuento = descuentoP.val();

  //console.log("totalIva",valorIvapor)

  if (Number($(this).val()) > Number($(this).attr("stock"))) {
    $(this).val(1);

    var cantidad = $(this).val();
    var precioProducto = precio.val();

    var subtotal = parseInt(cantidad * precioProducto);

    //console.log("valorIva",TotalIva);

    subtotalP.val(subtotal);
    //TotalIvaP.val(TotalIva);

    sumarTotalPrecios();
    agregarImpuesto();
    // AGRUPAR PRODUCTOS EN FORMATO JSON

    listarProductos();

    swal({
      title: "La cantidad supera el Stock",
      text: "¡Sólo hay " + $(this).attr("stock") + " unidades!",
      type: "error",
      confirmButtonText: "¡Cerrar!",
    });
  }

  if (descuento != 0) {
    var subtotal = parseInt(
      cantidad * (precioProducto - (precioProducto * descuento) / 100)
    );

    //console.log("valorIva",TotalIva);
  } else {
    var subtotal = parseInt(cantidad * precioProducto);

    //console.log("valorIva",TotalIva);
  }

  //$(this).attr("descuentoProdu", valorDescuento);
  subtotalP.val(subtotal);

  sumarTotalPrecios();

  // AGRUPAR PRODUCTOS EN FORMATO JSON

  listarProductos();
});
/*=============================================
 MODIFICAR EL PRECIO
 =============================================*/

$(".formularioVenta").on("change", "input.precioProducto", function () {
  var cantidad = $(this)
    .parent()
    .parent()
    .children()
    .children(".nuevaCantidadProducto");
  var subtotalP = $(this).parent().parent().children().children(".nuevototal");
  var descuento = $(this).parent().parent().children().children(".descuento");
  var costo = $(this).parent().parent().children().children(".costo");
  var TotalIvaP = $(this).parent().parent().children().children(".valoriva");

  var descuento = descuento.val();
  var cantidad = cantidad.val();
  var precioProducto = $(this).val();
  var valorCosto = costo.val();
  //var TotalivaP = TotalIva.val();

  //console.log("totalIva",TotalivaP)

  //console.log("costo",valorCosto);

  if (Number($(this).val()) < Number(valorCosto)) {
    //$(this).val(valorCosto);

    var precioProducto = $(this).val(valorCosto);

    var subtotal = parseInt(cantidad * valorCosto);

    subtotalP.val(subtotal);

    sumarTotalPrecios();

    // AGRUPAR PRODUCTOS EN FORMATO JSON

    listarProductos();

    swal({
      title: "El precio esta por debajo del costo",
      text: "¡El Precios costo es " + valorCosto + " del Articulo",
      type: "error",
      confirmButtonText: "¡Cerrar!",
    });
  }

  if (descuento != 0) {
    var subtotal = parseInt(
      cantidad * (precioProducto - (precioProducto * descuento) / 100)
    );
  } else {
    var subtotal = parseInt(cantidad * precioProducto);
  }
  //var subtotal = cantidad * precioProducto;

  subtotalP.val(subtotal);

  //console.log("cantidad",cantidad);
  //console.log("precio",precioProducto);
  //console.log("descuento",valorDescuento);
  sumarTotalPrecios();

  // AGRUPAR PRODUCTOS EN FORMATO JSON

  listarProductos();
});
/*=============================================
 MODIFICAR EL DESCUENTO
 =============================================*/

$(".formularioVenta").on("change", "input.descuento", function () {
  var cantidad = $(this)
    .parent()
    .parent()
    .children()
    .children(".nuevaCantidadProducto");
  var precio = $(this).parent().parent().children().children(".precioProducto");
  var subtotalP = $(this).parent().parent().children().children(".nuevototal");

  var cantidad = cantidad.val();
  var descuento = $(this).val();
  var precioP = precio.val();

  //console.log("totalIva",TotalivaP)

  var descuentoG = Number((precioP * descuento) / 100);
  var subtotal = parseInt(Number(cantidad * (precioP - descuentoG)));

  subtotalP.val(subtotal);

  //TotalIvaP.val(TotalIva);
  //console.log("boton",precioP);
  //console.log("descuento",valorDescuento);

  sumarTotalPrecios();

  // AGRUPAR PRODUCTOS EN FORMATO JSON

  listarProductos();
});

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
  console.log("sub total", sumaTotalPrecio);

  $("#nuevoTotalVenta").val(sumaTotalPrecio);
  $("#totalVenta").val(sumaTotalPrecio);

  var cliente = $(".IdCliente").val();
  $("#clienteVentaN").val(cliente);

  console.log("IdCliente", cliente);

  var idCliente = $(".cabeceraVenta").children().children(".Cliente");
  console.log("valor", idCliente.val());
  var precioFactura = idCliente.val();
}

$(".nuevoTotalVenta").number(true);
$(".nuevoSubtotal").number(true);
$(".nuevoImpuestoVenta").number(true);

function listarProductos() {
  var listaProductos = [];
  var id = $(".idProductoVenta");
  var codigo = $(".codigo");
  var costo = $(".costo");
  var descuento = $(".descuento");
  var descripcion = $(".nombreProduc");
  var cantidad = $(".nuevaCantidadProducto");
  var precio = $(".precioProducto");
  var impuesto = $(".ivaProdu");
  var subTotal = $(".nuevototal");

  for (var i = 0; i < descripcion.length; i++) {
    listaProductos.push({
      id: $(id[i]).val(),
      codigo: $(codigo[i]).val(),
      descripcion: $(descripcion[i]).val(),
      cantidad: $(cantidad[i]).val(),
      costo: $(costo[i]).val(),
      precio: $(precio[i]).val(),
      descuento: $(descuento[i]).val(),
      impuesto: $(impuesto[i]).val(),
      subtotal: $(subTotal[i]).val(),
    });
  }
  //console.log("ListaProducto", JSON.stringify(listaProductos));

  $("#listaProductos").val(JSON.stringify(listaProductos));
}
