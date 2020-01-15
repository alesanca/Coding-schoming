<?php

include('/sesiones_login/config.php');


    if( $_GET['user']!="" && $_GET['pass']!="" && $_GET['email']!="" && $_GET['empresa']!="")
    {
        try{

            $user = $_GET['user'];
            $pass = $_GET['pass'];
            $email = $_GET['email'];
            $empresa = $_GET['empresa'];

            $DBServer = 'localhost';
            $DBUser   = 'root';
            $DBPass   = '';
            $DBName = 'proyecto';
      
            $pdo = new PDO('mysql:host='.$DBServer.';dbname='.$DBName, $DBUser, $DBPass);
    
            $consulta = $pdo->prepare( "insert into empresas(email, usuario, empresa, password) values(:email, :user, :empresa, :pass)");
            $parametros = array(
                "email"=>$email,
                "user"=>$user,
                "pass"=>$pass,
                "empresa"=>$empresa
            );
            
            if( $consulta->execute($parametros) )
                header("Location: ../../../public/php/login_companies.php");
            else
                echo "Error: la empresa no ha podido insertarse correctamente";
            echo "<br/>";
        }catch(PDOException $e){
            echo "ERROR: " . $e->getMessage();
        }
    }
    else echo "Error: algunos de los campos no se han rellenado";
    echo "\t<a href='../../../public/html/new_companie.html'>Volver</a>";
    
?>