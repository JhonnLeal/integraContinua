<?php 
require "../config/Conexion.php";

Class Pacientes
{
	public function __construct(){}

	public function crearPaciente($nombreP,
				$apellidoP,
				$tipoDocP,
				$numeroDocP,
				$fechaNacimiento,
				$genero,
				$direccion,
				$emailP,
				$telefonoP,
				$tipoP, 
				$password){
		$sql="INSERT INTO pacientes (nombreP,
				apellidoP,
				tipoDocP,
				numeroDocP,
				fechaNacimiento,
				genero,
				direccion,
				emailP,
				telefonoP,
				tipoP, 
				password)
		VALUES ('$nombreP',
				'$apellidoP',
				'$tipoDocP',
				'$numeroDocP',
				'$fechaNacimiento',
				'$genero',
				'$direccion',				
				'$emailP',
				'$telefonoP',
				'$tipoP', 
				'$password')";
		return ejecutarConsulta_retornarID($sql);
	}

	public function insertarPermiso($idpaciente){
		$sql = "INSERT INTO usuario_permiso (idpaciente,idpermiso) VALUES ('$idpaciente', 2)";
		return ejecutarConsulta($sql);
	}


	public function crearUsuario($nombre,
				$apellido,
				$tipo_documento,
				$num_documento,
				$fechaNacimiento,
				$genero,
				$direccion,
				$email,
				$telefonoP,
				$idRoll, 
				$clavehash){
		$sql="INSERT INTO pacientes (nombreP,
				apellidoP,
				tipoDocP,
				numeroDocP,
				fechaNacimiento,
				genero,
				direccion,
				emailP,
				telefonoP,
				tipoP, 
				password)
		VALUES ('$nombre',
				'$apellido',
				'$tipo_documento',
				'$num_documento',
				'$fechaNacimiento',
				'$genero',
				'$direccion',				
				'$email',
				'$telefonoP',
				'$idRoll', 
				'$clavehash')";
		return ejecutarConsulta($sql);
	}

	public function desactivar($idPaciente){
		$sql="UPDATE pacientes SET estado = '0' WHERE idPaciente = '$idPaciente'";
		return ejecutarConsulta($sql);
	}

		
}

?>