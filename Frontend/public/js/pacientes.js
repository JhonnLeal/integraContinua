var tabla;

function init(){

	$("#formulario").on("submit",function(e){crearPaciente(e);})

}

function limpiar(){
	$("#nombreP").val("");
	$("#apellidoP").val("");
	$("#tipoDocP").val("");
	$("#numeroDocP").val("");
	$("#fechaNacimiento").val("");
	$("#genero").val("");
	$("#direccion").val("");
	$("#emailP").val("");
	$("#telefonoP").val("");
	$("#tipoP").val("");
	$("#password").val();
}

function crearPaciente(e){
	e.preventDefault();
	$("#btnGuardar").prop("disabled",true);
	var formData = new FormData($("#formulario")[0]);

	$.ajax({
		url: "../../controlador/crtPacientes.php?op=crearPaciente",
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