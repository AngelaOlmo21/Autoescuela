<?php
include "Clases/BD.php";
require_once "Clases/Usuario.php";
require_once "Clases/Login.php";
require_once "Clases/Sesion.php";
    // Comprobamos si ya se ha enviado el formulario
    $error="";
    if (isset($_POST['enviar']))
    {
        $email = $_POST['email'];
        $password = $_POST['password'];
       
        if (empty($email) || empty($password)) 
            $error = "Debes introducir un email y una contraseña";
        else 
        {
            // Comprobamos si existe el usuario. Si existe se crea la variable de seion login
                        
            Login::Identifica($email,$password,false);
            // Si el usuario es identificado se crea la variable de sesion login
            if  (Login::UsuarioEstaLogueado())
            {
                Sesion::escribir('usuario', BD::obtieneUsuario($email,$password));
                header("Location: "); //aqui va la ruta de la pagina de inicio                    
            }       
        }
    }
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
  <meta http-equiv="content-type" content="text/html; charset=UTF-8">
  <link rel="stylesheet" href="css/main.css">
  <title>Login Autoescuela</title>
  </head>

<body>
<header>
        <img src="img/logo.png" alt="" class="login">
    </header>
    <div id='login'>
    <form action='loginform.php' method='post' class="login">
    <fieldset class="login">
        <legend class="login">Login</legend>
        <div>
            <?php echo $error; ?>
        </div>
        
            <label for='email' class="login" >Email:</label><br/>
            <input type='text' name='email' class='login' maxlength="50" /><br/>
            <label for='password' class="login">Contraseña:</label><br/>
            <input type='password' name='password' class='login' maxlength="50" /><br/>
        

        
            <input type='submit' name='enviar' class="envLog" value='Aceptar'/>
        
    </fieldset>
    </form>
    </div>
</body>
</html>