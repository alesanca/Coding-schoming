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
      <a href="comenta.php">Comenta</a>
      <a href="upload_code.php">Sube tu c&oacute;digo</a>
      <a href="../../public/html/for_users.html">Ofertas de empleo</a>
      <a href="../../public/html/for_companies.html">Empresas</a>
      <div class="login-container">
        <a href="edit_account.php"><img src="../../../public/images/cuenta.png"></a>
        <button style="margin-top: 6%"><a href="sesiones_login/logout.php">Cerrar sesión</a></button>
      </div>
    </div>
  </div>

  <div id="container">

  <?php
    $pdo = mysqli_connect(DB_SERVER,DB_USERNAME,DB_PASSWORD,DB_DATABASE);
    $consulta1 = mysqli_query($pdo, "SELECT * FROM lista_empresas") or die(mysqli_error($pdo));
        while($row = mysqli_fetch_assoc($consulta1)){
            echo "<div id='todos'>". "<strong> Empresa: </strong> ". $row['nombre']. "<strong> Area: </strong> ". $row['area']."<br>"
            . "<br/> <strong> Nº trabajadores: </strong>" .$row['numero']."<br/>";
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