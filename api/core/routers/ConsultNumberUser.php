<?php
    require_once '../controllers/UsersController.php';

    header('Access-Control-Allow-Origin: http://localhost:8080');
    header("Access-Control-Allow-Headers: Origin, X-Requested-With, Content-Type, Accept, token");
    header('Access-Control-Allow-Methods: GET, POST, PUT, DELETE');
    header('Content-Type: application/json');

    $newQuery = new  UsersController();

    switch($_SERVER['REQUEST_METHOD']){
        case 'GET':
        $data = $newQuery->showNum();
        echo json_encode($data);
        break;
    }
?>