<?php

include('../sesiones_login/session.php'); 
if(isset( $_SESSION['login_user']))
    {
       
        $nombre = $_GET['nombre'];
        $DBServer = 'localhost';
        $DBUser   = 'root';
        $DBPass   = '';
        $DBName = 'proyecto';
    
        try{
            $db = new PDO('mysql:host='.$DBServer.';dbname='.$DBName, $DBUser, $DBPass);
           
            $consulta = $db->prepare("delete from empresas where usuario=:nombre");
            $parametros = array(
                "nombre"=>$nombre
            );
            
            if($consulta->execute($parametros))
                header("Location: ../mantenimiento.php");
            else
                echo "Error: el usuario no ha podido eliminarse correctamente";
        
            echo "<br/>";
        }catch(PDOException $e){
            echo "ERROR: " . $e->getMessage();
        }
    }
    else echo "Se ha eliminado correctamente.";
    echo "\t<a href=' ../mantenimiento.php'>Volver</a>";

?>