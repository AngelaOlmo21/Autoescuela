<?php
require_once "Usuario.php";
require_once "Sesion.php";
require_once "BD.php";
class Login{
    
    public static function identifica(string $usuario, string $password){
        if(self::existeUsuario($usuario,$password)){
            Sesion::iniciar();
            Sesion::escribir('login',$usuario);
        }
        return false;
    }

    private static function existeUsuario(string $usuario, string $password=null){
        BD::conectar();
        return BD::existeusuario($usuario, $password);
    }

    public static function UsuarioEstaLogueado()
    {
        if(Sesion::leer('login'))
        {
            return true;
        }
        elseif(isset($_COOKIE['recuerdame']) && self::ExisteUsuario($_COOKIE['recuerdame']))
        {
            Sesion::iniciar();
            Sesion::escribir('login',$_COOKIE['recuerdame']);
            return true;
        }
        return false;
    }

}
?>