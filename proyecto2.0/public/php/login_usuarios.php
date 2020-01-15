<?php
   include("../../private/php/users/sesiones_login/config.php");
   session_start();
   
   if($_SERVER["REQUEST_METHOD"] == "POST") {
      // username and password sent from form 
      
      $myusername = mysqli_real_escape_string($db,$_POST['user']);
      $mypassword = mysqli_real_escape_string($db,$_POST['pass']); 
      
      $sql = "SELECT user FROM usuarios WHERE user = '$myusername' and pass = '$mypassword'";
      $result = mysqli_query($db,$sql);
      $row = mysqli_fetch_array($result,MYSQLI_ASSOC);
      $active = $row['active'];
      
      $count = mysqli_num_rows($result);
      
      // If result matched $myusername and $mypassword, table row must be 1 row
		
      if($count == 1) {
         //session_register("user");
         $_SESSION['login_user'] = $myusername;
         header("location: ../../private/php/users/welcome.php");
      }else {
         $error = "Your Login Name or Password is invalid";
      }
   }
?>

<html>

<head>

  <title> Coding schmoding </title>
  <link rel="stylesheet" type="text/css" href="../css/header_public.css">
  <link rel="stylesheet" type="text/css" href="../css/main_public.css">
  <link rel="stylesheet" type="text/css" href="../css/user_login.css">
  <link rel="stylesheet" type="text/css" href="../css/footer.css">
</head>

<body>

  <div id="header">
    <img src="../images/logo.jpg">
    <div class="topnav">
      <a class="active" href="../../index.html">Home</a>
      <a href="../html/about_us.html">Sobre nosotros</a>
      <a href="../html/contacto.html">Contacto</a>
      <a href="../html/for_users.html">Para usuarios </a>
      <a href="../html/for_companies.html">Para empresas </a>
      <div class="login-container">
        <button style="margin-top: 6%"><a href="../html/new_user.html">Crear cuenta</a></button>
      </div>
    </div>
  </div>

  <div id="container">
    <form class="box" action="" method="post">
      <h1> Login </h1>
      <input type="text" name="user" placeholder="Usuario" style="color: black;">
      <input type="password" name="pass" placeholder="Contrasena" style="color: black;">
      <input type="submit" placeholder="Iniciar sesion" style="color: black;">
    </form>
  </div>
  <div id="footer">
    <img src="../images/github.png" id="pic1">
    <img src="../images/twitter.png" id="pic2">
  </div>

</body>

</html>