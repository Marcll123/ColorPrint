
<?php
require_once '../controllers/ProviderController.php';
header('Access-Control-Allow-Origin: http://localhost:8080');
header("Access-Control-Allow-Headers: Origin, X-Requested-With, Content-Type, Accept, token");
header('Access-Control-Allow-Methods: GET, POST, PUT, DELETE');
header('Content-Type: application/json');

$newProvider = new ProviderController();

switch ($_SERVER['REQUEST_METHOD']) {
        case 'GET':
                $data = $newProvider->show();
                echo json_encode($data);
                break;

        case 'POST':
                $data = $newProvider->save();
                echo $data;
                break;

        case 'PUT':
                $data = $newProvider->update();
                echo  $data;
                break;

        case 'DELETE':
                $data = $newProvider->delete();
                echo  $data;
                break;
}

?>