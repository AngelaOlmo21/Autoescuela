<?php 
include "../Clases/Usuario.php";
include "../Clases/BD.php";
if(isset($_POST['enviar']) && isset($_POST['email'])){
    if(BD::conectar()){
    $email=$_POST['email'];
    $nombre=$_POST['nombre'];
    $apellidos=$_POST['apellidos'];
    $fnac=$_POST['fnac'];
    $rol=$_REQUEST['rol'];
    echo BD::añadeUsuario($nombre, $apellidos, $fnac, $email, $rol);    
    }
}
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <link rel="stylesheet" href="../css/main.css">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Alta Usuario</title>
</head>
<body> 
    <header>
        <img src="../img/logo.png" alt="">
    </header>
        <nav>
            <ul>
                <li class="categoria">
                    <a href="#">Usuarios</a>
                    <ul class="submenu">
                        <li><a href="Registrar.php">Alta Usuario</a></li>
                        <li><a href="include/AltaMasivaUsu.js">Alta Masiva</a></li>
                    </ul>
                </li>
                <li class="categoria">
                    <a href="#">Temáticas</a>
                    <ul class="submenu">
                        <li><a href="#">Alta Temática</a></li>
                    </ul>
                </li>
                <li class="categoria">
                    <a href="#">Preguntas</a>
                    <ul class="submenu">
                        <li><a href="">Alta Pregunta</a></li>
                        <li><a href="../AltaMasivaPreg.html">Alta Masiva</a></li>
                    </ul>
                </li>
                <li class="categoria">
                    <a href="#">Examenes</a>
                </li>
            </ul>
        </nav>
    
    <h3>Alta usuario</h3>
    <form action="Registrar.php" method="POST">
        <p class="registrar">Email</p> <br>
        <input type="text" name="email" id="email" class="registrar"> <br>

        <p class="registrar">Nombre</p> <br>
        <input type="text" name="nombre" id="nombre" class="registrar"> <br>

        <p class="registrar">Apellidos</p> <br>
        <input type="text" name="apellidos" id="apellidos" class="registrar"> <br>

        <p class="registrar">Fecha de nacimiento</p> <br>
        <input type="date" name="fnac" id="fnac" class="registrar"><br>

        <p class="registrar">Rol</p>
        <select name="rol" id="rol">
            <option value="Administrador">Administrador</option>
            <option value="Alumno">Alumno</option>
        </select>
        <br> <br>
        <input type="submit" class="enviar" value="Enviar" id="enviar" name="enviar">
    </form>
</body>
</html>