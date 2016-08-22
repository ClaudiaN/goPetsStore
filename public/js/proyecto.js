function irarriba(){
$('html, body').animate({scrollTop:0}, 300);
}

function cargarformulario(arg){
//funcion que carga todos los formularios del sistema
 
        if(arg==1){ var url = "form_nuevo_usuario"; }
    if(arg==2){ var url = "form_cargar_datos_usuarios";  }
    if(arg==3){ var url = "form_enviar_correo";  }

        $("#contenido_principal").html($("#cargador_empresa").html());   
        $.get(url,function(resul){
      $("#contenido_principal").html(resul);
    })
        

}


$(document).on("submit",".formarchivo",function(e){

    
        e.preventDefault();
        var formu=$(this);
        var nombreform=$(this).attr("id");
        var rs=false; //leccion 10
        var seccion_sel=  $("#seccion_seleccionada").val();
        if(nombreform=="f_subir_imagen" ){ var miurl="subir_imagen_usuario";  var divresul="notificacion_resul_fci";   }
        if(nombreform=="f_cargar_datos_usuarios" ){ var miurl="cargar_datos_usuarios";  var divresul="notificacion_resul_fcdu"; rs=true; }
        if(nombreform=="f_agregar_publicacion" ){ var miurl="agregar_publicacion_usuario";  var divresul="notificacion_resul_fap"; rs=true; }
        if(nombreform=="f_agregar_proyectos" ){ var miurl="agregar_proyectos_usuario";  var divresul="notificacion_resul_fapr"; rs=true; }
         if(nombreform=="f_enviar_correo" ){ var miurl="enviar_correo";  var divresul="contenido_principal";   }

        //información del formulario
        var formData = new FormData($("#"+nombreform+"")[0]);

        //hacemos la petición ajax   
        $.ajax({
            url: miurl,  
            type: 'POST',
     
            // Form data
            //datos del formulario
            data: formData,
            //necesario para subir archivos via ajax
            cache: false,
            contentType: false,
            processData: false,
            //mientras enviamos el archivo
            beforeSend: function(){
              $("#"+divresul+"").html($("#cargador_empresa").html());                
            },
            //una vez finalizado correctamente
            success: function(data){
              $("#"+divresul+"").html(data);
              $("#fotografia_usuario").attr('src', $("#fotografia_usuario").attr('src') + '?' + Math.random() );  

                 if(rs ){
                         $('#'+nombreform+'').trigger("reset");
                         mostrarseccion(seccion_sel);
                        }             
            },
            //si ha ocurrido un error
            error: function(data){
               alert("ha ocurrido un error") ;
                
            }
        });

irarriba();

});

$(document).on("change",".email_archivo",function(e){
   
    var miurl="cargar_archivo_correo";
   // var fileup=$("#file").val();
    var divresul="texto_notificacion";

    var data = new FormData();
    data.append('file', $('#file')[0].files[0] );
 

   
    console.log(data);


  $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('#_token').val()
        }
    });


     $.ajax({
            url: miurl,  
            type: 'POST',
     
            // Form data
            //datos del formulario
            data: data,
            //necesario para subir archivos via ajax
            cache: false,
            contentType: false,
            processData: false,
            //mientras enviamos el archivo
            beforeSend: function(){
              $("#"+divresul+"").html($("#cargador_empresa").html());                
            },
            //una vez finalizado correctamente
            success: function(data){
              var codigo='<div class="mailbox-attachment-info"><a href="#" class="mailbox-attachment-name"><i class="fa fa-paperclip"></i>'+ data +'</a><span class="mailbox-attachment-size"> </span></div>';
              $("#"+divresul+"").html(codigo);
                        
            },
            //si ha ocurrido un error
            error: function(data){
               $("#"+divresul+"").html(data);
                
            }
        });



})
