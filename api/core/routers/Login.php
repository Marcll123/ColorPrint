<?php
require_once '../controllers/LoginController.php';
header('Content-Type: application/json');
switch($_SERVER['REQUEST_METHOD']){
        case 'POST':
        $login = new LoginController();
        $data = $login->login();
        echo $data;
        break;
}
?>