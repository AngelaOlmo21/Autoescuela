<?php 
class Usuario{
    protected $nombre;
    protected $apellidos;
    protected $email;
    protected $contraseña;
    protected $roles;
    protected $fnac;
    protected $foto;


    public function getNombre(){
        return $this->nombre;
    }
    public function getEmail(){
        return $this->email;
    }
    public function getPassword(){
        return $this->password;
    }
    public function getRoles(){
        return $this->roles;
    }

    public function getApellidos(){
        return $this->apellidos;
    }

    public function getFnac(){
        return $this->fnac;
    }

    public function getFoto(){
        return $this->foto;
    }

    public function __construct($row)
    {
        $this->nombre=$row['nombre'];
        $this->email=$row['email'];
        $this->contraseña=$row['contraseña'];
        $this->apellidos=$row['apellidos'];
        $this->fnac=$row['fnac'];
        $this->foto=$row['foto'];
    }
}
?>