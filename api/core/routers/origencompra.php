<?php
require_once '../helpers/Auth.php';
require_once '../controllers/OrigenCompraController.php';
header('Access-Control-Allow-Origin: http://localhost:8080');
header("Access-Control-Allow-Headers: Origin, X-Requested-With, Content-Type, Accept, token");
header('Access-Control-Allow-Methods: GET, POST, PUT, DELETE');
header('Content-Type: application/json');


$newOrigen = new OrigenCompraController();
switch ($_SERVER['REQUEST_METHOD']) {
        case 'GET':
                $data = $newOrigen->show();
                echo json_encode($data);
                break;

        case 'POST':
                $data = $newOrigen->save();
                echo $data;
                break;

        case 'PUT':
                $data = $newOrigen->update();
                echo  $data;
                break;

        case 'DELETE':
                $data = $newOrigen->delete();
                echo  $data;
                break;
}
