
	<?php

		// //realizamos la conexión
		// $conexion = mysqli_connect('mysql.hostinger.es', 'u599616374_root', 'xOTf7aKaNv', 'u599616374_titan');

		// //le decimos a la conexión que los datos los devuelva diréctamente en utf8, así no hay que usar htmlentities
		// $acentos = mysqli_query($conexion, "SET NAMES 'utf8'");

		//  if (!$conexion) {
		//      echo "Error: No se pudo conectar a MySQL." . PHP_EOL;
		//      echo "errno de depuración: " . mysqli_connect_errno() . PHP_EOL;
		//      echo "error de depuración: " . mysqli_connect_error() . PHP_EOL;
		//      exit;
		//  }

		 $conexion = mysqli_connect('localhost', 'root', '', 'bd_titanio');

		//le decimos a la conexión que los datos los devuelva diréctamente en utf8, así no hay que usar htmlentities
		$acentos = mysqli_query($conexion, "SET NAMES 'utf8'");

		 if (!$conexion) {
		     echo "Error: No se pudo conectar a MySQL." . PHP_EOL;
		     echo "errno de depuración: " . mysqli_connect_errno() . PHP_EOL;
		     echo "error de depuración: " . mysqli_connect_error() . PHP_EOL;
		     exit;
		 }



?>
