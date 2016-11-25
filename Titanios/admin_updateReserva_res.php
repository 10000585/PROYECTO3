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

		
		$sql_update_reserva ="UPDATE tbl_reservas SET res_finicio = '".$f_finicio."', res_ffin = '".$f_fin."', `res_estado` = '".$res_estado."' WHERE tbl_reservas.res_id =".$res_id;
		//echo $sql_update_reserva;

			

		$actualizar_usuario = mysqli_query($conexion, $sql_update_reserva);
		
		header('location: admin.php');
		 

?>