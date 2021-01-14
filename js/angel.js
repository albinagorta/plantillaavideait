


function enviar(cadena,url=''){
  $('input[type="submit"]').attr('disabled',true);
  $('.load').show();
   
  //var envio = $.post('',cadena,function(){},'json');
 $.ajax({
      url: "",
      type: "POST",
      data: cadena,
      contentType: false,
      processData: false,
      cache: false,
      
      success: function(datos)
      {
        $('.spinnerpagina').removeClass('is-active');

        if(datos==1){
          swal({
             type: "success",
              title: "¡Se guardo exitosamente!",
              showConfirmButton: true,
              confirmButtonText: "Cerrar"

            }).then(function(result){

              if(result.value){
                location.reload();              

              }

            }); 

        }else{
          $('input[type="submit"]').attr('disabled',false);
          $('.load').hide();
          swal("!!! ERROR !!!", datos ,"error");
        }

      }

  });

}

//Función para eliminar registros
function eliminardata(cadena)
{
 
  swal({
              title: "¿Eliminar?",
              text: "¿Está Seguro de eliminar?",
              type: "warning",
              showCancelButton: true,
              cancelButtonText: "No",
              confirmButtonText: "Si",
              closeOnConfirm: false,
              closeOnCancel: false,
              showLoaderOnConfirm: true
              }).then(function(result){
               if(result.value){
                $.post("", cadena, function(e){
                  console.log('salida',e);
                  swal('!!! Eliminado !!!','Se Eliminno','success');
                    tabla.ajax.reload();   });         

              }else {
              swal("! Cancelado ¡", "Se Cancelo", "error");
             }
            });
} 

//Función para eliminar registros
function eliminarsubdata(cadena)
{
 
  swal({
              title: "¿Eliminar?",
              text: "¿Está Seguro de eliminar?",
              type: "warning",
              showCancelButton: true,
              cancelButtonText: "No",
              confirmButtonText: "Si",
              closeOnConfirm: false,
              closeOnCancel: false,
              showLoaderOnConfirm: true
              }).then(function(result){
               if(result.value){
                $.post("", cadena, function(e){
                  swal('!!! Eliminado !!!','Se Eliminno','success');
                    location.reload();
                    });         

              }else {
              swal("! Cancelado ¡", "Se Cancelo", "error");
             }
            });
}

//Función para eliminar registros
function estadodata(cadena)
{
 
  swal({
              title: "Estado?",
              text: "¿Está Seguro de cambiar de estado?",
              type: "warning",
              showCancelButton: true,
              cancelButtonText: "No",
              confirmButtonText: "Si",
              closeOnConfirm: false,
              closeOnCancel: false,
              showLoaderOnConfirm: true
              }).then(function(result){
               if(result.value){
                $.post("", cadena, function(e){
                  console.log('salida',e)
                  swal('!!! Estado !!!','Se Cambio','success');
                    tabla.ajax.reload();   });         

              }else {
              swal("! Cancelado ¡", "Se Cancelo", "error");
             }
            });
} 


