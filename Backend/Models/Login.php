<?php 
require "../config/Conexion.php";

Class Login
{

	public function __construct(){}

	public function verificar($login,$clavehash){
    	$sql="SELECT * FROM pacientes WHERE emailP='$login' AND password='$clavehash' AND estado='1'"; 
    	return ejecutarConsulta($sql);  
    }	

	public function listarmarcados($idusuario){
		$sql="SELECT * FROM usuario_permiso WHERE idusuario='$idusuario'";
		return ejecutarConsulta($sql);
	}    	
}

 ?>