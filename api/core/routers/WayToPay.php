<?php
require_once '../helpers/Auth.php';
require_once '../controllers/WayToPayController.php';
header('Access-Control-Allow-Origin: http://localhost:8080');
header("Access-Control-Allow-Headers: Origin, X-Requested-With, Content-Type, Accept, token");
header('Access-Control-Allow-Methods: GET, POST, PUT, DELETE');
header('Content-Type: application/json');

$newWayToPay = new WayToPayController();
switch ($_SERVER['REQUEST_METHOD']) {
        case 'GET':
                $data = $newWayToPay->show();
                echo json_encode($data);
                break;

        case 'POST':
                $data = $newWayToPay->save();
                echo $data;
                break;

        case 'PUT':
                $data = $newWayToPay->update();
                echo  $data;
                break;

        case 'DELETE':
                $data = $newWayToPay->delete();
                echo  $data;
                break;
}
