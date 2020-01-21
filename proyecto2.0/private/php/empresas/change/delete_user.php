<?php

include('../sesiones_login/session.php'); 
if(isset( $_SESSION['login_user']))
    {
        $nombre = $_GET['user'];
        
        $DBServer = 'localhost';
        $DBUser   = 'root';
        $DBPass   = '';
        $DBName = 'proyecto';
    
        try{
            $db = new PDO('mysql:host='.$DBServer.';dbname='.$DBName, $DBUser, $DBPass);
            
            $consulta = $db->prepare("delete * from usuarios where user=:login_user");
            $parametros = array(
                "login_user"=>$nombre
            );
            
            if($consulta->execute($parametros))
                header("Location: ../../../index.html");
            else
                echo "Error: el usuario no ha podido eliminarse correctamente";
        
            echo "<br/>";
        }catch(PDOException $e){
            echo "ERROR: " . $e->getMessage();
        }
    }
    else echo "Se ha eliminado correctamente.";
    echo "\t<a href=' ../../../index.html'>Volver</a>";

?>