<?php
	include "includes/conexion_bd.php";
	session_start();

	if(!isset($_SESSION['username']) || $_SESSION['categoria'] == 'administrador'){
    	header('location:index.php');
	}


//------- CONSULTA SQL PARA MOSTRAR RECURSOS:

		$sql = "SELECT * FROM tbl_recursos ORDER BY rec_id";

			$recursos = mysqli_query($conexion, $sql);
?>



<!DOCTYPE html>
<html>
	<head>
		<meta charset="UTF-8">
	  	<title>Titanium Recursos</title>
		<link rel="stylesheet" href="css/style.css"> 


		<script type="text/javascript">
			function ficha(id,img,tit,desc,usu){
				
				window.location = 'recursos.php?&ficha=true&rec_id='+id+'&rec_foto='+img+'&rec_nombre='+tit+'&rec_descripcion='+desc+'&id_usu='+usu;
			}
			function incidencia(id,incidencia,nombre,imagen,descripcion){
				
				window.location = 'recursos.php?&rec_id='+id+'&inci='+incidencia+'&rec_nombre='+nombre+'&rec_foto='+imagen+'&rec_descripcion='+descripcion;
			}
			function cerrar(){
					window.location ='recursos.php';
			};
			
			
		</script>

		<!-- VALIDACIÓN DE DATOS -->
		<script type="text/javascript">
       
            function validacion(){

            	var fech = new Date();
            	fechaActual=fech.getFullYear()+"-"+(fech.getMonth()+1)+'-'+fech.getDate()+' '+fech.getHours()+':00:00';
            	
            	fechaInicio = document.getElementById("fechaIni").value;
            	horaInicio = document.getElementById("horaInicio").value;
            	fecha1=(fechaInicio+" "+horaInicio+":00:00");

            	fechaFin = document.getElementById("fechaFin").value;
            	horaFin = document.getElementById("horaFin").value;
            	fecha2=(fechaFin+" "+horaFin+":00:00");

            	if(fechaActual<fecha1){
            			if(fecha1<fecha2){
            				
            				return true;
            			}else{
            				
            				document.getElementById('oc').innerHTML='<font face="Helvetica" COLOR="red">La fecha/hora final no puede ser menor que la inicial</font>';
            				return false;
            			}
            	}else{
            		document.getElementById('oc').innerHTML='<font face="Helvetica" COLOR="red">La fecha inicial no puede ser menor que la fecha/hora en la que estamos</font>';
            		return false;
            	}

            }


            
    	</script>




	</head>
	
	<body>
		<div class="encabezado">
				<div class="enc_1">
				<img src="img/logo1.png">
				</div>
				<div class="enc_2">
	                <h1> <font face="Helvetica" COLOR="#0079BA">Reservar Recursos</font></h1>
	            </div>
	            <div class="enc_3">
	                <font face="Helvetica" COLOR="#0079BA"><span ria-hidden="true"><H4>USUARIO: <?php echo $_SESSION['username'];?></H4> </span></font>
	            </div>
	            <div class="enc_4">
	           		<a href="includes/cerrar.php"><img src="img/exit.jpg"></a> 
	            </div>
	    </div>

	    <?php
		if(isset($_REQUEST['inci'])){
?>
		<div class="estadistica">
			<div class="encabCaja">
			<div style="width: 95%; float:left;">
					<font face="Helvetica" COLOR="white"><h3>INCIDENCIA: <?php echo $_REQUEST['rec_nombre'];?></h3></font>
				</div>
				<div style="width: 5%;float:left; margin-top: 10px;">
 					<button style="margin-left: 40%; background-color: white;" onclick="cerrar();">X</button>
 				</div>
					
			</div>
				
			
						
			<div class="recursos" style="background: url('img/<?php echo $_REQUEST['rec_foto']; ?>.jpg') no-repeat;">
				<div class='descripcion' style="background: white; opacity: 0.6; height: 40px;">
					<?php echo $_REQUEST['rec_descripcion'];  ?>
				</div>
			</div>
			<div class="recursosDesc">
				<div class="encabCaja">
					<h3> <font face="Helvetica" COLOR="white">Formulario para la Incidencia:</font></h3>
				</div>
	
				<form action="recursos_upIncidencia_res.php" method="get" accept-charset="utf-8">
     				<div class="formGroup" style="width: 90%; float:left;">
					<textarea cols="70" name="rec_incidencia" rows="6"></textarea>
				</div>

     				
					<div id="oc" class="oculto" style="float:left; margin-top:12%; text-align: center;">

						<font id="fontGreen" face="Helvetica" COLOR="green" style="display: none;">Recurso Ocupado, seleccione otra fecha y hora</font>
						
					</div>
					<input type="hidden" name="rec_id" value="<?php echo $_REQUEST['rec_id'];?>">
					<input type="hidden" name="inci" value="<?php echo $_REQUEST['inci'];?>">
					<input type="submit"  class="log-btn" value="RESERVAR" name="submit">
				</form>
			</div>
		</div>
<?php			
		}
