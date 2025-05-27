<?php 
ob_start();
session_start();
// print_r($_SESSION);

if (!isset($_SESSION["nombre"])){
	header("Location: ../login.html");
}else{
	require '../../estructura/header.php';
	include '../../estructura/nav.php';


	if ($_SESSION['escritorio']==1){
		?>
		
		<div class="container">
			<div class="row mt-3">
				<div class="col-4"></div>
				<div class="col-4">
					<div class="card" style="width: 18rem;">
					  <img src="../../public/img/Screenshot_1.png" class="card-img-top" alt="...">
					  <div class="card-body">
					  	<span class="badge badge-success"><?php echo "Hola " . $_SESSION['nombre'] . ' ' . $_SESSION['apellido']; ?></span>
					    <h5 class="card-title">Escritorio admin</h5>
					    <p class="card-text">Aqui tiene acceso a los servicios administrativos del hospital.</p>
					    <a href="../admin/" class="btn btn-primary">Ingresar</a>
					  </div>
					</div>					
				</div>
				<div class="col-4"></div>
			</div>
		</div>		
		<?php
	}
	?>

	<?php 
	if ($_SESSION['citas']==1){
		?>
		<div class="container">
			<div class="row mt-3">
				<div class="col-lg-6 col-md-6 col-sm-12">
					<div class="card" style="width: 18rem;">
					  <img src="../../public/img/Screenshot_2.png" class="card-img-top" alt="...">
					  <div class="card-body">
					  	<span class="badge badge-success"><?php echo "Hola " . $_SESSION['nombre'] . ' ' . $_SESSION['apellido']; ?></span>
					    <h5 class="card-title">Escritorio pacientes</h5>
					    <p class="card-text">Aqui tiene acceso a los servicios del hospital.</p>
					    <a href="../citasMedicas/" class="btn btn-primary">Ingresar</a>
					  </div>
					</div>					
				</div>
				<div class="col-lg-6 col-md-6 col-sm-12">
					<div class="card" style="width: 18rem;">
					  <img src="../../public/img/HCcitamedica.png" class="card-img-top" alt="...">
					  <div class="card-body">
					    <h5 class="card-title">Historias Clinicas</h5>
					    <p class="card-text">Aqui tiene acceso a sus historias clinicas.</p>
					    <hr>
					    <hr>
					    <hr>
					    <a href="../historiaClinicaIndividual/" class="btn btn-primary">Ingresar</a>
					  </div>
					</div>					
				</div>				
				<div class="col-1"></div>
			</div>
		</div>				
		<?php 
	}
	?>
	<?php 
	if ($_SESSION['consultas']==1){
		?>
		<div class="container">
			<div class="row mt-3">
				<div class="col-4"></div>
				<div class="col-4">
					<div class="card" style="width: 18rem;">
					  <img src="../../public/img/Screenshot_2.png" class="card-img-top" alt="...">
					  <div class="card-body">
					  	<span class="badge badge-success"><?php echo "Hola " . $_SESSION['nombre'] . ' ' . $_SESSION['apellido']; ?></span>
					    <h5 class="card-title">Escritorio medicos</h5>
					    <p class="card-text">Aqui tiene acceso para revisar su agenda de consultas.</p>
					    <a href="../citasMedicas/" class="btn btn-primary">Ingresar</a>
					  </div>
					</div>					
				</div>
				<div class="col-4"></div>
			</div>
		</div>	
		<?php 
	}
	require '../../estructura/footer.php';
	?>
	<?php 
	if ($_SESSION['historiaClinica']==1){
		?>
		<div class="container">
			<div class="row mt-3">
				<div class="col-4"></div>
				<div class="col-4">
					<div class="card" style="width: 18rem;">
					  <img src="../../public/img/Screenshot_2.png" class="card-img-top" alt="...">
					  <div class="card-body">
					  	<span class="badge badge-success"><?php echo "Hola " . $_SESSION['nombre'] . ' ' . $_SESSION['apellido']; ?></span>
					    <h5 class="card-title">Escritorio medico</h5>
					    <p class="card-text">Aqui tiene acceso para crear HC.</p>
					    <a href="../historiaClinica/" class="btn btn-primary">Ingresar</a>
					  </div>
					</div>					
				</div>
				<div class="col-4"></div>
			</div>
		</div>	
		<?php 
	}
	?>	

	<?php
}
ob_end_flush();
?>

