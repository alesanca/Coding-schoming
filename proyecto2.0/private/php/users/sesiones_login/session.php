<?php
   include('config.php');
   session_start();
   
   //Inicio PDO

      $DBServer = 'localhost';
      $DBUser   = 'root';
      $DBPass   = '';
      $DBName = 'proyecto';

   $pdo = new PDO('mysql:host='.$DBServer.';dbname='.$DBName, $DBUser, $DBPass);

   //Inicio mysqli
   $user_check = $_SESSION['login_user'];
   
   $ses_sql = mysqli_query($db,"select user from usuarios where user = '".$user_check."'");
   
   $row = mysqli_fetch_array($ses_sql,MYSQLI_ASSOC);

   $login_session = $row['user'];
   
   if(!isset($_SESSION['login_user'])){
      header("location:login_usuarios.php");
      die();
   }
?>