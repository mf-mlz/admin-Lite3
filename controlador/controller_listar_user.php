<!-- CONTROLADOR PARA LISTAR LOS USUARIOS-->
<?php
    require '../modelo/modelo_usuario.php'; //INSTANCIAMOS EL MODELO
    $MU = new Modelo_Usuario(); //Clase del modelo
    $consulta = $MU->listar_usuario(); //llamamos a nuestra funcion listar_usuario del modelo
    if($consulta){ //Si la consulta tiene algo
        //Función PHP nativa que le permite convertir datos PHP al formato JSON.
        //La función toma un objeto PHP ($consulta) y devuelve una cadena JSON
        echo json_encode($consulta); 
    }else{
        //Esto es para que no salga error en consola, por si la consulta viene vacia
        echo '{
		    "sEcho": 1,
		    "iTotalRecords": "0",
		    "iTotalDisplayRecords": "0",
		    "aaData": []
		}';
    }

?>