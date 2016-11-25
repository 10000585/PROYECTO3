<?php
include "includes/conexion_bd.php";
session_start();

	if(!isset($_SESSION['username']) || $_SESSION['categoria'] == 'profesor'){
			header('location:index.php');
	}

?>

<!DOCTYPE html>
<html lang="es">
	<head>
	  	<meta charset="UTF-8">
	  	<title>Titanium Admin</title>
	  	<link rel="stylesheet" href="css/style.css">

	  	<script type="text/javascript">

			function editUsuario(id, nombre, passwd, categoria, estado){
					window.location = 'admin.php?usu_id='+id+'&usu_usuario='+nombre+'&usu_pwd='+passwd+'&usu_categoria='+categoria+'&usu_estado='+estado;
			};

			function listar_esta(rec_id, nombre, descripcion){
					window.location = 'admin.php?listRes=true&rec_id='+rec_id+'&rec_nombre='+nombre+'&rec_descripcion='+descripcion;
			};
			function editReserva(res_id, usu_nombre,rec_nombre,rec_descripcion,finicio,ffin,estado){
					window.location = 'admin.php?res_id='+res_id+'&usu_nombre='+usu_nombre+'&rec_nombre='+rec_nombre+'&rec_descripcion='+rec_descripcion+'&f_inicio='+finicio+'&f_fin='+ffin+'&rec_estado='+estado;
			};
			function editRecurso(id,nombre,descripcion,foto,incidencia,estado){
					window.location ='admin.php?edit_rec=&rec_id='+id+'&rec_nombre='+nombre+'&rec_descripcion='+descripcion+'&rec_foto='+foto+'&rec_incidencia='+incidencia+'&rec_estado='+estado;
			};
			function cerrar(){
					window.location ='admin.php';
			};
			function nuevoUsuario(){
				window.location ='admin.php?nuevoUsuario=true';
			}
		</script>    

	  
	</head>

	<body>
		<div class="encabezado">
				<div class="enc_1">
				<img src="img/logo1.png">
				</div>
				<div class="enc_2">
	                <h1> <font face="Helvetica" COLOR="#0079BA">Administrar Recursos</font></h1>
	            </div>
	            <div class="enc_3">
	                <font face="Helvetica" COLOR="#0079BA"><span ria-hidden="true"><H4>USUARIO: <?php echo $_SESSION['username'];?></H4> </span></font>
	            </div>
	            <div class="enc_4">
	           		<a href="includes/cerrar.php"><img src="img/exit.jpg"></a> 
	            </div>
	    </div>
<!-- ////////////////////////////////////////////////////////////////////////////////////// -->

