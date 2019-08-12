
<?php
require_once '../controllers/RolesController.php';
header('Access-Control-Allow-Origin: http://localhost:8080');
header("Access-Control-Allow-Headers: Origin, X-Requested-With, Content-Type, Accept, token");
header('Access-Control-Allow-Methods: GET, POST, PUT, DELETE');
header('Content-Type: application/json');

$newRole = new RolesController();
switch ($_SERVER['REQUEST_METHOD']) {
        case 'GET':
                $data = $newRole->show();
                echo json_encode($data);
                break;

        case 'POST':
                $data = $newRole->save();
                echo $data;
                break;

        case 'PUT':
                $data = $newRole->update();
                echo  $data;
                break;

        case 'DELETE':
                $data = $newRole->delete();
                echo  $data;
                break;
}

?>