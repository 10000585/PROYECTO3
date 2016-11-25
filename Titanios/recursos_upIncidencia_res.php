<?php
	include "includes/conexion_bd.php";
	session_start();

	if(!isset($_SESSION['username']) || $_SESSION['categoria'] == 'administrador'){
    	header('location:index.php');
	}


//------- CONSULTA SQL PARA MOSTRAR RECURSOS:

		$sql = "SELECT * FROM tbl_recursos ORDER BY rec_id";

			$recursos = mysqli_query($conexion, $sql);




		extract($_REQUEST);
		$incidencia= $rec_incidencia.".(".$_SESSION['username'].") -- ".$inci;
		
		echo $sql_update_reserva = "UPDATE tbl_recursos SET rec_incidencias = '".$incidencia."' WHERE rec_id = '".$rec_id."'";
		

		$actualizar_reserva = mysqli_query($conexion, $sql_update_reserva);

		 

		header('location: recursos.php?incidencia=true');

?>