<?php declare(strict_types=1);
    require_once('usuario.php');
    require_once('crud_usuario.php');
    use PHPUnit\Framework\TestCase;
    final class PrimeraPrueba extends TestCase{
        public function testPrimeraPrueba(): void
        {
            $usuario=new Usuario();
            $crud=new CrudUsuario();
            $usuario->setNombre("brandon-prueba");
            $usuario->setCorreo("correo@prueba.com");
            $usuario->setUsuario("usuario-prueba");
            $usuario->setClave("clavePrueba");
            $crud->insertar($usuario);
            $expected=2;

            $result = $crud->numeroUsuarios();

            $this->assertEquals($expected, $result);

        }
    }
?>
