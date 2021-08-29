$(document).ready(function(){
    $('#modalEditarCategoria');
 
    $.ajax({
        url:'ajax/ajaxCategoria.php',
        dataType:'json',
        method:'get',
		 contentType: '1',
        success: function( data){
           
            console.log(data);
        },
        error: function( ){
            console.log( );
        }
    })
 
})