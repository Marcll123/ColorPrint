<?php
require_once '../controllers/DepartmentController.php';
header('Access-Control-Allow-Origin: http://localhost:8080');
header("Access-Control-Allow-Headers: Origin, X-Requested-With, Content-Type, Accept, token");
header('Access-Control-Allow-Methods: GET, POST, PUT, DELETE');
header('Content-Type: application/json');

$newDepartment = new DepartmentController();

switch ($_SERVER['REQUEST_METHOD']) {
        case 'GET':
                $data = $newDepartment->show();
                echo json_encode($data);
                break;

        case 'POST':
                $data = $newDepartment->save();
                echo $data;
                break;

        case 'PUT':
                $data = $newDepartment->update();
                echo  $data;
                break;

        case 'DELETE':
                $data = $newDepartment->delete();
                echo  $data;
                break;
}
