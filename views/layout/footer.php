<script>
  $(function () {
  
    $('#ventas').DataTable({
      'paging'      : true,
      'lengthChange': false,
      'searching'   : false,
      'ordering'    : true,
      'info'        : true,
      'autoWidth'   : false
    })
  })
</script>
<input type="hidden" value="<?php echo URL_BASE; ?>" id="rutaOculta">
<script src="<?= URL_BASE ?>assets/js/funciones.js"></script>
<script src="<?= URL_BASE ?>assets/js/productos.js"></script>
<script src="<?= URL_BASE ?>assets/js/clienteventas.js"></script>
<script src="<?= URL_BASE ?>assets/js/productosventas.js"></script>
<script src="<?= URL_BASE ?>assets/js/productoscompras.js"></script>
<script src="<?= URL_BASE ?>assets/js/ventas.js"></script>
<script src="<?= URL_BASE ?>assets/js/compras.js"></script>
<script src="<?= URL_BASE ?>assets/js/mesaPedidos.js"></script>
<script src="<?= URL_BASE ?>assets/js/proveedorCompra.js"></script>
<script src="<?= URL_BASE ?>assets/js/gestorNotificaciones.js"></script>
<script src="<?= URL_BASE ?>assets/js/reporteVentas.js"></script>
<script src="<?= URL_BASE ?>assets/js/reporteUtilidad.js"></script>
<script src="<?= URL_BASE ?>assets/js/funcionesProductos.js"></script>
<script src="<?= URL_BASE ?>assets/js/tablaclientes.js"></script>
<script src="<?= URL_BASE ?>assets/js/tablaproveedor.js"></script>
<script src="<?= URL_BASE ?>assets/js/funciones.js"></script>
<script src="<?= URL_BASE ?>assets/js/pedido.js"></script>
<script src="<?= URL_BASE ?>assets/js/cobrosfactura.js"></script>
<script src="<?= URL_BASE ?>assets/js/funcionesComponentes.js"></script>
<script src="<?= URL_BASE ?>assets/js/plansepare.js"></script>
<script src="<?= URL_BASE ?>assets/js/tablanoexistentes.js"></script>  
<script src="<?= URL_BASE ?>assets/js/perdida.js"></script> 
<script src="<?= URL_BASE ?>assets/js/tablaperdida.js"></script> 
<script src="<?= URL_BASE ?>assets/js/devolucion.js"></script> 
<script src="<?= URL_BASE ?>assets/js/tabladevolucion.js"></script>
<script src="<?= URL_BASE ?>assets/js/validarinventario.js"></script>
</body>
</html>
