<?php

require_once '../controllers/UsersController.php';
require_once '../helpers/Auth.php';
header('Access-Control-Allow-Origin: *');
header("Access-Control-Allow-Headers: Origin, X-Requested-With, Content-Type, Accept, token");
header('Access-Control-Allow-Methods: GET, POST, PUT, DELETE');
header('Content-Type: application/json');

$newUser = new UsersController();
switch ($_SERVER['REQUEST_METHOD']) {
    case 'GET':
        $data = $newUser->showoneid();
        echo json_encode($data);
        break;
}
