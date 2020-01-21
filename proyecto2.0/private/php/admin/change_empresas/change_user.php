<?php

include('../sesiones_login/session.php');    

if(isset( $_SESSION['login_user']))
{
        $id = $_GET['idempresa']; //Ya existe
        $nombre= $_GET['new_name']; //El nuevo

        $DBServer = 'localhost';
        $DBUser   = 'root';
        $DBPass   = '';
        $DBName = 'proyecto';
    
        try{
           
            $db = new PDO('mysql:host='.$DBServer.';dbname='.$DBName, $DBUser, $DBPass);
            
            $consulta = $db->prepare( "update empresas set usuario=:nombre where id_empresa=:id" );
            $parametros = array(
                "nombre"=>$nombre,
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
    echo "\t<a href='../mantenimiento.php'>Volver</a>";
    
?>