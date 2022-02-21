<?php
    //Aqui utilizaremos el modelo del usuario para el Login
    require '../modelo/modelo_usuario.php';

    //En la variable MU utilizaremos la clase Modelo_Usuario
    $MU = new Modelo_Usuario();
    //htmlspecialcharts convierte algunos caracteres predefinidos en entidades HTML, en este caso son los que,
    //Por medio de método POST tenemos en data en "login.js"
    $usuario = htmlspecialchars($_POST['user'],ENT_QUOTES,'UTF-8');
    $contra = htmlspecialchars($_POST['pass'],ENT_QUOTES,'UTF-8');

    //Aqui utilizamos la funcion Login de Modelo_Usuario, donde pasamos los 2 parametros de esta y lo guardamos en $consulta
    $consulta = $MU->Login($usuario,$contra);
    
    //guardamos los valores en JSON en la variable data
    $data = json_encode($consulta);
    if(count($consulta)>0){ //Si tiene datos la consulta osea es mayor a 0
        echo $data; //Returna la data (JSON)
    }else{
        echo 0; //Retorna 0
    }

?>