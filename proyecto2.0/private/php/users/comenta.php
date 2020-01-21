<?php
   include('sesiones_login/session.php');
   //include('sesiones_login/config.php');
   $db = mysqli_connect(DB_SERVER,DB_USERNAME,DB_PASSWORD,DB_DATABASE);
?>

<html>

<head>

  <style>
    .login-container img {
      height: 60px;
      margin-top: 7%;
      margin-right: 15px;
    }
  </style>

  <title> Coding schmoding </title>
  <link rel="stylesheet" type="text/css" href="../../../public/css/header_public.css">
  <link rel="stylesheet" type="text/css" href="../../../public/css/main_public.css">
  <link rel="stylesheet" type="text/css" href="../../../public/css/footer.css">
  <link rel="stylesheet" type="text/css" href="../../css/comment.css">

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

  <div id="comments">

    <form action="" method="post">
      <input type="text" name="asunto" placeholder="Asunto"><br /><br />
      <input type="text" name="comentario" placeholder="Comentario"><br /><br />
      <input type="submit" name="enviar" placeholder="Enviar comentario"><br /><br />
    </form>

    <?php
      if(isset($_POST['enviar'])){
        $usuario = $_SESSION['login_user'];
        $comentario = mysqli_real_escape_string($db,$_POST['comentario']); 
        $asunto = mysqli_real_escape_string($db,$_POST['asunto']); 
        if($usuario == '' or $comentario == ''){
          echo "Lo sentimos, debe rellenar todos los campos";
        }else{
          $insertar = mysqli_query($db, "insert into comentarios(usuario, comentario, asunto) VALUES 
          ('".$usuario."' , '".$comentario."' , '".$asunto."')") or die(mysqli_error($db));
          echo "Los campos se han rellenado correctamente. <br/>";
        }
      }
    ?>

    <?php
      $consulta1 = mysqli_query($db, "SELECT * FROM comentarios") or die(mysqli_error($db));
      while($row = mysqli_fetch_assoc($consulta1)){
        echo "<div id='comentarios'>". "<strong> Usuario: </strong> ".$row['usuario']. "<strong> Asunto: </strong> ". $row['asunto']."<br>"
        . "<br/> <div id='commentarios2'>" . $row['comentario'] . "</div>" 
        ."<br/></div>";
      }
    ?>

  </div>

  <div id="footer">
        <img src="../../../public/images/github.png" id="pic1">
        <img src="../../../public/images/twitter.png" id="pic2">
      </div>

  </div>

  </div>


</body>

</html>