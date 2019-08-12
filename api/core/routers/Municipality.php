<?php

require_once '../controllers/MunicipalityController.php';
header('Access-Control-Allow-Origin: http://localhost:8080');
header("Access-Control-Allow-Headers: Origin, X-Requested-With, Content-Type, Accept, token");
header('Access-Control-Allow-Methods: GET, POST, PUT, DELETE');
header('Content-Type: application/json');

$newMunicipality = new MunicipalityController();
switch ($_SERVER['REQUEST_METHOD']) {
        case 'GET':
                $data = $newMunicipality->show();
                echo json_encode($data);
                break;

        case 'POST':
                $data = $newMunicipality->save();
                echo $data;
                break;

        case 'PUT':
                $data = $newMunicipality->update();
                echo  $data;
                break;

        case 'DELETE':
                $data = $newMunicipality->delete();
                echo  $data;
                break;
}
