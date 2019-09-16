<?php
require_once '../controllers/LoginController.php';
header('Access-Control-Allow-Origin: http://localhost:8080');
header("Access-Control-Allow-Headers: Origin, X-Requested-With, Content-Type, Accept, token");
header('Access-Control-Allow-Methods: GET, POST, PUT, DELETE');
header('Content-Type: application/json');

$headers = apache_request_headers();
header('Content-Type: application/json');
switch ($_SERVER['REQUEST_METHOD']) {
        case 'POST':
                $login = new LoginController();
                $data = $login->login2();
                echo $data;
                break;
}
