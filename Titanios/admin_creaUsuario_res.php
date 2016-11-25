<?php
include "includes/conexion_bd.php";

	


		extract($_REQUEST);

		
		echo $sql_crear_Usuario ="INSERT INTO tbl_usuarios (usu_usuario, usu_pwd, usu_categoria, usu_estado) VALUES ( '$usu_usuario', '$usu_pwd', '$usu_categoria', '$usu_estado')";
		//echo $sql_update_reserva;

			

		$crear_usuario = mysqli_query($conexion, $sql_crear_Usuario);
		
		header('location: admin.php?nuevoUsuario=true&creado=ok');
		 

?>