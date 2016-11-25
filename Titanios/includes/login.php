<?php
include "includes/conexion_bd.php";


   //CÓDIGO DE LOGIN:
    extract($_REQUEST);

        //1.- Si existe la variable submit hacer:
    if(isset($submit)){
        
        //2.- Asignación de variables recibidas:
        $usu_usuario = trim($username);
        $usu_pwd = trim($password);

        if(!isset($admin)){
            // echo "No existe <br/>";
            $usu_categoria = 'profesor';
        } else {
            $usu_categoria = 'administrador';
            // echo "Existe <br/>";
        }
        // $usu_categoria = $admin;

        
        //4.- Realización de consulta en la base de datos para los NO administradores:
            $sql = "SELECT * FROM  tbl_usuarios WHERE usu_usuario = '$usu_usuario' and usu_pwd = '$usu_pwd' and usu_categoria = '$usu_categoria'";
            // echo $sql;
        

            $login = mysqli_query($conexion, $sql);
            print_r($login);

            // if($login['usu_estado']=='inactivo'){
            //         header('location:index.php?&error=login');
            // }



            // $records = $databaseConnection->prepare('SELECT usu_usuario, usu_pwd, usu_categoria FROM  tbl_usuarios WHERE usu_usuario = :username and usu_pwd = :password and usu_categoria = :admin');
            // $records->bindParam(':username', $usu_usuario);
            // $records->bindParam(':password', $usu_pwd);
            // $records->bindParam(':admin', $usu_categoria);
            // $records->execute();
            // $results = $records->fetch(PDO::FETCH_ASSOC);


       }

?>