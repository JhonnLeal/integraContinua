<?php
ob_start();
session_start();
require '../../estructura/header.php';
include '../../estructura/nav.php';
?>

<div class="container-fluid">
    <div class="row col-12">
        <div class="col-1"></div>
        <div class="col-10">

        <div class="container mt-5">
            <h2>Formulario de Registro Interno</h2>
            <div class="panel-body" id="formularioregistros">
                <form name="formulario" id="formulario" method="POST">
                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <label for="nombre">Nombre:</label>
                            <input type="text" class="form-control" id="nombre" name="nombre" required>
                        </div>
                        <div class="form-group col-md-6">
                            <label for="apellido">Apellido:</label>
                            <input type="text" class="form-control" id="apellido" name="apellido" required>
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-group col-md-4">
                        <label for="tipo_documento">Tipo de Documento:</label>
                        <select class="form-control" id="tipo_documento" name="tipo_documento" required>
                            <option value="4">Cédula de Ciudadanía</option>
                            <option value="5">Cédula de extranjería</option>
                        </select>
                        </div>
                        <div class="form-group col-md-4">
                        <label for="num_documento">Número de Documento:</label>
                        <input type="text" class="form-control" id="num_documento" name="num_documento" required>
                        </div>
<!--                         <div class="form-group col-md-4">
                        <label for="num_TC">Número de Tarjeta Profesional:</label>
                        <input type="text" class="form-control" id="num_TC" name="num_TC" required>
                        </div> -->
                        <div class="form-group col-md-4">
                            <label for="">Fecha de nacimiento</label>
                            <input name="fechaNacimiento" class="form-control" placeholder="fecha Nacimiento" type="date" required>
                        </div>  
                    </div>
                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <select class="form-control" id="genero" name="genero" required>
                                <option selected=""> Genero con el cual se identifica </option>
                                <option value="1">Mujer</option>
                                <option value="2">Hombre</option>
                                <option value="3">Otro</option>
                            </select>
                        </div> 
                        <div class="form-group col-md-6">
                            <input name="direccion" class="form-control" placeholder="Direccion vivienda" type="text" required>
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-group col-md-4">
                        <label for="email">Email:</label>
                        <input type="email" class="form-control" id="email" name="email" required>
                        </div>
                        <div class="form-group col-md-4">
                        <label for="telefono">Telefono:</label>
                        <input type="telefono" class="form-control" id="telefono" name="telefono" required>
                        </div>                                        
                        <div class="form-group col-md-4">
                        <label for="idRoll">Rol:</label>
                        <select class="form-control" id="idRoll" name="idRoll" required>
                            <option value="4">Administrador</option>
                            <option value="5">Medico</option>
                            <option value="6">Asistente</option>
                            <!-- Agregar más opciones según sea necesario -->
                        </select>
                        </div>
                    </div>                
                    <div class="form-row">
                        <div class="form-group col-md-6">
                        <label for="clave">Contraseña:</label>
                        <input type="password" class="form-control" id="clave" name="clave" required>
                        </div>
                    </div>    
                    <button class="btn btn-success" onclick="window.history.back()">Volver</button>            
                    <button class="btn btn-primary" type="submit" id="btnGuardar"><i class="fa fa-save"></i> Registrar</button>
                </form>
            </div>
        </div>     
        </div>
        <div class="col-1">
        </div>
    </div>
</div>


<!-- localhost\softwarecitasmedicas\Vista\usuarios\index.php -->
<?php
require '../../estructura/footer.php';
?> 
<script type="text/javascript" src="../../public/js/usuarios.js"></script>