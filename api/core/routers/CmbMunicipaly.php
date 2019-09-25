<?php
require_once '../controllers/cmbController.php';

header('Access-Control-Allow-Origin: http://localhost:8080');
header("Access-Control-Allow-Headers: Origin, X-Requested-With, Content-Type, Accept, token");
header('Access-Control-Allow-Methods: GET, POST, PUT, DELETE');
header('Content-Type: application/json');

$newQuery = new cmbController();

switch ($_SERVER['REQUEST_METHOD']) {
    case 'GET':
        $data = $newQuery->cmvMunicipaly();
        echo json_encode($data);
        break;
}
