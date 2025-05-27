var tabla;

function init(){

	$("#formulario").on("submit",function(e){crearUsuario(e);})

}

function limpiar(){
	$("#nombre").val("");
	$("#apellido").val("");
	$("#tipo_documento").val("");
	$("#num_documento").val("");
	$("#fechaNacimiento").val("");
	$("#genero").val("");
	$("#direccion").val("");
	$("#email").val("");
	$("#telefono").val("");
	$("#idRoll").val("");
	$("#clave").val("");
}

console.log("esto es un comentario");

function crearUsuario(e){
	e.preventDefault();
	$("#btnGuardar").prop("disabled",true);
	var formData = new FormData($("#formulario")[0]);

	$.ajax({
		url: "../../controlador/crtUsuarios.php?op=crearUsuario",
	    type: "POST",
	    data: formData,
	    contentType: false,
	    processData: false,

	    success: function(datos){                    
	          alert(datos);	          
	          window.location.reload();
	    }
	});
	limpiar();
}

init();