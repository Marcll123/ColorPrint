<?php
require_once '../helpers/Auth.php';
require_once '../controllers/TypeBuyController.php';
header('Access-Control-Allow-Origin: http://localhost:8080');
header("Access-Control-Allow-Headers: Origin, X-Requested-With, Content-Type, Accept, token");
header('Access-Control-Allow-Methods: GET, POST, PUT, DELETE');
header('Content-Type: application/json');

$headers = apache_request_headers();
$newTypeBuy = new TypeBuyController();
switch ($_SERVER['REQUEST_METHOD']) {
        case 'GET':
                $data = $newTypeBuy->show();
                echo json_encode($data);
                break;

        case 'POST':
                $data = $newTypeBuy->save();
                echo $data;
                break;

        case 'PUT':
                $data = $newTypeBuy->update();
                echo  $data;
                break;

        case 'DELETE':
                $data = $newTypeBuy->delete();
                echo  $data;
                break;
}
