<?php
    require_once '../controllers/TypeSaleController.php';

    header('Access-Control-Allow-Origin: http://192.168.1.51');
    header("Access-Control-Allow-Headers: Origin, X-Requested-With, Content-Type, Accept, token");
    header('Access-Control-Allow-Methods: GET, POST, PUT, DELETE');
    header('Content-Type: application/json');

    $newQuery = new  TypeSaleController();

    switch($_SERVER['REQUEST_METHOD']){
        case 'GET':
        $data = $newQuery->showNum();
        echo json_encode($data);
        break;
    }
?>