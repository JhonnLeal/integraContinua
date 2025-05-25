<?php 
session_start();
require_once "../Backend/Paciente.php";

$usuarios= new Pacientes();

$nombre 		= isset($_POST["nombre"]) ? limpiarCadena($_POST["nombre"]):"";
$apellido 		= isset($_POST["apellido"]) ? limpiarCadena($_POST["apellido"]):"";
$tipo_documento = isset($_POST["tipo_documento"]) ? limpiarCadena($_POST["tipo_documento"]):"";
$num_documento 	= isset($_POST["num_documento"]) ? limpiarCadena($_POST["num_documento"]):"";
$fechaNacimiento 	= isset($_POST["fechaNacimiento"]) ? limpiarCadena($_POST["fechaNacimiento"]):"";
$genero 		= isset($_POST["genero"]) ? limpiarCadena($_POST["genero"]):"";
$direccion 		= isset($_POST["direccion"]) ? limpiarCadena($_POST["direccion"]):"";
$email 			= isset($_POST["email"]) ? limpiarCadena($_POST["email"]):"";
$telefono 		= isset($_POST["telefono"]) ? limpiarCadena($_POST["telefono"]):"";
$idRoll 		= isset($_POST["idRoll"]) ? limpiarCadena($_POST["idRoll"]):"";
$clave 			= isset($_POST["clave"]) ? limpiarCadena($_POST["clave"]):""; 

switch ($_GET["op"]){
	case 'crearUsuario':
		
		$clavehash=hash("SHA256",$clave);

			$respuesta = $usuarios->crearUsuario(
				$nombre,
				$apellido,
				$tipo_documento,
				$num_documento,
				$fechaNacimiento,
				$genero,
				$direccion,
				$email,
				$telefono,
				$idRoll, 
				$clavehash);
			echo $respuesta ? "Usuario registrada" : "Usuario no se pudo registrar";	
			// localhost/softwarecitasmedicas/controlador/crtUsuarios.php?op=crearPaciente	
		break;

	default:
		// code...
		break;
}

 ?>