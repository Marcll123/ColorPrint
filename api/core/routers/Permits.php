
<?php
require_once '../controllers/PermitsController.php';
header('Access-Control-Allow-Origin: http://localhost:8080');
header("Access-Control-Allow-Headers: Origin, X-Requested-With, Content-Type, Accept, token");
header('Access-Control-Allow-Methods: GET, POST, PUT, DELETE');
header('Content-Type: application/json');

$newPermit = new PermitsController();

switch ($_SERVER['REQUEST_METHOD']) {
        case 'GET':
                $data = $newPermit->show();
                echo json_encode($data);
                break;

        case 'POST':
                $data = $newPermit->save();
                echo $data;
                break;

        case 'PUT':
                $data = $newPermit->update();
                echo  $data;
                break;

        case 'DELETE':
                $data = $newPermit->delete();
                echo  $data;
                break;
}

?>