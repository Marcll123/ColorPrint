<?php
require_once '../controllers/QuotationController.php';
header('Access-Control-Allow-Origin: http://localhost:8080');
header("Access-Control-Allow-Headers: Origin, X-Requested-With, Content-Type, Accept, token");
header('Access-Control-Allow-Methods: GET, POST, PUT, DELETE');
header('Content-Type: application/json');

$newQuotation = new QuotationController();

switch ($_SERVER['REQUEST_METHOD']) {
        case 'GET':
                $data = $newQuotation->show();
                echo json_encode($data);
                break;

        case 'POST':
                $data = $newQuotation->save();
                echo $data;
                break;

        case 'PUT':
                $data = $newQuotation->update();
                echo  $data;
                break;

        case 'DELETE':
                $data = $newQuotation->delete();
                echo  $data;
                break;
}
