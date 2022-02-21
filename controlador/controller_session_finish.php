<!-- ESTO ES PARA QUE NO PUEDA INGRESAR AL PANEL DE ADMIN SIN HABER INICIADO SESIÓN -->
<?php
session_start(); //INICIO LA SESION
session_destroy(); //DESTRUYO LA SESION
header('Location: ../login/index.php'); //REGRESO AL LOGIN
?>