<?php 

class Database {

    private $hostname = "localhost";
    private $database = "ferreteria4";
    private $username = "root";
    private $password = "naomi1927";
    private $charset = "utf8";

    function conectar()
    {
        try {
        $conexion = "mysql:host=" . $this->hostname  . "; dbname=" . $this->database . "; 
        charset=" . $this->charset;
        $options = [
            PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
            PDO::ATTR_EMULATE_PREPARES => false
        ];

        $pdo = new PDO($conexion, $this->username, $this->password, $options); 

        return $pdo;


    }catch(PDOException $e){
        echo 'Error Conexion: ' . $e->getMessage();
        exit;
    }

}


}

?>