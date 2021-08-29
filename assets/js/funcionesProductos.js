//$(".formularioVenta").on("change", "input.costo", function(){
//	var costo =  document.getElementById("costo").value;
//	
//	console.log("costo",costo)
//})


$('.formularioProducto').on('change','input.costo',function(){
   var costo = Number($('.costo').val());
   var utilidad = Number($('.Utilidad').val());
   var valor;
   var precio;
   console.log("costo",costo)
   
   if(utilidad){
      valor = Number(costo * utilidad/100);
      precio = Number(costo + valor);
   }else{
      precio = costo;
   }
   
   
   $('.Precioventa').val(precio)
   
})

$('.formularioProducto').on('change','input.Utilidad',function(){
   var costo = Number($('.costo').val());
   var utilidad = Number($('.Utilidad').val());
   var valor;
   var precio;
   
   if(utilidad){
      valor = Number(costo * utilidad/100);
      precio = Number(costo + valor);
   }else{
      precio = costo;
   }
   
   
   $('.Precioventa').val(precio)
   
})

$('.formularioProducto').on('change','input.Precioventa',function(){
   var costo = Number($('.costo').val());
   var Precioventa = Number($('.Precioventa').val());
   var valor;
   var utilidad;
   
   if(Precioventa){
      valor = Number(Precioventa - costo);
      utilidad = parseInt(Number((valor/costo)*100));
   }else{
      utilidad = 0;
   }
   
   
   $('.Utilidad').val(utilidad)
   
})


$(".nuevaImagen").change(function(){

	var imagen = this.files[0];
	
	/*=============================================
  	VALIDAMOS EL FORMATO DE LA IMAGEN SEA JPG O PNG
  	=============================================*/

  	if(imagen["type"] != "image/jpeg" && imagen["type"] != "image/png"){

  		$(".nuevaImagen").val("");

  		 swal({
		      title: "Error al subir la imagen",
		      text: "¡La imagen debe estar en formato JPG o PNG!",
		      type: "error",
		      confirmButtonText: "¡Cerrar!"
		    });

  	}else if(imagen["size"] > 2000000){

  		$(".nuevaImagen").val("");

  		 swal({
		      title: "Error al subir la imagen",
		      text: "¡La imagen no debe pesar más de 2MB!",
		      type: "error",
		      confirmButtonText: "¡Cerrar!"
		    });

  	}else{

  		var datosImagen = new FileReader;
  		datosImagen.readAsDataURL(imagen);

  		$(datosImagen).on("load", function(event){

  			var rutaImagen = event.target.result;

  			$(".previsualizar").attr("src", rutaImagen);

  		})

  	}
})

