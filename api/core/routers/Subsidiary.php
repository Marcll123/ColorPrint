
<?php
require_once '../controllers/SubsidiaryController.php';
header('Access-Control-Allow-Origin: http://localhost:8080');
header("Access-Control-Allow-Headers: Origin, X-Requested-With, Content-Type, Accept, token");
header('Access-Control-Allow-Methods: GET, POST, PUT, DELETE');
header('Content-Type: application/json');

$newSub = new SubsidiaryController();

switch ($_SERVER['REQUEST_METHOD']) {
        case 'GET':
                $data = $newSub->show();
                echo json_encode($data);
                break;

        case 'POST':
                $data = $newSub->save();
                echo $data;
                break;

        case 'PUT':
                $data = $newSub->update();
                echo  $data;
                break;

        case 'DELETE':
                $data = $newSub->delete();
                echo  $data;
                break;
}

?>