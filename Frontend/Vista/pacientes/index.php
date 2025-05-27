<?php
require '../../estructura/header.php';
?>

<script src="../../public/css/pacientes.css"></script>
<link href="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.0.8/css/all.css">

<div class="container-fluid">
    <div class="row">
        <div class="col-1"></div>
        <div class="col-10">
            <div class="text-center">
                <img src="../../public/img/layout_set_logo.png" alt="">
            </div>

            <div class="container">
                <div class="card bg-light">
                    <article class="card-body mx-auto" style="max-width: 400px;">
                        <h4 class="card-title mt-3 text-center">Crear cuenta</h4>
                        <form name="formulario" id="formulario" method="POST">
                        <div class="form-group input-group">
                            <div class="input-group-prepend">
                                <span class="input-group-text"> <i class="fa fa-user"></i> </span>
                            </div>
                            <input name="nombreP" class="form-control" placeholder="Nombres" type="text" required>
                            <input name="apellidoP" class="form-control" placeholder="Apellidos" type="text" required>
                        </div>
                        <div class="form-group input-group">
                            <div class="input-group-prepend">
                                <span class="input-group-text"> <i class="fa fa-user"></i> </span>
                            </div>
                            <select class="form-control" id="tipoDocP" name="tipoDocP" required>
                                <option selected=""> Tipo doc </option>
                                <option value="1">Cedula ciudadania</option>
                                <option value="2">NUIP</option>
                                <option value="3">Cédula de extranjería</option>
                            </select>
                            <input name="numeroDocP" class="form-control" placeholder="Numero" type="text" maxlength="12" required>
                        </div>

                        <label for="">Fecha de nacimiento</label><br>
                        <div class="form-group input-group">
                            <div class="input-group-prepend">
                                <span class="input-group-text"> <i class="fa fa-heart"></i> </span>
                            </div>
                            <input name="fechaNacimiento" class="form-control" placeholder="fecha Nacimiento" type="date" required>
                        </div>
                        <div class="form-group input-group">
                            <div class="input-group-prepend">
                                <span class="input-group-text"> <i class="fa fa-transgender-alt"></i> </span>
                            </div>
                            <select class="form-control" id="genero" name="genero" required>
                                <option selected=""> Genero con el cual se identifica </option>
                                <option value="1">Mujer</option>
                                <option value="2">Hombre</option>
                                <option value="3">Otro</option>
                            </select>
                        </div> 
                        <div class="form-group input-group">
                            <div class="input-group-prepend">
                                <span class="input-group-text"> <i class="fa fa-building"></i> </span>
                            </div>
                            <input name="direccion" class="form-control" placeholder="Direccion vivienda" type="text" required>
                        </div>                                               

                        <div class="form-group input-group">
                            <div class="input-group-prepend">
                                <span class="input-group-text"> <i class="fa fa-envelope"></i> </span>
                            </div>
                            <input name="emailP" class="form-control" placeholder="Correo electronico" type="email" required>
                        </div>
                        <div class="form-group input-group">
                            <div class="input-group-prepend">
                                <span class="input-group-text"> <i class="fa fa-phone"></i> </span>
                            </div>
                            <input name="telefonoP" class="form-control" placeholder="Numero telefonico" type="text" maxlength="11" required>
                        </div>
                        <div class="form-group input-group">
                            <div class="input-group-prepend">
                                <span class="input-group-text"> <i class="fa fa-users"></i> </span>
                            </div>
                            <select class="form-control" id="tipoP" name="tipoP" required>
                                <option selected=""> Tipo de afiliacion </option>
                                <option value="1">Cotizante</option>
                                <option value="2">Beneficiario</option>
                                <option value="3">Independiente</option>
                            </select>
                        </div> <!-- form-group end.// -->
                        <div class="form-group input-group">
                            <div class="input-group-prepend">
                                <span class="input-group-text"> <i class="fa fa-lock"></i> </span>
                            </div>
                            <input class="form-control" placeholder="Crear contraseña" name="password" type="password" required>
                        </div>                                     
                        <div class="form-group">
                            <button type="submit" class="btn btn-primary btn-block" id="btnGuardar"> Crear cuenta  </button>
                        </div>      
                        <p class="text-center">¿Tiene una cuenta? <a href="../../">Iniciar sesión</a> </p>                                                                 
                    </form>
                    </article>
                    </div>
                    </div>
                    <br><br>
        </div>
        <div class="col-1"></div>
    </div>
</div>

<?php
require '../../estructura/footer.php';
?> 
<script type="text/javascript" src="../../public/js/pacientes.js"></script>