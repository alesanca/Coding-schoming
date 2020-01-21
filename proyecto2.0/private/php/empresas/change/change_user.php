<?php

include('../sesiones_login/session.php');    

    if( $_GET['user']!="")
    {
        $nombre = $_SESSION['login_user'];
        $usuario = $_GET['user'];

        $DBServer = 'localhost';
        $DBUser   = 'root';
        $DBPass   = '';
        $DBName = 'proyecto';
    
        try{
           
            $db = new PDO('mysql:host='.$DBServer.';dbname='.$DBName, $DBUser, $DBPass);
            
            $consulta = $db->prepare( "update usuarios set user=:user where user=:login_user" );
            $parametros = array(
                "user"=>$usuario,
                "login_user"=>$nombre
            );
            
            if( $consulta->execute($parametros) )
                header("Location: ../welcome.php");
            else
                echo "Error: el usuario no ha podido cambiarse correctamente";
        
            echo "<br/>";
        }catch(PDOException $e){
            echo "ERROR: " . $e->getMessage();
        }
    }
    else echo "Error: algunos de los campos no se han rellenado";
    echo "\t<a href='../edit_account.php'>Volver</a>";
    
?>