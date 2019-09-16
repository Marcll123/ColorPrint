<?php
    const BD = 'mysql';
    const BD_SERVIDOR = 'localhost';
    const BD_CHARSET = 'utf8';

class Connection{   
        private static $db_server = 'localhost';
        private static $db_name = 'colorprint';
        private static $db_user = 'Marcos';
        private static $db_pass = '123';
        private $conexion = null;
        #CONEXION BD
        public function connect(){
            try {      
                $dsn = 'mysql:host='.self::$db_server.';dbname='.self::$db_name;
                $pdo = new PDO($dsn, self::$db_user, self::$db_pass);
                $pdo->exec("SET CHARACTER SET utf8");
              
                return $pdo;
            } catch (PDOException $e) {
                echo 'ERROR: '. $e->getMessage();
            }
        }
    }
    $mysqli = new mysqli("localhost", "Marcos" ,"123", "colorprint");
?>