?>


<?php
		if($_REQUEST['incidencia']=='true'){
?>
		<div class="estadistica">
			<font face="Helvetica" COLOR="green">Incidencia añadida correctamente.</font>

		</div>


<?php			
		}
?>





<?php
		if($_REQUEST['estado']=='reservado'){
?>
		<div class="estadistica">
			<div class="encabCaja">
				<font face="Helvetica" COLOR="white"><h3>ESTADO DE RESERVA:</h3></font>
			</div>
			<div class='reserva'>
				RECURSO: <?php echo $_REQUEST['nom_rec'];?> -- ESTADO: <?php echo $_REQUEST['estado'];?> <br/> FECHA INICIO: <?php echo $_REQUEST['finicio'];?><br/> FECHA FIN: <?php echo $_REQUEST['ffin'];?>
			</div>

		</div>


<?php			
		}
?>
		
<?php
		if(isset($_REQUEST['ficha']) OR ($_REQUEST['estado']=='ocupado') ){
?>
		<div class="estadistica">
			<div class="encabCaja">
			<div style="width: 95%; float:left;">
					<font face="Helvetica" COLOR="white"><h3>RESERVAR: <?php echo $_REQUEST['rec_nombre'];?></h3></font>
				</div>
				<div style="width: 5%;float:left; margin-top: 10px;">
 					<button style="margin-left: 40%; background-color: white;" onclick="cerrar();">X</button>
 				</div>
					
			</div>
				
			
						
			<div class="recursos" style="background: url('img/<?php echo $_REQUEST['rec_foto']; ?>.jpg') no-repeat;">
				<div class='descripcion' style="background: white; opacity: 0.6; height: 40px;">
					<?php echo $_REQUEST['rec_descripcion'];  ?>
				</div>
			</div>
			<div class="recursosDesc">
				<div class="encabCaja">
					<h3> <font face="Helvetica" COLOR="white">Formulario para la reserva:</font></h3>
				</div>
	
				<form action="recursos_insert_res.php" method="get" accept-charset="utf-8" onsubmit="return validacion()";>
     				<div class="finicio">
     					Fecha Inicio: <input type="date" id="fechaIni" name="fechaIni" id="fecha" required placeholder="2016/12/31">
						Hora inicio: 
					<select id="horaInicio" name="horaInicio" required>
						   <option value="08">8</option> 
						   <option value="09">9</option> 
						   <option value="10">10</option>
						   <option value="11">11</option> 
						   <option value="12">12</option> 
						   <option value="13">13</option>
						   <option value="14">14</option>
						   <option value="15">15</option>
						   <option value="16">16</option>
						   <option value="17">17</option>
						   <option value="18">18</option>
						   <option value="19">19</option>
						   <option value="20">20</option>
						   <option value="21">21</option>
					</select>
     				</div>
     				<div class="ffin">
     					Fecha Fin: <input type="date" name="fechaFin" id="fechaFin" required placeholder="2016/12/31">
		
						Hora fin: 
							<select id="horaFin" name="horaFin" required>
								   <option value="8">8</option> 
								   <option value="9">9</option> 
								   <option value="10">10</option>
								   <option value="11">11</option> 
								   <option value="12">12</option> 
								   <option value="13">13</option>
								   <option value="14">14</option>
								   <option value="15">15</option>
								   <option value="16">16</option>
								   <option value="17">17</option>
								   <option value="18">18</option>
								   <option value="19">19</option>
								   <option value="20">20</option>
								   <option value="21">21</option>
							</select>
     				</div>
					<div id="oc" class="oculto">
<?php			
	if($_REQUEST['estado']=='ocupado'){
?>
						<font face="Helvetica" COLOR="red">Recurso Ocupado, seleccione otra fecha y hora</font>
<?php			
		}
?>						
					</div>
				
					<input type="hidden" name="id_usu" value="<?php echo $_REQUEST['id_usu'];?>">
					<input type="hidden" name="nom_rec" value="<?php echo $_REQUEST['rec_nombre'];?>">
					<input type="hidden" name="rec_id" value="<?php echo $_REQUEST['rec_id'];?>">
					<input type="submit"  class="log-btn" value="RESERVAR" name="submit">
				</form>
			</div>

			<table style='margin-top:20px;'>
					<tr>
						<th>HORAS DE OCUPACIÓN:</th>
						<th></th>
					</tr>
					<tr>
						<th>Fecha Inicio</th>
						<th>Fecha fin</th>
					</tr>

<?php
		$fecha=strftime( "%Y-%m-%d %H:%M:%S", time() );
		$sqlReservas = "SELECT* FROM tbl_reservas WHERE rec_id ='".$_REQUEST['rec_id']."' AND res_finicio >= '".$fecha."'";
		$ejecutarsqlReservas = mysqli_query($conexion, $sqlReservas);

			
 ?>
					<tr>
<?php
				for ($celda=1; $celda<=5; $celda++) {
					while ($reservasHoras = mysqli_fetch_array($ejecutarsqlReservas)) {
?>
						<td><?php echo $reservasHoras['res_finicio'];?></td>
						<td><?php echo $reservasHoras['res_ffin'];?></td>
					</tr>
<?php
				}
		
		}


 	?>
 				</table>



		</div>
<?php			
		}
