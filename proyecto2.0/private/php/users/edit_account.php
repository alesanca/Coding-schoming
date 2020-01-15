<?php
   include('sesiones_login/session.php');
?>

<html>

<head>

  <title> Coding schmoding </title>
  <link rel="stylesheet" type="text/css" href="../css/header_private.css">
  <link rel="stylesheet" type="text/css" href="../css/edit_account.css">
  <link rel="stylesheet" type="text/css" href="../css/private_footer.css">

</head>

<body>

  <div id="header">
    <img src="../../public/images/logo.jpg">
    <div class="topnav">
      <a class="active" href="#home">Home</a>
      <a href="../../public/html/about_us.html">Sobre nosotros</a>
      <a href="../../public/html/contacto.html">Contacto</a>
      <a href="../../public/html/for_users.html">Para usuarios </a>
      <a href="../../public/html/for_companies.html">Para empresas </a>
      <div class="login-container">
        <button style="margin-top: 6%"><a href="sesiones_login/logout.php">Cerrar sesión</a></button>
      </div>
    </div>
  </div>

  <div id="container">
    <div id="center">
      <h1> Aqu&iacute; puedes editar tu informaci&oacute;n </h1>

      <div id="square">
        <form action="change/change_mail.php" method="get">
          <p> Cambiar correo electrónico:</p>
          <input type="text" size="25" maxlength="30" name="correo" placeholder="Introduce el nuevo email">

          <input type="submit" name="Enviar">
        </form>
      </div>

      <div id="square">
        <form action="change/change_user.php" method="get">
          <p> Cambiar usuario:</p>
          <input type="text" size="25" maxlength="30" name="user" placeholder="Introduce el nuevo usuario">
          <input type="submit" name="Enviar">
        </form>
      </div>

      <div id="square">
        <form action="change/change_pass.php" method="get">
          <p> Cambiar contraseña:</p>
          <input type="password" size="25" maxlength="30" name="pass" placeholder="Introduce la nueva contraseña">

          <input type="submit" name="Enviar">
        </form>

        <div id="square">
          
            <p> Eliminar usuario </p>
            <form action="change/delete_user.php" method="get">
            <input type="submit" name="Enviar">
          </form>
        </div>

      </div>


      <div id="footer">
        <img src="../../public/images/github.png" id="pic1">
        <img src="../../public/images/twitter.png" id="pic2">
      </div>

    </div>

  </div>


</body>

</html>