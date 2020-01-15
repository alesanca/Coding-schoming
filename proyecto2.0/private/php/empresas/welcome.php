<?php
   include('sesiones_login/session.php');
?>

<html>

<head>

<style>

.login-container img{
  height: 60px;
  margin-top: 7%;
  margin-right: 15px;
}

</style>

  <title> Coding schmoding </title>
  <link rel="stylesheet" type="text/css" href="../../../public/css/header_public.css">
  <link rel="stylesheet" type="text/css" href="../../../public/css/main_public.css">
  <link rel="stylesheet" type="text/css" href="../../../public/css/footer.css">

</head>

<body>

  <div id="header">
    <img src="../../../public/images/logo.jpg">
    <div class="topnav">
      <a class="active" href="welcome.php">Home</a>
      <a href="../users/comenta.php">Comenta</a>
      <a href="registra_empresa.php">Registra tu empresa</a>
      <a href="#">Sube tu oferta</a>
      <a href="#">Lista de usuarios</a>
      <div class="login-container">
        <a href="edit_account.php"><img src="../../../public/images/cuenta.png"></a>
        <button style="margin-top: 6%"><a href="sesiones_login/logout.php">Cerrar sesión</a></button>
      </div>
    </div>
  </div>

  <div id="container">
    <div id="center">
      <h1> ¡Has iniciado sesión! </h1>
      <div id="hero">
        <p>Arriba a la derecha puedes cerrarla cuando quieras. Espero que disfrutes de la pagina. :)
        </p>
      </div>

      <div id="caracteristicas">
        <div id="square">
          <p>Comparte</p>
          <img src="../../../public/images/share.JPG">
        </div>
        <div id="square">
          <p>Comenta</p>
          <img src="../../../public/images/comment.JPG">
        </div>
        <div id="square">
          <p>Trabaja</p>
          <img src="../../../public/images/job.JPG">
        </div>
      </div>

      <div id="footer">
        <img src="../../../public/images/github.png" id="pic1">
        <img src="../../../public/images/twitter.png" id="pic2">
      </div>

    </div>

  </div>


</body>

</html>