<?php
include "includes/conexion_bd.php";
session_start();
if(!isset($_SESSION['username']) || $_SESSION['categoria'] == 'administrador'){
    header('location:index.php');

}

		extract($_REQUEST);

			
			$rec_id;
			$finicio=$fechaIni." ".$horaInicio.":00:00";
			$ffin=$fechaFin." ".$horaFin.":00:00";
			$nom_rec;
			

		$sql_consulta= "SELECT * FROM tbl_reservas WHERE ('".$finicio."' BETWEEN res_finicio AND res_ffin OR '".$ffin."' BETWEEN res_finicio AND res_ffin) AND rec_id =".$rec_id."";

			// SELECT * FROM tbl_reservas WHERE ('2016-11-16 8:00:00' BETWEEN res_finicio AND res_ffin OR '2016-11-18 8:00:00' BETWEEN res_finicio AND res_ffin ) AND rec_id =1 

		$consultar = mysqli_query($conexion, $sql_consulta);

		


		if (mysqli_num_rows($consultar)<1) {

			
			$sql_insert = "INSERT INTO tbl_reservas (usu_id, rec_id, res_finicio, res_ffin) VALUES ($id_usu, $rec_id,'".$finicio."','".$ffin."')";

		 	$reservar = mysqli_query($conexion, $sql_insert);


			header('location: recursos.php?&rec_id='.$rec_id.'&finicio='.$finicio.'&ffin='.$ffin.'&estado='.'reservado'.'&nom_rec='.$nom_rec);
		}else{
			
			header('location: recursos.php?&rec_id='.$rec_id.'&rec_foto='.$rec_id.'&estado='.'ocupado');
		}

?>