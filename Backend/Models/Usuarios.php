<?php 
require "../config/Conexion.php";

Class Usuarios
{
	public function __construct(){}

	public function crearUsuario($nombre,
			$apellido,
			$tipo_documento,
			$num_documento,
			$num_TC,
			$email,
			$login, 
			$clave, 
			$idRoll){
		$sql="INSERT INTO usuarios (nombre,
			apellido,
			tipo_documento,
			num_documento,
			num_TC,
			email,
			login, 
			clave, 
			idRoll)
		VALUES ('$nombre',
			'$apellido',
			'$tipo_documento',
			'$num_documento',
			'$num_TC',
			'$email',
			'$login', 
			'$clave', 
			'$idRoll')";
		return ejecutarConsulta($sql);
	}

	public function desactivar($idUsuario){
		$sql="UPDATE usuarios SET estado = '0' WHERE idUsuario = '$idUsuario'";
		return ejecutarConsulta($sql);
	}

		
}

?>