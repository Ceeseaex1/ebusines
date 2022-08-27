<?php
require_once('conexion.php');
require_once('usuario.php');

class CrudUsuario{

    public function __construct(){}

    //insertar los datos del usuario
    public function insertar($usuario){
        $db=DB::conectar();
        $insert=$db->prepare('INSERT INTO usuarios VALUES(NULL, :nombre, :correo, :usuario, :clave)');
        $insert->bindValue('nombre', $usuario->getNombre());
        $insert->bindValue('correo', $usuario->getCorreo());
        $insert->bindValue('usuario', $usuario->getUsuario());
        //encripta contraseña
        $pass=password_hash($usuario->getClave(), PASSWORD_DEFAULT);
        $insert->bindValue('clave', $pass);
        $insert->execute();
        echo "<font color='red'>Data added successfully.";
    }

    //obtiene el usuario para el login
    public function obtenerUsuario($usuario, $clave){
        $db=DB::conectar();
        //$select=$db->prepare("SELECT * FROM USUARIOS WHERE nombre='$nombre'");//AND clave=:clave //primero es el campo de la tabla, el segundo es el del formulario ":" valide que sea el mismo
        $select=$db->prepare('SELECT * FROM usuarios WHERE usuario=:usuario');
        $select->bindValue('usuario', $usuario);
        $select->execute();
        $registro = $select->fetch();
        $usuario = new Usuario();
        //verificar si la clave es correcta
        if (password_verify($clave, $registro['clave'])){
            //si es correcta, asigna los valores que trae desde la base de datos
            $usuario->setId($registro['id']);
            $usuario->setNombre($registro['nombre']);
            $usuario->setUsuario($registro['usuario']);
            $usuario->setCorreo($registro['correo']);
            $usuario->setClave($registro['clave']);
        }
        return $usuario;
    }

    //busca el nombre del usuario si existe
    public function buscarUsuario($usuario){
        $db=DB::conectar();
        //$select=$db->prepare('SELECT * FROM USUARIOS WHERE nombre=:nombre');
        $select=$db->prepare('SELECT * FROM usuarios WHERE usuario=:usuario');
        $select->bindValue('usuario', $usuario);
        $select->execute();
        $registro=$select->fetch();
        if($registro['id']!=NULL){
            $usado=False;
        }else{
            $usado=True;
        }
        return $usado;
    }
}