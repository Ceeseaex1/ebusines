<?php
require_once('usuario.php');
require_once('crud_usuario.php');
require_once('conexion.php');

//inicio de sesion
session_start();

$usuario=new Usuario();
$crud=new CrudUsuario();
//verifica si la variable registrarse está definida
//se da que está definida cuando el usuario se loguea, ya que la envia en la petición 
if(isset($_POST['registrar'])){
    $usuario->setNombre($_POST['nombre']);
    $usuario->setCorreo($_POST['correo']);
    $usuario->setUsuario($_POST['usuario']);
    $usuario->setClave($_POST['clave']);
    $crud->insertar($usuario);
    echo "<font color='green'>Data added successfully.";
    /*if($crud->buscarUsuario($_POST['usuario'])){
        $crud->insertar($usuario);
        header('Location: ../index.php');
    }else{
        header('Location: error.php?mensaje=El nombre de usuario ya existe');
    }*/
    
}elseif (isset($_POST['entrar'])){//verifica si la variable entrar está definida
    $usuario = $crud->obtenerUsuario($_POST['usuario'], $_POST['pas']);
    //si el id del objeto retornado no es null, quiere decir que no encontró un registro en la base de datos
    if ($usuario->getId() != NULL){
        $_SESSION['usuario']=$usuario; //si el usuario se encuentra, crea la sesión de usuario
        header('Location: ../index1.php'); //envia la página que inicia el usuario
    }else{
        header('Location: error.php?mensaje=Tu nombre de usuario o contraseña son incorrectos');
        //cuando los datos son incorrectos envia a la página de error
    }
}elseif (isset($_POST['salir'])){ //cuando presiona el botón salir
    header('Location: index.php');
    unset($_SESSION['usuario']);//destruye la sesión
}

?>

