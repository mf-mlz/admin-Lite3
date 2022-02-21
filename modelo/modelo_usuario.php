<?php
    class Modelo_Usuario{
        private $conexion;
        function __construct(){
            //La sentencia require_once es idéntica a require excepto que PHP verificará si el archivo ya ha sido incluido y si es así, no se incluye.
            require_once 'modelo_conexion.php';
            //  Utilizamos la función de Conectar que se encuentra en modelo_conexion.php
            $this->conexion = new conexion();
            $this->conexion->conectar();
        }
        
        // Esta función hace referencia a la que se encuentra en Login.js Linea 1
        // Esta función tomará 2 parámetros (Usuario y Contraseña)
        function Login($usuario,$contra){
            //En la variable "$sql" llamamos al procedimiento almacenado y le pasaremos el parametro que se encuentre almacenado en usuario
            $sql = "call LOGIN_USER('$usuario')";
            //Creamos un arreglo
			$arreglo = array();
            // En Consulta utilizamos la conexión para poder ejecutar el Procedimiento Almacenado
			if ($consulta = $this->conexion->conexion->query($sql)) {
                //mysqli_fetch_array guarda la  información en los índices numéricos del array resultante
                //Guarda la información  en índices asociativos, utilizando los nombres de los campos del resultado como claves, para poder almacenarlo en un arreglo
                // En este caso los de $consulta
				while ($consulta_VU = mysqli_fetch_array($consulta)) {
                    // password_verify Comprueba que el hash dado coincide con la contraseña dada
                    // en esta función se ingresan 2 parametros, la contraseña que se ingresa y la que se tiene guardada en la BD
                    // Recordemos que el hash es la contraseña encriptada
                    // Ahora bien, lo que va a realizar esto es comparar que la contraseña ingresada sea igual a la que se tiene en la BD que está encriptada
					if(password_verify($contra, $consulta_VU["password_usuario"]))
                    {
                        //Si es así y la contraseña está OK, guarda los datos en el arreglo
                        $arreglo[] = $consulta_VU;
                    }
				}
                //Retornamos el arreglo
				return $arreglo;
                //Usamos la funcion de modelo_conexion cerrar()
                //Es una buena práctica cerrar la conexión para liberar memoria, ya que ayuda a distribuir mejor u optimizar mejor los recursos del servidor.
				$this->conexion->cerrar();
			}
        }

    }
?>