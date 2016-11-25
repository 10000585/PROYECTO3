<?php
include "includes/conexion_bd.php";



		extract($_REQUEST);

		
		$sql_update_reserva = "UPDATE tbl_recursos SET rec_nombre = '".$rec_nombre."', rec_descripcion = '".$rec_descripcion."', rec_foto = '".$rec_foto."', rec_estado = '".$rec_estado."', rec_incidencias = '".$rec_incidencias."' WHERE rec_id = '".$rec_id."'";
		

		$actualizar_reserva = mysqli_query($conexion, $sql_update_reserva);
		 
		 $url='location: admin.php?edit_rec=true&truerec_id='.$rec_id.'&rec_nombre='.$rec_nombre.'&rec_descripcion='.$rec_descripcion.'&rec_estado='.$rec_estado.'&rec_foto='.$rec_foto.'&rec_incidencia='.$rec_incidencia;

header($url);

?>