<?php
	if(isset($_REQUEST['edit_rec'])){
?>
<div class="estadistica">
			<div class="encabCaja">
				<div style="width: 95%; float:left;">
					<font face="Helvetica" COLOR="white"><h3>Actualizar Recurso:</h3></font>
				</div>
				<div style="width: 5%;float:left; margin-top: 10px;">
 					<button style="margin-left: 40%; background-color: white;" onclick="cerrar();">X</button>
 				</div>
					

			</div>
			<form action="recursos_update_res.php" method="get" accept-charset="utf-8">
			<div class="imgUsuario">
				<div class="encabCaja">
					<h3> <font face="Helvetica" COLOR="white">Incidencias:</font></h3>

				</div>
				<div class="formGroup" style="width: 90%;">
					<textarea cols="25" name="rec_incidencia" rows="6" placeholder="Añadir incidencia"> <?php echo $_REQUEST['rec_incidencia'];?> 
					</textarea>
				</div>
				<div class="formGroup" style="width: 90%; margin-top: 50px;">
				ESTADO:
				<br/>
					<?php
		if($_REQUEST['rec_estado']=='activo'){
?>		
						<input type="radio" name="rec_estado" value="activo" checked> Activo
						<input type="radio" name="rec_estado" value="inactivo"> Inactivo
<?php
		}else{
?>
						<input type="radio" name="rec_estado" value="activo"> Activo
						<input type="radio" name="rec_estado" value="inactivo" checked> Inactivo

<?php
		}
?>	
				</div>
			</div>
			<div class="editUsuario">
				<div class="encabCaja">
					<h3> <font face="Helvetica" COLOR="white">Datos del Recurso:</font></h3>
				</div>
	
				
					<div class="formGroup " style="width: 40%;">
						NOMBRE:
						<input type="text" name="rec_nombre" value="<?php echo $_REQUEST['rec_nombre'];?>">
					</div>
					<div class="formGroup" style="width: 40%;">
						FOTO: 
						<input type="text" name="rec_foto" value="<?php echo $_REQUEST['rec_foto'];?>">
					</div>
     				<div class="formGroup" style="width: 17%;">
     				DESCRIPCIÓN:
     				</div>
     				<div class="formGroup" style="width: 69%;">
     					<textarea cols="60" name="rec_descripcion" rows="4"><?php echo $_REQUEST['rec_descripcion'];?></textarea>
     				</div>
					<div class="oculto">
<?php			
	if($_REQUEST['edit_rec']=='true'){
?>
						<font face="Helvetica" COLOR="green">Actualización correcta.</font>
<?php			
	}
						
?>						
					</div>
					<input type="hidden" name="rec_id" value="<?php echo $_REQUEST['rec_id'];?>">
					<div class="boton" style="padding-left: 10%; padding-right: 10%; margin-top: 110px;">
						<input type="submit" class="log-btn" name="submit">
  				</div>
				</form>
			</div>
	</div>





<!-- ////////////////////////////////////////////////////////////////////////////////////// -->

<?php
}
	if(isset($_REQUEST['nuevoUsuario'])){
?>


<div class="estadistica">
			<div class="encabCaja">

				<div style="width: 95%; float:left;">
					<font face="Helvetica" COLOR="white"><h3>Nuevo Usuario:</h3></font>
				</div>
				<div style="width: 5%;float:left; margin-top: 10px;">
 					<button style="margin-left: 40%; background-color: white;" onclick="cerrar();">X</button>
 				</div>
			</div>
			<div class="imgUsuario" style="background: url('img/imgUser.png') no-repeat;">
			</div>

			<div class="editUsuario">
				<div class="encabCaja">
					<h3> <font face="Helvetica" COLOR="white">Formulario de Registro de Usuario:</font></h3>
				</div>
			<form action="admin_creaUsuario_res.php" method="get" accept-charset="utf-8">
					<div class="formGroup ">
						USUARIO:
						<input type="text" name="usu_usuario" value="">
						<i class="fa fa-user"></i>
					</div>
					<div class="formGroup">
						CONTRASEÑA: 
						<input type="text" name="usu_pwd" value="">
					</div>
					<div class="formGroup">
						CATEGORÍA:
						<br/>
						<div class="form-group" style="padding-left: 30px;">
	
							<input type="radio" name="usu_categoria" value="administrador" checked> Administrador
							<input type="radio" name="usu_categoria" value="profesor"> Profesor


						</div>
					</div>
					<div class="formGroup">
						ESTADO:	
						<br/>
						<div class="form-group" style="padding-left: 30px;">
	
						<input type="radio" name="usu_estado" value="activo" checked> Activo
						<input type="radio" name="usu_estado" value="inactivo"> Inactivo	
		
  						</div>
  					</div>
					<div id="oc" class="oculto" style="width: 100%; height: 40px; float: left; text-align: center;">
<?php			
	if($_REQUEST['creado']=='ok'){
?>
						<font face="Helvetica" COLOR="green">Usuario Creado correctamente</font>
<?php			
		}
?>						
					</div>
				<div class="boton" style="padding-left: 10%; padding-right: 10%;">
						<input type="submit" class="log-btn" name="submit">
  				</div>
  			</form>
			</div>
			
</div>


<?php
}


	if(isset($_REQUEST['usu_id'])){
?>

 				
<div class="estadistica">
			<div class="encabCaja">

				<div style="width: 95%; float:left;">
					<font face="Helvetica" COLOR="white"><h3>Actualizar Usuario:</h3></font>
				</div>
				<div style="width: 5%;float:left; margin-top: 10px;">
 					<button style="margin-left: 40%; background-color: white;" onclick="cerrar();">X</button>
 				</div>
			</div>
			<div class="imgUsuario" style="background: url('img/imgUser.png') no-repeat;">
			</div>

			<div class="editUsuario">
				<div class="encabCaja">
					<h3> <font face="Helvetica" COLOR="white">Formulario de Actualización de Usuario:</font></h3>
				</div>
				<form action="admin_updateUsuario_res.php" method="get" accept-charset="utf-8">
					<div class="formGroup ">
						USUARIO:
						<input type="text" name="usu_usuario" value="<?php echo $_REQUEST['usu_usuario'];?>">
						<i class="fa fa-user"></i>
					</div>
					<div class="formGroup">
						CONTRASEÑA: 
						<input type="text" name="usu_pwd" value="<?php echo $_REQUEST['usu_pwd'];?>">
					</div>
					<div class="formGroup">
						CATEGORÍA:
						<br/>
						<div class="form-group" style="padding-left: 30px;">
<?php
		if($_REQUEST['usu_categoria']=='administrador'){
?>		
						<input type="radio" name="usu_categoria" value="administrador" checked> Administrador
						<input type="radio" name="usu_categoria" value="profesor"> Profesor
<?php
		}else{
?>
						<input type="radio" name="usu_categoria" value="administrador"> Administrador
						<input type="radio" name="usu_categoria" value="profesor" checked> Profesor

<?php
		}
?>	
						</div>
					</div>
					<div class="formGroup">
						ESTADO:	
						<br/>
						<div class="form-group" style="padding-left: 30px;">
<?php
		if($_REQUEST['usu_estado']=='activo'){
?>		
						<input type="radio" name="usu_estado" value="activo" checked> Activo
						<input type="radio" name="usu_estado" value="inactivo"> Inactivo	
<?php
		}else{
?>
						<input type="radio" name="usu_estado" value="activo"> Activo 
						<input type="radio" name="usu_estado" value="inactivo" checked> Inactivo

<?php
		}
?>					
  						</div>
  					</div>
  					<input type="hidden" name="usu_id" value="<?php echo $_REQUEST['usu_id'];?>">
				<div class="resultadoUpdate">

				</div>
				<div class="boton" style="padding-left: 10%; padding-right: 10%;">
						<input type="submit" class="log-btn" name="submit">
  				</div>
  			</form>
			</div>
			
</div>


<?php
}
	if(isset($_REQUEST['res_id'])){
?>

				
<div class="estadistica">
			<div class="encabCaja">
				<div style="width: 95%; float:left;">
					<font face="Helvetica" COLOR="white"><h3>Editar Reserva:</h3></font>
				</div>
				<div style="width: 5%;float:left; margin-top: 10px;">
 					<button style="margin-left: 40%; background-color: white;" onclick="cerrar();">X</button>
 				</div>
			</div>
			<div class="imgUsuario">
				<div class="formReser">
					<h4><font face="Helvetica" COLOR="#0079BA">RECURSO: </font><?php echo $_REQUEST['rec_nombre'];?></h4> 
				</div>
				<div class="formReser">
					<h4><font face="Helvetica" COLOR="#0079BA">DESCRIPCIÓN: </font><?php echo $_REQUEST['rec_descripcion'];?></h4>					 
				</div>
				<div class="formReser">
					<h4><font face="Helvetica" COLOR="#0079BA">USUARIO: </font><?php echo $_REQUEST['usu_nombre'];?></h4>
				</div>


				
			</div>

			<div class="editUsuario">
				<div class="encabCaja">
					<h3> <font face="Helvetica" COLOR="white">Formulario de Actualización de Reserva:</font></h3>
				</div>
				<form action="admin_updateReserva_res.php" method="get" accept-charset="utf-8">
					<div class="formGroup ">
						FECHA INCIO:
						<input type="text" name="f_finicio" value="<?php echo $_REQUEST['f_inicio'];?>">
					</div>
					<div class="formGroup">
						FECHA FIN: 
						<input type="text" name="f_fin" value="<?php echo $_REQUEST['f_fin'];?>">
					</div>
					
					<div class="formGroup">
						ESTADO:	
						<br/>
						<div class="form-group" style="padding-left: 30px;">
<?php
		if($_REQUEST['rec_estado']=='Visible'){
?>		
						<input type="radio" name="res_estado" value="Visible" checked> Visible
						<input type="radio" name="res_estado" value="Oculta"> Oculta	
<?php
		}else{
?>
						<input type="radio" name="res_estado" value="Visible"> Visible 
						<input type="radio" name="res_estado" value="Oculta" checked> Oculta

<?php
		}
?>					
  						</div>
  					</div>
  					<input type="hidden" name="res_id" value="<?php echo $_REQUEST['res_id'];?>">
				<div class="resultadoUpdate" style="height: 20px; width: 100%">

				</div>
				<div class="boton" style="padding-left: 10%; padding-right: 10%;">
						<input type="submit" class="log-btn" name="submit">
  				</div>
  			</form>
			</div>
			
</div>

<?php
	}

		if (isset($_REQUEST['listRes'])){

			extract($_REQUEST);

			$sql = "SELECT DISTINCT tbl_usuarios.usu_usuario, tbl_reservas.res_id, tbl_reservas.res_finicio, tbl_reservas.res_ffin, tbl_reservas.res_estado FROM tbl_reservas, tbl_usuarios where tbl_reservas.rec_id =$rec_id AND tbl_reservas.usu_id = tbl_usuarios.usu_id GROUP BY tbl_reservas.res_id";

			$recursos = mysqli_query($conexion, $sql);
		
?>
 		<div class="estadistica">
 			<div class="encabCaja">
 				<div style="width: 95%; float:left;">
 					<font face="Helvetica" COLOR="white"><h3>RESERVAS: <?php echo $rec_nombre." - ".$rec_descripcion;?></h3></font>
 				</div>
 				<div style="width: 5%;float:left; margin-top: 10px;">
 					<button style="margin-left: 40%; background-color: white;" onclick="cerrar();">X</button>
 				</div>
					

			</div>

			<table style="margin-top: 20px;">
				<tr>
					<th>Usuario</th>
					<th>Fecha inicio</th>
					<th>Fecha fin</th>
					<th>Estado</th>
					<th></th>
				</tr>
<?php	
	
?>		
				
<?php

			while ($recurso = mysqli_fetch_array($recursos)) {
?>
				<tr>
					<td><?php echo $recurso['usu_usuario'];?></td>
					<td><?php echo $recurso['res_finicio'];?></td>
					<td><?php echo $recurso['res_ffin'];?></td>
					<td><?php echo $recurso['res_estado'];?></td>
					<td><button type='button' class='log-btn' name='submit'  onclick="editReserva('<?php echo $recurso['res_id'];?>','<?php echo $recurso['usu_usuario'];?>','<?php echo $rec_nombre;?>','<?php echo $rec_descripcion;?>','<?php echo $recurso['res_finicio'];?>','<?php echo $recurso['res_ffin'];?>','<?php echo $recurso['res_estado'];?>')" >EDITAR</button></td>
				</tr>
<?php				
			}

?>
			</table>
		</div>
<?php
 }


		
		$sqlUsuarios = "SELECT * FROM tbl_usuarios ORDER BY usu_usuario";

				$lisUsuarios = mysqli_query($conexion, $sqlUsuarios);

