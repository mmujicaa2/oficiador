$(document).ready(function(){



$('#datepicker').datepicker({
 	language: 'es',
 	format: 'dd-mm-yyyy',
 	todayHighlight: true,
    autoclose: true
     });

$("#datepicker2").datepicker({
    format: "yyyy",
    //viewMode: 'years', 
    minViewMode: 2,
    maxViewMode: 2,
    autoclose: true,
});


$("#edatepicker2").datepicker({
    format: "yyyy",
    //viewMode: 'years', 
    minViewMode: 2,
    maxViewMode: 2,
    autoclose: true,
});


$("#edatepicker3").datepicker({
  language: 'es',
  todayBtn: 'linked',
  format: 'dd-mm-yyyy',
  todayHighlight: true,
    autoclose: true
    });





$('.modal').on('hidden.bs.modal', function(){//limpia input  cuando cierra modal
    $(this).find('form')[0].reset();
     location.reload();
});






$('#btneditar2').on('click', function(e) {  //lecambie nmbre para que no se active mientras pruebo
            //e.preventDefault(); 
            var id = $("input#id").val();
            var erit = $("input#erit").val();
            var eanio = $("#edatepicker2").val();
            var eredactor=$("select#eredactor").val();
            var eintegrante1=$("select#eintegrante1").val();
            var eintegrante2=$("select#eintegrante2").val();
            var emateria = $("select#emateria").val();
            var esubmateria = $("select#esubmateria").val();
            var eestado = $("select#eestado").val();
            var einput = $("input#einput").val();
            
            //alertify.success(eestado);


                          $.ajax({                        
                            data: {
                                id:id,
                                erit:erit,
                                eanio:eanio,
                                eredactor:eredactor,
                                eintegrante1:eintegrante1,
                                eintegrante2:eintegrante2,
                                emateria:emateria,
                                esubmateria:esubmateria,
                                eestado:eestado,
                                einput:einput
                            },
                            url:"edsentencia.php",
                            type:"POST",
                            dataType: 'json',
                                 
                            
                            success: function(data)             
                            {
                               alertify.success(data);
                            }

                        });  


    });


$('#btnedtoficioMAL').on('click', function(e) {  //lecambie nmbre para que no se active mientras pruebo
            //e.preventDefault(); 
            var idoficio = $("input#idoficio").val();
            var enoficio2 = $("input#enoficio2").val();
            var eglosa = $("input#eglosa").val();
            var eorigen = $("#eorigen").val();
            var edestino= $("#edestino").val();
            var etipo=$("select#etipo").val();
            var edatepicker3 = $("input#edatepicker3").val();
            var einput = $("input#einput").val();
            
            //alertify.success(eestado);


                          $.ajax({                        
                            data: {
                                idoficio:idoficio,
                                enoficio2:enoficio2,
                                eglosa:eglosa,
                                eorigen:eorigen,
                                edestino:edestino,
                                etipo:etipo,
                                eanio:edatepicker3,
                                einput:einput
                          
                            },
                            url:"edoficio.php",
                            type:"POST",
                            dataType: 'json',
                                 
                            
                            success: function(data)             
                            {
                               alertify.success(data);
                            },
                           error: function(data) { 
                              alertify.success(data);
                            },
                            


                        });  


    });




$('#btningoficio').on('click', function(e) {
  //e.preventDefault();
  
    alertify.alert ('Sistema Oficios','Oficio Agregado');
    
    return true;
  

});


$('#btnedtoficioMALOOO').on('click', function(e) {
  //e.preventDefault();
  
    alertify.alert ('Sistema Oficios','Oficio Editado');
    
    return true;
  

});


  
$('#btnagregar').on('click', function(e) {
  //e.preventDefault();
  if (($('#redactor').val() == $('#integrante1').val()) || ($('#redactor').val() == $('#integrante2').val()) || ($('#integrante1').val() == $('#integrante2').val())  )

  {
    alertify.error ("Debe seleccionar diferentes ministros!");
    return false;
  }


});





});//fin document.ready








//funciones

function limpiainput(){//Limpia inputs del modal de ingreso 
	$("#ffolio :input").each(function(){
		$(this).val('');
	});
}




function oficioEditar(id_folio,n_folio,glosa,origen,destino,tipo,fecha_despacho){

  $('#idoficio').attr('value', id_folio).change();
  $('#enoficio').attr('value', n_folio).change();
  $('#enoficio2').attr('value', n_folio).change();
  $('#eglosa').attr('value', glosa).change();
  $('#eorigen').attr('value', origen).change();
  $('#edestino').attr('value', destino).change();
  //$('select#etipo').attr('value', tipo).change();
  $('#etipo').prop('value', tipo).change();
  $('#edatepicker3').attr('value', fecha_despacho).change();
  //$('#edatepicker3').attr('value', fecha_despacho).change();
  

}
 



