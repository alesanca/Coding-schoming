<?php
   include('sesiones_login/session.php');
   $db = mysqli_connect(DB_SERVER,DB_USERNAME,DB_PASSWORD,DB_DATABASE);
?>

<html>

<head>

  <title> Coding schmoding </title>
  <link rel="stylesheet" type="text/css" href="../../css/header_public.css">
  <link rel="stylesheet" type="text/css" href="../../css/main_public.css">
  <link rel="stylesheet" type="text/css" href="../../css/footer.css">
  <link rel="stylesheet" type="text/css" href="../../css/comment.css">

</head>

<body>

<div id="header">
    <img src="../../../public/images/logo.jpg">
    <div class="topnav">
      <a class="active" href="welcome.php">Home</a>
      <a href="empresas.php">Empresas</a>
      <a href="registra_empresa.php">Registra tu empresa</a>
      <a href="lista_usuarios.php">Lista de usuarios</a>
      <div class="login-container">
        <a href="edit_account.php"><img src="../../../public/images/cuenta.png"></a>
        <button style="margin-top: 6%"><a href="sesiones_login/logout.php">Cerrar sesión</a></button>
      </div>
    </div>
  </div>

  <div id="comments">

    <form action="" method="post">
      <input type="text" name="name" placeholder="Nombre de la empresa"><br /><br />
      <input type="text" name="area" placeholder="Area de trabajo"><br /><br />
      <input type="number" name="numero" placeholder="Numero de trabajadores"><br /><br />
      <input type="text" name="descripcion" placeholder="Descripcion de la empresa"><br /><br />
      <input type="submit" name="enviar" placeholder="Enviar comentario"><br /><br />
    </form>

    <?php
      if(isset($_POST['enviar'])){
        $usuario = mysqli_real_escape_string($db,$_POST['name']); 
        $area = mysqli_real_escape_string($db,$_POST['area']); 
        $numero = mysqli_real_escape_string($db,$_POST['numero']); 
        $descripcion = mysqli_real_escape_string($db,$_POST['descripcion']); 
        if($usuario == '' or $area == '' or $numero == '' or $descripcion == ''){
          echo "Lo sentimos, debe rellenar todos los campos";
        }else{
          $insertar = mysqli_query($db, "insert into lista_empresas(nombre, area, numero, descripcion) VALUES 
          ('".$usuario."' , '".$area."' , '".$numero."' , '".$descripcion."')") or die(mysqli_error($db));
          echo "Los campos se han rellenado correctamente, la empresa se ha inscrito. <br/>";
        }
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