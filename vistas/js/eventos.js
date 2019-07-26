/*=============================================
SUBIENDO LA FOTO DEL USUARIO
=============================================*/
$(".nuevaFoto").change(function(){

	var imagen = this.files[0];
	
	/*=============================================
  	VALIDAMOS EL FORMATO DE LA IMAGEN SEA JPG O PNG
  	=============================================*/

  	if(imagen["type"] != "image/jpeg" && imagen["type"] != "image/png"){

  		$(".nuevaFoto").val("");

  		 swal({
		      title: "Error al subir la imagen",
		      text: "¡La imagen debe estar en formato JPG o PNG!",
		      type: "error",
		      confirmButtonText: "¡Cerrar!"
		    });

  	}else if(imagen["size"] > 2000000){

  		$(".nuevaFoto").val("");

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

/*=============================================
EDITAR EVENTO
=============================================*/
$(".tablas").on("click", ".btnEditarEvento", function(){

	var idEvento = $(this).attr("idEvento");
	
	var datos = new FormData();
	datos.append("idEvento", idEvento);

	$.ajax({

		url:"ajax/eventos.ajax.php",
		method: "POST",
		data: datos,
		cache: false,
		contentType: false,
		processData: false,
		dataType: "json",
		success: function(respuesta){
			
			$("#editarNombre").val(respuesta["evento"]);
			$("#editarDireccion").val(respuesta["direccion"]);
			$("#editarFecha").html(respuesta["fecha"]);
			$("#editarFecha").val(respuesta["fecha"]);
			$("#fotoActual").val(respuesta["foto"]);

			if(respuesta["foto"] != ""){

				$(".previsualizar").attr("src", respuesta["foto"]);

			}

		}

	});

})

/*=============================================
ACTIVAR USUARIO
=============================================*/
$(".tablas").on("click", ".btnActivar", function(){

	var idUsuario = $(this).attr("idEvento");
	var estadoUsuario = $(this).attr("estadoEvento");

	var datos = new FormData();
 	datos.append("activarId", idEvento);
  	datos.append("activarEvento", estadoEvento);

  	$.ajax({

	  url:"ajax/eventos.ajax.php",
	  method: "POST",
	  data: datos,
	  cache: false,
      contentType: false,
      processData: false,
      success: function(respuesta){

      }

  	})

  	if(estadoEvento == 0){

  		$(this).removeClass('btn-success');
  		$(this).addClass('btn-danger');
  		$(this).html('Desactivado');
  		$(this).attr('estadoEvento',1);

  	}else{

  		$(this).addClass('btn-success');
  		$(this).removeClass('btn-danger');
  		$(this).html('Activado');
  		$(this).attr('estadoEvento',0);

  	}

})

/*=============================================
REVISAR SI EL USUARIO YA ESTÁ REGISTRADO
=============================================*/

$("#nuevoEvento").change(function(){

	$(".alert").remove();

	var evento = $(this).val();

	var datos = new FormData();
	datos.append("validarEvento", evento);

	 $.ajax({
	    url:"ajax/eventos.ajax.php",
	    method:"POST",
	    data: datos,
	    cache: false,
	    contentType: false,
	    processData: false,
	    dataType: "json",
	    success:function(respuesta){
	    	
	    	if(respuesta){

	    		$("#nuevoEvento").parent().after('<div class="alert alert-warning">Este evento ya existe en la base de datos</div>');

	    		$("#nuevoEvento").val("");

	    	}

	    }

	})
})

/*=============================================
ELIMINAR EVENTO
=============================================*/
$(".tablas").on("click", ".btnEliminarEvento", function(){

  var idEvento = $(this).attr("idEvento");
  var fotoEvento = $(this).attr("fotoEvento");
  var evento = $(this).attr("evento");

  swal({
    title: '¿Está seguro de borrar el usuario?',
    text: "¡Si no lo está puede cancelar la accíón!",
    type: 'warning',
    showCancelButton: true,
    confirmButtonColor: '#3085d6',
      cancelButtonColor: '#d33',
      cancelButtonText: 'Cancelar',
      confirmButtonText: 'Si, borrar usuario!'
  }).then(function(result){

    if(result.value){

      window.location = "index.php?ruta=eventos&idEvento="+idEvento+"&evento="+evento+"&fotoEvento="+fotoEvento;

    }

  })

})