?>

		<div class="estadistica">
			<div class="encabCaja">
					<h3><font face="Helvetica" COLOR="white">RECURSOS:</font></h3>
			</div>
			<br/>
<?php

//-------  BUCLE PARA MOSTRAR CONTENIDO DEL PRIMER DIV:

	if (mysqli_num_rows($recursos)>0) {

		while ($recurso = mysqli_fetch_array($recursos)) {
				$nombre = $recurso['rec_nombre'];
				$descripcion = $recurso['rec_descripcion'];
				$imagen = $recurso['rec_foto'];
				$id = $recurso['rec_id'];
				$id_usu = $_SESSION['id_usuario'];
				$estado=$recurso['rec_estado'];
				$incidencia=$recurso['rec_incidencias'];
?>
	
					
			<div class="espaciosindiv" style="background-image: url(img/<?php echo $imagen;?>.png); height: 165px;">
				<div class='titulo'>
					<?php echo $nombre;?> 
				</div>
				<div class='descripcion'>
					<?php echo $descripcion;?>
				</div>
				<div class='boton' style="padding-left: 5px; padding-right: 5px;">
<?php
		if($estado=='activo'){
?>

					<button type="submit" class="log-btn" name="submit" onclick="ficha('<?php echo $id;?>','<?php echo $imagen;?>','<?php echo $nombre;?>','<?php echo $descripcion;?>','<?php echo $id_usu;?>')">DISPONIBILIDAD</button>

<?php			
		}
?>
				</div>
				<div class='boton' style="padding-left: 5px; padding-right: 5px; margin-top: 10px;">
					<button type="submit" class="log-btn" name="submit" onclick="incidencia('<?php echo $id;?>','<?php echo $incidencia;?>','<?php echo $nombre;?>','<?php echo $imagen;?>','<?php echo $descripcion;?>')">INCIDENCIAS</button>
				</div>
			</div>
		

<?php
		}
	}


	$usu_id = $_SESSION['id_usuario'];


	$sql = "SELECT tbl_recursos.rec_nombre, tbl_recursos.rec_descripcion, tbl_reservas.res_finicio, tbl_reservas.res_ffin FROM tbl_reservas, tbl_recursos WHERE tbl_recursos.rec_id = tbl_reservas.rec_id AND tbl_reservas.usu_id = $usu_id ORDER BY tbl_reservas.res_ffin asc";

		 

	$recReservados = mysqli_query($conexion, $sql);
?>
		</div>
		<div class="estadistica">
			<div class="encabCaja">
					<h3><font face="Helvetica" COLOR="white">RESERVAS:</font></h3>
			</div>
				<table style='margin-top:20px;'>
					<tr>
						<th>Nombre</th>
						<th>Descripción</th>
						<th>Fecha Inicio</th>
						<th>Fecha fin</th>
					</tr>

<?php
			
 ?>
					<tr>
<?php
				
					while ($recurso = mysqli_fetch_array($recReservados)) {
?>
						<td><?php echo $recurso['rec_nombre'];?></td>
						<td><?php echo $recurso['rec_descripcion'];?></td>
						<td><?php echo $recurso['res_finicio'];?></td>
						<td><?php echo $recurso['res_ffin'];?></td>
					</tr>
<?php
				}
		




 	?>
 				</table>
		</div>

	</body>
</html>