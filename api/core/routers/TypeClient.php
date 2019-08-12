
<?php
require_once '../helpers/Auth.php';
require_once '../controllers/TypeClientController.php';
header('Access-Control-Allow-Origin: http://localhost:8080');
header("Access-Control-Allow-Headers: Origin, X-Requested-With, Content-Type, Accept, token");
header('Access-Control-Allow-Methods: GET, POST, PUT, DELETE');
header('Content-Type: application/json');

$newTclient = new TypeClientController();
switch ($_SERVER['REQUEST_METHOD']) {
        case 'GET':
                $data = $newTclient->show();
                echo json_encode($data);
                break;

        case 'POST':
                $data = $newTclient->save();
                echo $data;
                break;

        case 'PUT':
                $data = $newTclient->update();
                echo  $data;
                break;

        case 'DELETE':
                $data = $newTclient->delete();
                echo  $data;
                break;
}

?>