<?php
class Database 
{
    private $hostname = "bfngjzxj17wvecjd0vaz-mysql.services.clever-cloud.com";
    private $database = "bfngjzxj17wvecjd0vaz";
    private $username = "um8kgqisqiu8ackm";
    private $password = "wYLUdnsmKmIcYcuaon4I";
    private $charset = "utf8";

    function conectar()
    {
        try{
        $conexion = "mysql:host=" . $this->hostname . "; dbname=" . $this->database . 
        "; charset=" . $this->charset;
        $options = [
            PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
            PDO::ATTR_EMULATE_PREPARES => false 
        ];
        $pdo = new PDO($conexion, $this->username, $this->password, $options);

        return $pdo;
    } catch(PDOException $e){
echo 'Error conexion: ' . $e->getMessage();
exit;
    }
    }

    

}

?>