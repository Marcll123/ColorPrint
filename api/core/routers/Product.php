
<?php
require_once '../controllers/ProductController.php';
header('Access-Control-Allow-Origin: http://localhost:8080');
header("Access-Control-Allow-Headers: Origin, X-Requested-With, Content-Type, Accept, token");
header('Access-Control-Allow-Methods: GET, POST, PUT, DELETE');
header('Content-Type: application/json');

$newProduct = new ProductController();

switch ($_SERVER['REQUEST_METHOD']) {
        case 'GET':
                $data = $newProduct->show();
                echo json_encode($data);
                break;

        case 'POST':
                $data = $newProduct->save();
                echo $data;
                break;

        case 'PUT':
                $data = $newProduct->update();
                echo  $data;
                break;

        case 'DELETE':
                $data = $newProduct->delete();
                echo  $data;
                break;
}

?>