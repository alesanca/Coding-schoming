<?php
    if( $_GET['user']!="" && $_GET['pass']!="" && $_GET['email']!="")
    {
        $user = $_GET['user'];
        $pass = $_GET['pass'];
        $email = $_GET['email'];
      
        $DBServer = 'localhost';
        $DBUser   = 'root';
        $DBPass   = '';
        $DBName = 'proyecto';
    
        try{
            //Primer paso: Conectamos al Sistema Gestor de Bases de Datos MySQL
            $db = new PDO('mysql:host='.$DBServer.';dbname='.$DBName, $DBUser, $DBPass);
            
            //Segundo paso: Consulta de inserci�n a la base de datos personas

            $consulta = $db->prepare( "insert into usuarios(email, user, pass) values(:email, :user, :pass)");
            $parametros = array(
                "email"=>$email,
                "user"=>$user,
                "pass"=>$pass,
            );
            
            if( $consulta->execute($parametros) )
                header("Location: ../../../public/php/login_usuarios.php");
            else
                echo "Error: el usuario no ha podido insertarse correctamente";
            echo "<br/>";
        }catch(PDOException $e){
            echo "ERROR: " . $e->getMessage();
        }
    }
    else echo "Error: algunos de los campos no se han rellenado";
    echo "\t<a href='new_register.php'>Volver</a>";
    
?>