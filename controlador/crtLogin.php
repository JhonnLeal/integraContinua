<?php 
session_start(); 

require_once "../Backend/Login.php";

$registro=new Login();

$idpaciente=isset($_POST["idpaciente"])? limpiarCadena($_POST["idpaciente"]):"";
$login=isset($_POST["emailP"])? limpiarCadena($_POST["emailP"]):"";
$clave=isset($_POST["clave"])? limpiarCadena($_POST["clave"]):"";

switch($_GET["op"]){

	case 'verificar':
	// var_dump($_POST);
	$login = $_POST['logina'];
	$clave = $_POST['clavea'];

	$clavehash=hash("SHA256",$clave);

	$rspta=$registro->verificar($login, $clavehash);
	// localhost/softwarecitasmedicas/controlador/crtLogin.php?op=verificar
	$fetch=$rspta->fetch_object();

		if (isset($fetch)){
			$_SESSION['idpaciente']=$fetch->idpaciente;
			$_SESSION['nombre']=$fetch->nombreP;
			$_SESSION['apellido']=$fetch->apellidoP;
			$_SESSION['emailP']=$fetch->emailP;

			$marcados = $registro->listarmarcados($fetch->idpaciente);
			$valores=array();

			while ($per = $marcados->fetch_object()){
					array_push($valores, $per->idpermiso);
				}
			in_array(1,$valores)?$_SESSION['escritorio']=1:$_SESSION['escritorio']=0;					
			in_array(2,$valores)?$_SESSION['citas']=1:$_SESSION['citas']=0;					
			in_array(3,$valores)?$_SESSION['consultas']=1:$_SESSION['consultas']=0;					
			in_array(4,$valores)?$_SESSION['historiaClinica']=1:$_SESSION['historiaClinica']=0;					
		}	

	echo json_encode($fetch);
	break;

	case 'permisos':
		require_once "../Backend/Permiso.php";
		$permiso = new Permiso();
		$rspta = $permiso->listar();

		$id=$_GET['id'];
		$marcados = $login->listarmarcados($id);
		$valores=array();

		while ($per = $marcados->fetch_object()){
				array_push($valores, $per->idpermiso);
			}

		while ($reg = $rspta->fetch_object()){
					$sw=in_array($reg->idpermiso,$valores)?'checked':'';
					echo '<li> <input type="checkbox" '.$sw.'  name="permiso[]" value="'.$reg->idpermiso.'">'.$reg->nombre.'</li>';
				}
	// localhost/softwarecitasmedicas/controlador/crtLogin.php?op=permisos
	break;	
}


?>