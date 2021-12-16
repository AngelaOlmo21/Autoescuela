<?php
class BD{

    public static $conexion;
    public static function conectar(){
        try {
            self::$conexion = new PDO('mysql:host=localhost;dbname=autoescuela','root','');
            return true;
        } catch (\Throwable $th) {
            return false;
        }
        
    }
    
    public static function existeusuario($email,$password)
    {

        $sql = "SELECT * FROM USUARIOS " .
            "WHERE email='$email' " .
            "AND contraseña='" .$password. "'";
            
            if($resultado = self::$conexion->query($sql))
             {
                $fila = $resultado->fetch();
                return ($fila != null);
             }             
    }

    public static function obtieneUsuario($email,$password):Usuario
    {
        
        $res= self::$conexion->query("SELECT * FROM USUARIOS WHERE email ='$email' and contraseña='$password'");
        while ($registro = $res->fetch()) 
        {
            $user=new Usuario(array('nombre'=>$registro['nombre'],'email'=>$registro['email'],
            'contraseña'=>$registro['contraseña'],'roles'=>$registro['roles']));
            
        }
        return $user;
	
    }

    public static function añadeUsuario($nombre, $apellidos, $fnac, $email, $rol){
        $consulta="INSERT INTO usuarios VALUES (NULL,?,?,NULL,?,NULL,?,?)";
        $sql=self::$conexion->prepare($consulta);
        $sql->bindParam(1,$nombre);
        $sql->bindParam(2,$apellidos);
        $sql->bindParam(3,$fnac);
        $sql->bindParam(4,$email);
        $sql->bindParam(5,$rol);
        return $sql->execute();
         
    }

}