?>	
	    <div class="estadistica">

	    	<div class="encabCaja">
					<font face="Helvetica" COLOR="white"><h3>USUARIOS:</h3></font>
			</div>
			<div style="margin-top: 20px; width: 90%; margin-left: 4%;">
				<button type='button' class='log-btn' name='submit'  onclick="nuevoUsuario()" >NUEVO USUARIO</button>
			</div>
			
			<table style="margin-top: 20px;">
				<tr>
					<th>Usuario</th>
					<th>Categoría</th>
					<th>Password</th>
					<th>Estado</th>
					<th></th>
				</tr>
<?php
	while ($sqlUsuario = mysqli_fetch_array($lisUsuarios)) {
	
?>
				<tr>	
					<td><?php echo $sqlUsuario['usu_usuario'];?></td>
					<td><?php echo $sqlUsuario['usu_categoria'];?></td>
					<td><?php echo $sqlUsuario['usu_pwd'];?></td>
					<td><?php echo $sqlUsuario['usu_estado'];?></td>
					<td><button type='button' class='log-btn' name='submit'  onclick="editUsuario('<?php echo $sqlUsuario["usu_id"];?>','<?php echo $sqlUsuario["usu_usuario"];?>','<?php echo $sqlUsuario["usu_pwd"];?>','<?php echo $sqlUsuario["usu_categoria"];?>','<?php echo $sqlUsuario["usu_estado"];?>')" >EDITAR</button></td>
				</tr>
<?php
	}
