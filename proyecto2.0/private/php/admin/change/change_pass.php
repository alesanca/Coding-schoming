<?php

include('../sesiones_login/session.php');    

    if( $_GET['pass']!="")
    {
        $pass = $_GET['pass'];
        $id = $_GET['idusuarios'];

        $DBServer = 'localhost';
        $DBUser   = 'root';
        $DBPass   = '';
        $DBName = 'proyecto';
    
        try{
           
            $db = new PDO('mysql:host='.$DBServer.';dbname='.$DBName, $DBUser, $DBPass);
            
            $consulta = $db->prepare( "update usuarios set pass=:pass where idusuarios=:id" );
            $parametros = array(
                "pass"=>$pass,
                "id"=>$id
            );
            
            if( $consulta->execute($parametros) )
                header("Location: ../mantenimiento.php");
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