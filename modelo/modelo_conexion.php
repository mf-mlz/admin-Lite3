<?php
	class conexion{
		private $servidor;
		private $usuario;
		private $contrasena;
		private $basedatos;
		public $conexion;
		public function __construct(){
		    $this->servidor = "localhost";
			$this->usuario = "root";
			$this->contrasena = "1234";
			$this->basedatos = "samix";
		}
		function conectar(){
			// MySQLi es una extensión mejorada (la i final es de improved) de PHP para acceder a bases de datos MySQL.
			// Toma los parametros que se le asignan a cada variable para poder acceder a la BD (SERVIDOR, USUARIO, CONTRASEÑA Y LA BASE DE DATOS)
			$this->conexion = new mysqli($this->servidor,$this->usuario,$this->contrasena,$this->basedatos);
			// El comando SQL "SET CHARSET utf8" de PHP asegurará que el lado del cliente (PHP) obtendrá los datos en utf8, sin importar cómo estén almacenados en la base de datos.
			$this->conexion->set_charset("utf8");
		}
		// Funcion para cerrar la conexion
		//Es una buena práctica cerrar la conexión para liberar memoria, ya que ayuda a distribuir mejor u optimizar mejor los recursos del servidor.
		function cerrar(){
			$this->conexion->close();	
		}
	}
?> 