?>	
			</table>
		</div>

<?php
	
		$sql_recursos = "SELECT * FROM tbl_recursos ORDER BY rec_id";
		 
				$recursos = mysqli_query($conexion, $sql_recursos);
				
?>

  
	    <div class="estadistica">
	    	<div class="encabCaja">
					<font face="Helvetica" COLOR="white"><h3>RECURSOS:</h3></font>
			</div>
			<br/>
 	
<?php


		if (mysqli_num_rows($recursos)>0) {
			
			while ($recurso = mysqli_fetch_array($recursos)) {
				$rec_id = $recurso['rec_id'];
				$rec_nombre = $recurso['rec_nombre'];
				$rec_descripcion = $recurso['rec_descripcion'];
				$rec_foto = $recurso['rec_foto'];
				$rec_incidencia = $recurso['rec_incidencias'];
				$rec_estado = $recurso['rec_estado'];
?>
			<div class="espaciosindiv" style="height: 175px">
				<div class='titulo1'><?php echo $rec_nombre;?></div>
				<div class='descripcion'><?php echo $rec_descripcion;?></div>
				<div class="boton" style="padding-left: 5px; padding-right: 5px;">
					<button type="button" class="log-btn" name="submit"  onclick="listar_esta('<?php echo $rec_id;?>','<?php echo $rec_nombre;?>','<?php echo $rec_descripcion;?>')">Reservas</button>
				</div>
				<div class="boton" style="padding-left: 5px; padding-right: 5px; margin-top: 10px;">
					<button type="button" class="log-btn" name="submit"  onclick="editRecurso('<?php echo $rec_id;?>','<?php echo $rec_nombre;?>','<?php echo $rec_descripcion;?>','<?php echo $rec_foto;?>','<?php echo $rec_incidencia;?>','<?php echo $rec_estado;?>')">Modificar</button>
				</div>
			</div>
<?php
			}
		}
?>
		</div>


 		



</body>
</html>
