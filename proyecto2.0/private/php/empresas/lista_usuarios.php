<?php
   include('sesiones_login/session.php');
   $db = mysqli_connect(DB_SERVER,DB_USERNAME,DB_PASSWORD,DB_DATABASE);
?>

<html>

<head>

    <title> Coding schmoding </title>
    <link rel="stylesheet" type="text/css" href="../../../public/css/header_public.css">
    <link rel="stylesheet" type="text/css" href="../../css/empresa.css">
    <link rel="stylesheet" type="text/css" href="../../../public/css/footer.css">

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

    <div id="container">

        <?php
    $consulta1 = mysqli_query($db, "SELECT * FROM usuarios") or die(mysqli_error($db));
        while($row = mysqli_fetch_assoc($consulta1)){
            echo "<div id='todos'>". "<strong> Usuario: </strong> ".$row['user']. "<br/><strong> email: </strong> ". $row['email']."<br> ";
        
     
    $consulta2= mysqli_query($db, "SELECT * FROM cv") or die(mysqli_error($db));

    $row = mysqli_fetch_assoc($consulta2);
            echo "<br/> <buton><a download href='$row[ruta]'>Descargar CV </a></button></div></div>";
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