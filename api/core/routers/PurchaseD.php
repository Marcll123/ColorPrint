<?php
require_once '../helpers/Auth.php';
require_once '../controllers/PurchaseDController.php';
header('Access-Control-Allow-Origin: http://localhost:8080');
header("Access-Control-Allow-Headers: Origin, X-Requested-With, Content-Type, Accept, token");
header('Access-Control-Allow-Methods: GET, POST, PUT, DELETE');
header('Content-Type: application/json');

$headers = apache_request_headers();

$newPurchaseD = new PurchaseDController();
switch ($_SERVER['REQUEST_METHOD']) {
        case 'GET':
                $data = $newPurchaseD->show();
                echo json_encode($data);
                break;

        case 'POST':
                $data = $newPurchaseD->save();
                echo $data;
                break;

        case 'PUT':
                $data = $newPurchaseD->update();
                echo  $data;
                break;

        case 'DELETE':
                $data = $newPurchaseD->delete();
                echo  $data;
                break;
}
