<?php
require_once '../helpers/Auth.php';
require_once '../controllers/SaleDetailController.php';
header('Access-Control-Allow-Origin: http://localhost:8080');
header("Access-Control-Allow-Headers: Origin, X-Requested-With, Content-Type, Accept, token");
header('Access-Control-Allow-Methods: GET, POST, PUT, DELETE');
header('Content-Type: application/json');

$headers = apache_request_headers();


$newSaleDetail = new SaleDetailController();
switch ($_SERVER['REQUEST_METHOD']) {
        case 'GET':
                $data = $newSaleDetail->show();
                echo json_encode($data);
                break;

        case 'POST':
                $data = $newSaleDetail->save();
                echo $data;
                break;

        case 'PUT':
                $data = $newSaleDetail->update();
                echo  $data;
                break;

        case 'DELETE':
                $data = $newSaleDetail->delete();
                echo  $data;
                break;
}
