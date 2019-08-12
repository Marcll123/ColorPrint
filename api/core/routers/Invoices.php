<?php

require_once '../controllers/InvoicesController.php';
header('Access-Control-Allow-Origin: http://localhost:8080');
header("Access-Control-Allow-Headers: Origin, X-Requested-With, Content-Type, Accept, token");
header('Access-Control-Allow-Methods: GET, POST, PUT, DELETE');
header('Content-Type: application/json');

$newInvoices = new InvoicesController();
switch ($_SERVER['REQUEST_METHOD']) {
        case 'GET':
                $data = $newInvoices->show();
                echo json_encode($data);
                break;

        case 'POST':
                $data = $newInvoices->save();
                echo $data;
                break;

        case 'PUT':
                $data = $newInvoices->update();
                echo  $data;
                break;

        case 'DELETE':
                $data = $newInvoices->delete();
                echo  $data;
                break;
}
