<?php
   include('sesiones_login/session.php');
   $db = mysqli_connect(DB_SERVER,DB_USERNAME,DB_PASSWORD,DB_DATABASE);
   if(isset($_POST['submit'])) {
       if(is_uploaded_file($_FILES['fichero']['tmp_name'])){

        //Creamos las variables que subimos a la DB
        $ruta = "../users/CV/";
        $nombrefinal = trim ($_FILES['fichero']['name']);
        $upload= $ruta . $nombrefinal;

        if(move_uploaded_file($_FILES['fichero']['tmp_name'], $upload)) {
            try{
            $usuario = $_SESSION['login_user'];
            $consulta = $pdo->prepare("INSERT INTO cv(ruta, user) VALUES
            (:ruta, :user)" );
            
            $parametros = array(
                "ruta" => $upload,
                "user"=> $usuario
            );

            if( $consulta->execute($parametros) )
                header("Location: edit_account.php");
            else
                echo "Error: el alumno no ha podido insertarse correctamente";
        
            echo "<br/>";
        }catch(PDOException $e){
            echo "ERROR: " . $e->getMessage();
        }
    }

    echo "El archivo se ha subido con éxito";

    }
}

?>