<?php

require_once '../controllers/RecoverController.php';
header('Access-Control-Allow-Origin: *');
header("Access-Control-Allow-Headers: Origin, X-Requested-With, Content-Type, Accept, token");
header('Access-Control-Allow-Methods: GET, POST, PUT, DELETE');
header('Content-Type: application/json');


switch ($_SERVER['REQUEST_METHOD']) {
    case 'POST':
        $recover = new RecoverController();
        $data = $recover->emailRecover();
        echo $data;
        break;
}
