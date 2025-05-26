<?php 
//Ip de la pc servidor de base de datos
define("DB_HOST", $_ENV['DB_HOST'] ?? "localhost");

//Nombre de la base de datos
define("DB_NAME", "BD-citasmedicas");

//Usuario de la base de datos
define("DB_USERNAME", "root");

//Contraseña del usuario de la base de datos
define("DB_PASSWORD", $_ENV['DB_PASSWORD'] ?? "");

//definimos la codificación de los caracteres
define("DB_ENCODE","utf8");

//Definimos una constante como nombre del proyecto
define("PRO_NOMBRE","CitasMedicas");
?>
