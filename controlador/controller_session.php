<?php
//Declaramos nuestras variables, ingresando los valores que vamos a obtener por POST de la BD con los nombres de los campos de las tablas
$ID_USER = $_POST['id_usuario'];
$NOMBRE_USER = $_POST['nombre_usuario'];
$APELLIDOP_USER = $_POST['apellidoP_usuario'];
$APELLIDOM_USER = $_POST['apellidoM_usuario'];
$CORREO_USER = $_POST['correo_usuario'];
$ROL_USER = $_POST['rol_usuario'];

//session_start crea una sesión o reanuda la actual en función de un identificador de sesión pasado a través de una solicitud GET o POST, o pasado a través de una cookie.
//En este caso es por POST
session_start();

//Ahora le pasamos esos datos a las variables de sesión
$_SESSION['S_ID_USER']=$ID_USER;
$_SESSION['S_NOMBRE_USER']=$NOMBRE_USER;
$_SESSION['S_APELLIDOP_USER']=$APELLIDOP_USER;
$_SESSION['S_APELLIDOM_USER']=$APELLIDOM_USER;
$_SESSION['S_CORREO_USER']=$CORREO_USER;
$_SESSION['S_ROL_USER']=$ROL_USER;
?>