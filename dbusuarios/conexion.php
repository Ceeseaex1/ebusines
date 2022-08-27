<?php 
class DB{
    private static $conexion=NULL;
    private function __construct(){}

    public static function conectar(){
        $pdo_options[PDO::ATTR_ERRMODE] = PDO::ERRMODE_EXCEPTION;
        self::$conexion = new PDO('mysql:host=bfngjzxj17wvecjd0vaz-mysql.services.clever-cloud.com; dbname=bfngjzxj17wvecjd0vaz', 'um8kgqisqiu8ackm', 'wYLUdnsmKmIcYcuaon4I', $pdo_options); //Usuario general de XAMPP --> root, $pdo_options envia la información
        return self::$conexion; 
    }
}
?>