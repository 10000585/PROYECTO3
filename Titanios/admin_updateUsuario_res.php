<?php
include "includes/conexion_bd.php";
		//realizamos la conexión
	// 	$conexion = mysqli_connect('localhost', 'root', '', 'bd_titanio');
	// // Cojo la idea de David para lo acentos para que no 	tengamos problemas con la descripción
	// 	$acentos = mysqli_query($conexion, "SET NAMES 'utf8'");

	// 	if (!$conexion) {
	// 	    echo "Error: No se pudo conectar a MySQL." . PHP_EOL;
	// 	    echo "errno de depuración: " . mysqli_connect_errno() . PHP_EOL;
	// 	    echo "error de depuración: " . mysqli_connect_error() . PHP_EOL;
	// 	    exit;
	// 	}


		extract($_REQUEST);

		

		$sql_update_usuario = "UPDATE tbl_usuarios SET usu_usuario = '".$usu_usuario."' , usu_pwd = '".$usu_pwd."' , usu_categoria = '".$usu_categoria."' , usu_estado = '".$usu_estado."'  WHERE usu_id = ".$usu_id;

			

		$actualizar_usuario = mysqli_query($conexion, $sql_update_usuario);
		
		header('location: admin.php');
		 

?>