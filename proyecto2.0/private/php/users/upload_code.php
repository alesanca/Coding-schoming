<?php
   include('sesiones_login/session.php');
   $db = mysqli_connect(DB_SERVER,DB_USERNAME,DB_PASSWORD,DB_DATABASE);
   if(isset($_POST['submit'])) {
       if(is_uploaded_file($_FILES['fichero']['tmp_name'])){

        //Creamos las variables que subimos a la DB
        $ruta = "upload/";
        $nombrefinal = trim ($_FILES['fichero']['name']);
        //$nombrefinal = ereg_replace (" ", " ", $nombrefinal);
        $upload= $ruta . $nombrefinal;

        if(move_uploaded_file($_FILES['fichero']['tmp_name'], $upload)) {
            $nombre = $_POST["nombre"];
            $description = $_POST['description'];

            try{
            $consulta = $pdo->prepare("INSERT INTO archivos(name, descripcion, ruta, tipo, size) VALUES
            (:name, :descripcion, :ruta, :tipo, :size)" );
            
            $parametros = array(
                "name"=> $nombre,
                "descripcion"=> $description,
                "ruta" => $upload,
                "tipo" => $_FILES['fichero']['type'],
                "size" => $_FILES['fichero']['size']
            );

            if( $consulta->execute($parametros) )
                header("Location: upload_code.php");
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

<html>

<head>

    <title> Coding schmoding </title>
    <link rel="stylesheet" type="text/css" href="../../css/header_public.css">
    <link rel="stylesheet" type="text/css" href="../../css/container.css">
    <link rel="stylesheet" type="text/css" href="../../css/footer.css">
</head>

<body>

<div id="header">
    <img src="../../../public/images/logo.jpg">
    <div class="topnav">
      <a class="active" href="welcome.php">Home</a>
      <a href="comenta.php">Comenta</a>
      <a href="upload_code.php">Sube tu c&oacute;digo</a>
      <a href="empresas.php">Empresas</a>
      <div class="login-container">
        <a href="edit_account.php"><img src="../../../public/images/cuenta.png"></a>
        <button style="margin-top: 6%"><a href="sesiones_login/logout.php">Cerrar sesión</a></button>
      </div>
    </div>
  </div>

    <div id="container">
        <form action="<?php echo $_SERVER['PHP_SELF'] ?>" method="post" enctype="multipart/form-data">
            Selecciona un archivo para subir: <input name="fichero" type="file" size="150" maxlength="150">
            <br/><br /> Nombre del archivo: <input name="nombre" type="text" size="19" maxlength="70">
            <br/><br />Descripcion: <input name="description" type="text" size="26" maxlength="250">
            <br/><br /><input name="submit" type="submit" value="Subir archivo">
        </form>
    </div>

    <?php
    $usuario = $_SESSION['login_user'];
    $consulta1 = mysqli_query($db, "SELECT * FROM archivos") or die(mysqli_error($db));
        while($row = mysqli_fetch_assoc($consulta1)){
            echo "<div id='todos'>". "<strong> Usuario: </strong> ".$usuario. "<strong> Archivo: </strong> ". $row['name']."<br>"
            . "<br/> <strong> Descripcion: </strong>" .$row['descripcion']."<br/>" .
            "<br/> <buton><a download href='$row[ruta]'>Descargar </a></button></div>"
            ;
        }
    ?>

<div id="footer">
        <img src="../../../public/images/github.png" id="pic1">
        <img src="../../../public/images/twitter.png" id="pic2">
      </div>

</body>

</html>