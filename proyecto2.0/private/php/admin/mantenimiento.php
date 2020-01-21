<?php
   include('sesiones_login/session.php');
?>

<html>

<head>

    <script>
        function muestra_oculta(id) {
            if (document.getElementById) { //se obtiene el id
                var el = document.getElementById(id); //se define la variable "el" igual a nuestro div
                el.style.display = (el.style.display == 'none') ? 'block' :
                    'none'; //damos un atributo display:none que oculta el div
            }
        }
        window.onload = function () {
            /*hace que se cargue la función lo que predetermina que div estará oculto hasta llamar a la función nuevamente*/
            muestra_oculta('contenido'); /* "contenido_a_mostrar" es el nombre que le dimos al DIV */
        }

        function muestra_oculta2(id2) {
            if (document.getElementById) { //se obtiene el id
                var el2 = document.getElementById(id2); //se define la variable "el" igual a nuestro div
                el2.style.display = (el2.style.display == 'none') ? 'block' :
                    'none'; //damos un atributo display:none que oculta el div
            }
        }
        window.onload = function () {
            /*hace que se cargue la función lo que predetermina que div estará oculto hasta llamar a la función nuevamente*/
            muestra_oculta2('contenido2'); /* "contenido_a_mostrar" es el nombre que le dimos al DIV */
        }
    </script>

    <title> Coding schmoding </title>
    <link rel="stylesheet" type="text/css" href="../../../public/css/header_public.css">
    <link rel="stylesheet" type="text/css" href="../../../private/css/footer.css">
    <link rel="stylesheet" type="text/css" href="../../css/mantenimiento.css">
    <link rel="stylesheet" type="text/css" href="../../../private/css/main_public.css">
</head>

<body>

    <div id="header">
        <img src="../../../public/images/logo.jpg">
        <div class="topnav">
            <a class="active" href="welcome.php">Home</a>
            <a href="comenta.php">Comenta</a>
            <a href="upload_code.php">Sube tu c&oacute;digo</a>
            <a href="empresas.php">Empresas</a>
            <a href="mantenimiento.php">Mantenimiento</a>
            <div class="login-container">
                <button style="margin-top: 6%"><a href="sesiones_login/logout.php">Cerrar sesión</a></button>
            </div>
        </div>
    </div>
 
    <div id="container">
        <div class="titulo_boton">
            Lista de empresas
            <a style='cursor: pointer;' onClick="muestra_oculta('contenido')" title="" class="boton_mostrar">Mostrar
                /
                Ocultar</a>
        </div>
    
        <div id="contenido">
            <?php
                $consulta1 = mysqli_query($db, "SELECT * FROM empresas") or die(mysqli_error($db));
                while($row = mysqli_fetch_assoc($consulta1)){
                    echo "<div id='todos'>". "<strong> Usuario: </strong> ".$row['usuario']. 
                    "<br/><strong> email: </strong> ". $row['email']."<br> <strong> Contraseña: </strong> ". $row['password']."<br/><br/> ";
                    
                    echo "<form action='change_empresas/change_pass.php' method='get'>
                    <input type='hidden' name='idempresa' value=".$row['id_empresa'].">
                    <input type='pasword' size='25' maxlength='30' name='pass' placeholder='Introduce la nueva contraseña'>
                    <input type='submit' name='Enviar'></form>";

                    echo"<form action='change_empresas/change_user.php' method='get'>
                    <input type='hidden' name='idempresa' value=".$row['id_empresa'].">
                    <input type='text' size='25' maxlength='30' name='new_name' id='new_name' placeholder='Introduce el nuevo usuario'>
                    <input type='submit' name='Enviar'>
                    </form>";

                    echo "<a href='change_empresas/delete_user.php?nombre=".$row['usuario']."' method='get'> Eliminar cuenta </a> </div>";
                }
            ?>
        </div>
    </div>
           
    <div id="container2">
        <div class="titulo_boton">
            Lista de usuarios
            <a style='cursor: pointer;' onClick="muestra_oculta2('contenido2')" title="" class="boton_mostrar">Mostrar
                /
                Ocultar</a>
        </div>
           
        <div id="contenido2">
            <?php
                $consulta1 = mysqli_query($db, "SELECT * FROM usuarios") or die(mysqli_error($db));
                while($row = mysqli_fetch_assoc($consulta1)){
                    echo "<br/> <br/><div id='todos'>". "<strong> Usuario: </strong> ".$row['user']. 
                    "<br/><strong> email: </strong> ". $row['email']."<br> <strong> Contraseña: </strong> ". $row['pass']."<br/><br/> ";
                    
                    echo "<form action='change/change_pass.php' method='get'>
                    <input type='hidden' name='idusuarios' value=".$row['idusuarios'].">
                    <input type='password' size='25' maxlength='30' name='pass' placeholder='Introduce la nueva contraseña'>
                    <input type='submit' name='Enviar'></form>";

                    echo"<form action='change/change_user.php' method='get'>
                    <input type='hidden' name='idusuarios' value=".$row['idusuarios'].">
                    <input type='text' size='25' maxlength='30' name='new_name' id='new_name' placeholder='Introduce el nuevo usuario'>
                    <input type='submit' name='Enviar'>
                    </form>";

                    echo "<a href='change/delete_user.php?nombre=".$row['user']."' method='get'> Eliminar cuenta <a> </div>";
                }

            ?>
        </div>

            </div>

    <div id="footer" style="margin-top: 60%">
        <img src="../../../public/images/github.png" id="pic1">
        <img src="../../../public/images/twitter.png" id="pic2">
    </div>


</body>

</html>