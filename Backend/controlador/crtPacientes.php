<?php 
session_start();
require_once "../Models/Paciente.php";

$pacientes= new Pacientes();

$nombreP 		= isset($_POST["nombreP"]) ? limpiarCadena($_POST["nombreP"]):"";
$apellidoP 		= isset($_POST["apellidoP"]) ? limpiarCadena($_POST["apellidoP"]):"";
$tipoDocP 		= isset($_POST["tipoDocP"]) ? limpiarCadena($_POST["tipoDocP"]):"";
$numeroDocP 	= isset($_POST["numeroDocP"]) ? limpiarCadena($_POST["numeroDocP"]):"";
$fechaNacimiento 	= isset($_POST["fechaNacimiento"]) ? limpiarCadena($_POST["fechaNacimiento"]):"";
$genero 		= isset($_POST["genero"]) ? limpiarCadena($_POST["genero"]):"";
$direccion 		= isset($_POST["direccion"]) ? limpiarCadena($_POST["direccion"]):"";
$emailP 		= isset($_POST["emailP"]) ? limpiarCadena($_POST["emailP"]):"";
$telefonoP 		= isset($_POST["telefonoP"]) ? limpiarCadena($_POST["telefonoP"]):"";
$tipoP 			= isset($_POST["tipoP"]) ? limpiarCadena($_POST["tipoP"]):""; 
$password 		= isset($_POST["password"]) ? limpiarCadena($_POST["password"]):""; 

switch ($_GET["op"]){
	case 'crearPaciente':

		$clavehash=hash("SHA256",$password);
		
			$respuesta = $pacientes->crearPaciente(
				$nombreP,
				$apellidoP,
				$tipoDocP,
				$numeroDocP,
				$fechaNacimiento,
				$genero,
				$direccion,
				$emailP,
				$telefonoP,
				$tipoP, 
				$clavehash);

			echo $respuesta ? "Usuario registrado" : "Usuario no se pudo registrar";

			// localhost/softwarecitasmedicas/controlador/crtUsuarios.php?op=crearPaciente	
		break;

	// case 'insertarPermiso':
	// 	$respuesta = $pacientes->insertarPermiso($idpaciente);
	// 	echo $rspta;		
	// 	break;		

	default:
		// code...
		break;
}

 ?>
