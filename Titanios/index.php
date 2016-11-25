<?php

session_start();
include "includes/login.php";

if(isset($login)){

    if(mysqli_num_rows($login)>0){
     
      $datosUsu = mysqli_fetch_array($login);

          if($datosUsu['usu_estado']=='inactivo'){
                    header('location:index.php?&error=login');
            }else{
              $_SESSION['username'] = $usu_usuario;
              $_SESSION['categoria'] = $usu_categoria;
              $_SESSION['id_usuario'] = $datosUsu['usu_id'];
   

              if($usu_categoria == 'profesor'){
                  header('location:recursos.php');
              } else {
                  header('location:admin.php');
              }

            }
    }
  }
?>

<!DOCTYPE html>
<html >
<head>
  <meta charset="UTF-8">
  <title>Titanium Login</title>
  
  
  <link rel='stylesheet prefetch' href='http://maxcdn.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css'>

      <link rel="stylesheet" href="css/style.css">

  
</head>

<body>
<?php if(isset($_REQUEST['error'])) { ?>
  <div class="warning">
  Usuario desactivado, comuníquese con el administrador de la web
  </div>
<?php
}
  ?>
  <div class="login-form">
     <h1><img src="img/logo.png"></h1>
     <form action="" method="post" accept-charset="utf-8">
     
     <div class="form-group ">
       <input type="text" class="form-control" name="username" placeholder="Usuario" id="username">
     </div>
     <div class="form-group ">
       <input type="password" class="form-control" name="password" placeholder="Contraseña" id="password">
       <i class="fa fa-lock"></i>
     </div>
     <div class="checkbox-admin">
        <input type="checkbox" name="admin">Administrador
     </div>
     <?php
     if(isset($login)){
      if(mysqli_num_rows($login)>0){

      } else {
        echo '<span class="alert">Datos incorrectos</span>';
        }
      }
        ?>
        <br/>
     <input type="submit" class="log-btn" name="submit" value="ENTRAR"></input>
     </form>
    
   </div>
  <?php  ?>

  <script src='http://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js'></script>

      <script src="js/index.js"></script>

</body>
</html>
